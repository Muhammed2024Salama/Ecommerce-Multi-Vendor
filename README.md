# Ecommerce Multi Auth with Laravel

## Overview

Ecommerce Multi Auth with Laravel is a comprehensive solution for building an online marketplace or store with Laravel, a popular PHP framework. This project integrates multiple authentication systems, Toastr for elegant notifications, and various payment methods for seamless transactions.

## Features

- **Multi-Authentication System**: Supports different user roles (e.g., customers and administrators) with separate authentication mechanisms.
- **Toastr Notifications**: Provides real-time feedback to users about their actions with elegant pop-up messages.
- **Payment Methods Integration**: Supports multiple payment gateways (e.g., PayPal, Stripe) for secure online transactions.
- **Product Management**: Administrators can add, edit, and delete products, including details like name, description, and price.
- **Shopping Cart**: Users can add items to their cart, update quantities, and proceed to checkout.
- **Order Management**: Administrators can view and manage orders, including order status, payment status, and shipping details.
- **Security**: Built-in Laravel security features ensure the safety of user data and transactions.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Muhammed2024Salama/Ecommerce-Multi-Vendor.gitname/ecommerce-multi-auth-laravel.git

## Install dependencies:
    cd Ecommerce-Multi-Vendor
    composer install

## Set up environment variables:
    cp .env.example .env
    php artisan key:generate

## Configure your database in the .env file:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

## Migrate and seed the database:
    php artisan migrate --seed

## Serve the application:
    php artisan serve

## Usage
    Visit the application in your browser (by default, it should be available at http://localhost:8000).
    Register as a customer or log in as an administrator to access the respective functionalities.
    Add products to your cart, proceed to checkout, and complete the payment using the available payment methods.

## Contributing
    Contributions are welcome! Feel free to open issues or submit pull requests to improve this project.

## License
    This project is licensed under the MIT License.


Feel free to customize this template according to your project's specific details, such as repository URL, database configurations, and additional instructions. Once you've edited the README.md file, commit and push it to your GitHub repository to make it visible to others.


