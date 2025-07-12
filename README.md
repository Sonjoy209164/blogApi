# Laravel API - Blog Post, User Registration, and Task Management

This project implements a Laravel-based API with three main functionalities:
1. **Blog Post CRUD API**: Create, view, and list posts.
2. **User Registration API**: Register users with name, email, and password.
3. **Task Management API**: Manage tasks (Add task, Mark task as completed, Get pending tasks).

## Setup Instructions

### 1. Clone the Repository

First, clone this repository to your local machine:

```bash
git clone https://github.com/your-username/laravel-api.git
cd laravel-api
composer install
php artisan migrate
php artisan serve
```


### Steps to complete:

1. **Clone the repository**: Replace `your-username` with your actual GitHub username in the clone URL.
2. **Run Composer**: The `composer install` command will install the PHP dependencies defined in the `composer.json` file.
3. **Configure `.env`**: Fill out the `.env` file with your database settings (MySQL credentials).
4. **Run migrations**: This step will create the necessary tables (`posts`, `users`, `tasks`) in your database.
5. **Run the server**: You can now test your API locally by visiting `http://127.0.0.1:8000`.

Let me know if you need any further modifications!
