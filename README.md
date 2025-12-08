<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# 📚 Simple Learning Management System (LMS)

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)
![License](https://img.shields.io/badge/License-MIT-green)

A comprehensive Learning Management System built with Laravel, featuring role-based access control for Instructors and Students. Created as a final project for [Your Course Code/Name].

## 🔗 Live Demo

**Deployed Application:** [Your deployment URL here]

**Test Accounts:**
- **Instructor:** instructor@example.com / password
- **Student:** student@example.com / password

---

## 👥 Group Members

**Group [Your Group Number]**

| Name | Student ID | Role | GitHub |
|------|-----------|------|--------|
| [Mark Daniel Castillo ] | [ID] | Group Leader | [@username](https://github.com/username) |
| [Jenises Mariquit ] | [ID] | Backend Developer | [@jenises5](https://github.com/username) |
| [Carlos Pilar] | [ID] | Frontend Developer | [@username](https://github.com/username) |
| [Dave Hoyohoy] | [ID] | Database Designer | [@username](https://github.com/username) |
| [Axzyl Nino Codera] | [ID] | QA/Documentation | [@username](https://github.com/username) |

---

## ✨ Features

### 👨‍🏫 Instructor Features
- ✅ Register and login with instructor role
- ✅ Create new courses with title, description, and full content
- ✅ Edit and update own courses
- ✅ Delete own courses
- ✅ View all created courses in dashboard
- ✅ Role-based access control

### 👨‍🎓 Student Features
- ✅ Register and login with student role
- ✅ Browse all available courses
- ✅ Search courses by title or description
- ✅ View complete course details
- ✅ Bookmark favorite courses
- ✅ Mark courses as completed
- ✅ Personal dashboard with bookmarked courses

### 🌐 General Features
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ User authentication and authorization
- ✅ Role-based dashboards
- ✅ Search functionality
- ✅ Clean and intuitive UI
- ✅ Flash messages for user feedback
- ✅ Pagination for large datasets

---

## 🛠️ Tech Stack

| Category | Technology |
|----------|-----------|
| **Backend Framework** | Laravel 10.x |
| **Language** | PHP 8.1+ |
| **Database** | MySQL 8.0 |
| **Frontend** | Blade Templates |
| **CSS Framework** | Tailwind CSS |
| **Authentication** | Laravel Breeze |
| **Version Control** | Git & GitHub |

---

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Node.js & NPM
- Git

---

## 🚀 Installation

### 1. Clone the repository
```bash
git clone https://github.com/yourusername/your-repo-name.git
cd your-repo-name
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install Node dependencies
```bash
npm install
```

### 4. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure database
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_database
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 6. Create database
```bash
mysql -u root -p
CREATE DATABASE lms_database;
EXIT;
```

### 7. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

### 8. Build assets
```bash
npm run dev
# or for production
npm run build
```

### 9. Start development server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 📊 Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `role` - Enum ('instructor', 'student')
- `timestamps`

### Courses Table
- `id` - Primary key
- `instructor_id` - Foreign key to users
- `title` - Course title
- `description` - Short description
- `content` - Full course content
- `timestamps`

### Bookmarks Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `course_id` - Foreign key to courses
- `completed` - Boolean
- `timestamps`
- Unique constraint on (user_id, course_id)

---

## 🗂️ Project Structure