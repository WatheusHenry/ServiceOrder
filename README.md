# Sistema de Gerenciamento de Ordens de Serviço

---

## **Descrição do Projeto**
Este sistema de gerenciamento de ordens de serviço permite que um usuário:

1. **Cadastramento e Gerenciamento Web**:
   - Cadastrar-se através de uma interface web.
   - Criar novas ordens de serviço com informações básicas.

2. **Gerenciamento via Aplicativo Mobile**:
   - Visualizar ordens de serviço no aplicativo.
   - Definir o problema e a solução técnica diretamente no app.

### **Componentes do Sistema**
- **Backend**: Implementado em **Laravel 11** com banco de dados **MySQL**.
- **Interface Web**: Criada com **HTML**, **CSS**, **JavaScript** e **Bootstrap**, utilizando `http-server` para simular o ambiente.
- **Aplicativo Mobile**: Desenvolvido em **Ionic** para interação móvel com as ordens.

---

## **Tecnologias Utilizadas**
- **Backend**:
  - Laravel 11
  - MySQL
- **Web**:
  - HTML, CSS, JavaScript
  - Bootstrap
  - http-server
- **Mobile**:
  - Ionic Framework

---

## **Configuração do Ambiente de Desenvolvimento**

### **Pré-requisitos**
- PHP >= 8.1 (com Composer instalado)
- Node.js (versão LTS)
- npm ou yarn
- MySQL (banco de dados)
- http-server (para a interface web)
- Ionic CLI

---

### Backend

- criar uma cópia do .env.example para inserir as variaveis de ambiente
- executar `composer install`
- efetuar a criação das migrations com `php artisan migrate`
- para executar o backend: `php artisan serve`

### Web
- para executar a parte web é nescessario a biblioteca `http-server`, instalar com `npm install http-server`
- executar o comando `npx http-server` dentro da pasta web

### Mobile
- executar `npm install` para instalação de dependencias
- para executar o projeto utilize: `ionic serve`
