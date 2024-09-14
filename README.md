# E-Commerce Web Application
## Overview
This is a basic e-commerce web application built with Laravel. It provides functionalities for managing products, carts, orders, and users, with distinct roles for admins and regular users. The application supports CRUD operations for products and orders, cart management, and user role management.

## Features
### User Management:
- Admin creation, editing, and deletion.
- User authentication and role-based access control.

### Product Management:
- View, add, edit, and delete products.
- Admins can manage product stock and details.

### Cart Management:
- Users can add items to their cart, view cart contents, and remove items.
- Checkout process to create orders and update stock quantities.

### Order Management:
- Users can view their order history.
- Admins can view and update order statuses, and manage all orders.

## Installation
### Prerequisites
- PHP 8.0 or higher
- Composer
- Laravel 10.x
- MySQL

## Usage
### Accessing the Application
- Admin Dashboard: /admin (only accessible by users with admin roles)

### Authentication
- Register: Use the registration form to create a new user account.
- Login: Log in with your credentials to access the application’s features.

### Admin Functions
- Manage Admins: /admin/admin
- Manage Products: /admin/stock
- Manage Orders: /admin/orderlist

### User Functions
- View Products: /products
- View Cart: /cart
- Checkout: /checkout
