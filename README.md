# HardwareStore

HardwareStore is a Laravel web application for browsing and purchasing computer hardware.

The project is a Laravel refactor of an older PHP hardware store application and was created to practice Laravel development, authentication, authorization, database relationships and CRUD operations.

## Features

- User registration and authentication
- Product listing and product details
- Product search and category filtering
- Shopping cart with quantity management
- Checkout
- User order history
- Admin product management
- Admin order management
- Order status management
- Role-based admin authorization
- Product image upload
- Database seeders with test data

## Technologies

- PHP
- Laravel
- MySQL
- Blade
- Laravel Breeze
- Tailwind CSS
- Vite

## Installation

Clone the repository:

```bash
git clone https://github.com/RadonicPetar/HardwareStore.git
cd HardwareStore
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
npm run build
```

Create the environment file:

```bash
cp .env.example .env
php artisan key:generate
```

Configure the database connection in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hardware_store
DB_USERNAME=root
DB_PASSWORD=
```

Create the `hardware_store` database in MySQL and run:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

Start the application:

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## Test Accounts

### Administrator

**Email:** `admin@mail.com`  
**Password:** `Admin12345`

### User

**Email:** `Damir@mail.com'`  
**Password:** `Damir12345`

## Seed Data

Running the database seeders creates:

- 7 product categories
- 24 hardware products
- Product descriptions and images
- Administrator and regular user accounts
- Test orders with order items

## Author

Petar Radonić