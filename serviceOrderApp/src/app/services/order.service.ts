import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class OrderService {
  private apiUrl = 'http://127.0.0.1:8000/api/service-orders';
  private token = localStorage.getItem('auth_token');

  constructor(private http: HttpClient) {}

  getOrders(): Observable<any> {
    const headers = new HttpHeaders({
      Authorization: `Bearer ${this.token}`,
    });

    return this.http.get<any>(this.apiUrl, { headers });
  }

  getOrderById(id: string): Observable<any> {
    const headers = new HttpHeaders({
      Authorization: `Bearer ${this.token}`,
    });
    return this.http.get<any>(`${this.apiUrl}/${id}`, { headers });
  }

  updateOrder(id: string, updatedOrder: any): Observable<any> {
    const headers = new HttpHeaders({
      Authorization: `Bearer ${this.token}`,
    });
    return this.http.put<any>(`${this.apiUrl}/${id}`, updatedOrder, {
      headers,
    });
  }
}
