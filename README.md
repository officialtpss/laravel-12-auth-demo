# Laravel Authentication Demo

A comprehensive authentication system built with Laravel, featuring both API and web authentication.

## Features

- **API Authentication**
  - Token-based authentication using Laravel Sanctum
  - OAuth2 support via Laravel Passport (migrations included)
  - Secure API endpoints
  - Token management

- **Web Authentication**
  - User registration and login
  - Profile management (edit name/email)
  - Dashboard interface

- **Frontend**
  - Modern UI with Tailwind CSS
  - Responsive design
  - Form validation and error handling

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- MySQL/SQLite database

## Installation

1. **Clone the repository:**
    ```bash
    git clone <repository-url>
    cd laravel-auth-demo
    ```

2. **Install PHP dependencies:**
    ```bash
    composer install
    ```

3. **Install Laravel Sanctum and Passport:**
    ```bash
    composer require laravel/sanctum
    composer require laravel/passport
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    php artisan vendor:publish --provider="Laravel\Passport\PassportServiceProvider"
    ```

4. **Configure your database in `.env`:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_auth_demo
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Run database migrations:**
    ```bash
    php artisan migrate
    ```

6. **Install frontend dependencies:**
    ```bash
    npm install
    ```

7. **Build frontend assets:**
    ```bash
    npm run build
    ```

8. **Start the development server:**
    ```bash
    php artisan serve
    ```

## API Endpoints

### Authentication

- `POST /api/register` — Register a new user  
  Required: `name`, `email`, `password`, `password_confirmation`
- `POST /api/login` — Login user  
  Required: `email`, `password`  
  Returns: API token
- `POST /api/logout` — Logout user  
  Required: Bearer token  
  Revokes the current API token

### User Management

- `GET /api/user` — Get authenticated user details  
  Required: Bearer token
- `PUT /api/user` — Update user profile  
  Required: Bearer token  
  Optional: `name`, `email`

## Web Routes

- `/register` — User registration form
- `/login` — User login form
- `/dashboard` — User dashboard (authenticated)
- `/profile` — User profile management (authenticated)
- `/logout` — Logout user

## Security Features

- CSRF protection
- Password hashing
- API token authentication (Sanctum & Passport)
- Session-based web authentication
- Form validation
- Input sanitization

---

**Project structure highlights:**

- Application code: [`app/`](app/)
- HTTP routes: [`routes/web.php`](routes/web.php)
- Views: [`resources/views/`](resources/views/)
- User model: [`App\Models\User`](app/Models/User.php)
- Auth controller: [`App\Http\Controllers\Web\AuthController`](app/Http/Controllers/Web/AuthController.php)
- Migrations: [`database/migrations/`](database/migrations/)
- Tailwind config: [`tailwind.config.js`](tailwind.config.js)
- Vite config: [`vite.config.js`](vite.config.js)

---

## 👤 Author

Tech Prastish - [github.com/officialtpss](https://github.com/officialtpss)  

Contact: info@tech-prastish.com

---

## 📄 License

This is a sample project intended for learning and demo purposes only.
