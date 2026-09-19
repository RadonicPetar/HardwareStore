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

## Requirements

Before installing the project, make sure you have:

- PHP 8.3 or newer
- Composer
- MySQL
- Node.js and npm

Required PHP extensions:

- OpenSSL
- Fileinfo
- Mbstring
- PDO MySQL

You can check your PHP version with:

```bash
php -v
```

You can check enabled PHP extensions with:

```bash
php -m
```

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

### Linux

```bash
cp .env.example .env
```

### Windows PowerShell

```powershell
copy .env.example .env
```

Generate the application key:

```bash
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

Create an empty MySQL database named:

```text
hardware_store
```

Then run the migrations and seeders:

```bash
php artisan migrate:fresh --seed
```

Create the symbolic link for product images:

```bash
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

## Windows PHP Configuration

If you are using PHP on Windows and Composer or Laravel reports that a required PHP extension is missing, check which configuration file is being used:

```powershell
php --ini
```

Open the active `php.ini` file and make sure the required extensions are enabled:

```ini
extension=openssl
extension=fileinfo
extension=mbstring
extension=pdo_mysql
```

Also make sure the PHP extension directory is enabled:

```ini
extension_dir = "ext"
```

After changing `php.ini`, verify the enabled extensions:

```powershell
php -m
```

If multiple PHP installations are installed, you can check which PHP executable is currently being used:

```powershell
where.exe php
```

The first PHP installation in the Windows `PATH` is normally the one used by Composer and Artisan commands.

## Test Accounts

### Administrator

**Email:** `admin@mail.com`  
**Password:** `Admin12345`

### User

**Email:** `Damir@mail.com`  
**Password:** `Damir12345`

## Seed Data

Running:

```bash
php artisan migrate:fresh --seed
```

creates test data including:

- 7 product categories
- 24 products
- Product descriptions and images
- Administrator account
- Regular user account
- Test orders with order items

The product images used by the seeders are stored in:

```text
database/seeders/images/products
```

During seeding, they are copied to the application's public storage.

## Author

Petar Radonić