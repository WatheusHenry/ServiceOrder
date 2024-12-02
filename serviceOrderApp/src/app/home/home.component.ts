import { Component, OnInit } from '@angular/core';
import { OrderService } from '../services/order.service'; // Importando o serviço de ordens
import { IonItemSliding } from '@ionic/angular';
import { IonicModule } from '@ionic/angular';
import { ReactiveFormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  standalone: true,
  imports: [IonicModule, ReactiveFormsModule,CommonModule],

})
export class HomePage implements OnInit {
  orders: any[] = [];

  constructor(private orderService: OrderService, private router: Router) {}

  ngOnInit() {
    this.loadOrders();
  }

  loadOrders() {
    this.orderService.getOrders().subscribe((data) => {
      this.orders = data; 
      console.log(data);
    });
  }

  goToEditOrder(orderId: string) {
    this.router.navigate([`/edit-order/${orderId}`]); 
  }
}
