import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';
import { ReactiveFormsModule } from '@angular/forms';
import { AuthService } from '../services/auth.service'; // Importe o serviço de autenticação
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  standalone: true,
  providers: [HttpClient],
  imports: [IonicModule, ReactiveFormsModule],
})
export class LoginPage implements OnInit {
  loginForm: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private navCtrl: NavController,
    private router: Router,
    private authService: AuthService // Injete o serviço de autenticação
  ) {
    this.loginForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
    });
  }

  ngOnInit() {}

  onLogin() {
    if (this.loginForm.valid) {
      const { email, password } = this.loginForm.value;
      console.log('Email:', email);
      console.log('Password:', password);

      // Chame o serviço de autenticação
      this.authService.login(email, password).subscribe(
        (response) => {
          console.log('Login bem-sucedido', response);
          // Suponha que a API retorne um token JWT
          localStorage.setItem('auth_token', response.token); // Armazene o token no localStorage
          this.router.navigate(['/home']); // Redireciona para a página inicial após o login
        },
        (error) => {
          console.error('Erro ao fazer login', error);
          alert('Falha no login. Verifique suas credenciais.');
        }
      );
    } else {
      console.log('Formulário inválido');
    }
  }
}
