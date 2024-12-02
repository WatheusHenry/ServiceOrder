import { Routes } from '@angular/router';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'login', // Página de login ao iniciar
    pathMatch: 'full',
  },
  {
    path: 'home',
    loadComponent: () =>
      import('./home/home.component').then((m) => m.HomePage),
  },
  {
    path: 'login',
    loadComponent: () =>
      import('./login/login.component').then((m) => m.LoginPage),
  },
  {
    path: 'edit-order/:id', // Rota para editar uma ordem
    loadComponent: () =>
      import('./edit-order/edit-order.component').then((m) => m.EditOrderPage),
  },
];
