import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { OrderService } from '../services/order.service';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-edit-order',
  templateUrl: './edit-order.component.html',
  styleUrls: ['./edit-order.component.scss'],
  standalone: true,
  imports: [IonicModule, ReactiveFormsModule],
})
export class EditOrderPage implements OnInit {
  orderId: string | null = null;
  orderForm: FormGroup;
  orderData: any;

  constructor(
    private route: ActivatedRoute,
    private orderService: OrderService,
    private formBuilder: FormBuilder,
    private router: Router
  ) {
    this.orderForm = this.formBuilder.group({
      customer_complaint: ['', Validators.required],
      technical_solution: ['', Validators.required],
    });
  }

  ngOnInit() {
    // Captura o ID da ordem da URL
    this.orderId = this.route.snapshot.paramMap.get('id')!;

    if (this.orderId) {
      this.loadOrderDetails();
    }
  }

  loadOrderDetails() {
    this.orderService.getOrderById(this.orderId!).subscribe((orderData) => {
      this.orderForm.patchValue(orderData);
      this.orderData = orderData;
    });
  }

  onSubmit() {
    if (this.orderForm.valid) {
      const updatedOrder = this.orderForm.value;
      this.orderService.updateOrder(this.orderId!, updatedOrder).subscribe(
        () => {
          this.router.navigate(['/']);
        },
        (error) => {
          console.error('Erro ao atualizar ordem:', error);
        }
      );
    }
  }
}
