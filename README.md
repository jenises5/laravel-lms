# Simple Learning Management System (LMS)

## Project Overview
A complete Laravel-based LMS with Instructor and Student roles, course management, and role-based access control.

## Group Members
- Jenises Mariquit
- Mark Daniel Castillo
- Dave Hoyohoy
- Axzyl Nino Codera
- Carlos Therese Pilar

## Tech Stack
- **Framework:** Laravel 10.x
- **Database:** MySQL/MariaDB
- **Frontend:** Blade Templates + Tailwind CSS
- **Authentication:** Laravel Breeze/UI

## Features Summary

### Instructor Features
- Register and login with Instructor role
- Create courses with title, description, and full content
- Edit and delete own courses
- View all created courses in dashboard
- Upload course materials and embed media

### Student Features
- Register and login with Student role
- Browse all available courses
- View complete course details
- Bookmark courses (optional)
- Mark courses as completed (optional)

### Course Management
- Public course listing with search/filter
- Detailed course view pages
- Role-based access control
- Responsive design

## Installation Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL/MariaDB
- Node.js and NPM (for asset compilation)

### Setup Steps

1. **Clone the repository**
```bash
git clone <your-repo-url>
cd lms-project
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Environment configuration**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure database**
Edit `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_database
DB_USERNAME=jenises5
DB_PASSWORD=password
```

6. **Run migrations**
```bash
php artisan migrate
```

7. **Seed database (optional)**

php artisan db:seed
```

8. **Compile assets**
```bash
npm run dev
# or for production
npm run build
```

9. **Start development server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## Database Schema

### Users Table
- id
- name
- email
- password
- role (enum: 'instructor', 'student')
- timestamps

### Courses Table
- id
- instructor_id (foreign key to users)
- title
- description
- content (text/longtext)
- created_at
- updated_at

### Bookmarks Table (Optional)
- id
- user_id
- course_id
- completed (boolean)
- timestamps

## Deployment Guide

### Option 1: InfinityFree (Free)
1. Create account at infinityfree.net
2. Upload files via FTP
3. Import database via phpMyAdmin
4. Update .env with production credentials

### Option 2: Railway.app
1. Connect GitHub repository
2. Add MySQL plugin
3. Configure environment variables
4. Deploy automatically

### Option 3: Vercel + PlanetScale
1. Push to GitHub
2. Import to Vercel
3. Connect PlanetScale database
4. Configure build settings

## Project Structure
```
lms-project/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CourseController.php
│   │   │   ├── DashboardController.php
│   │   │   └── Auth/RegisterController.php
│   │   └── Middleware/
│   │       ├── InstructorMiddleware.php
│   │       └── StudentMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Course.php
│       └── Bookmark.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       ├── courses/
│       ├── dashboard/
│       └── auth/
├── routes/
│   └── web.php
└── public/
```

## Testing Accounts (After Seeding)

**Instructor Account:**
- Email: instructor@example.com
- Password: password

**Student Account:**
- Email: student@example.com
- Password: password

## Key Routes
- `/` - Home/Course listing
- `/register` - User registration
- `/login` - User login
- `/courses` - Browse courses
- `/courses/{id}` - Course details
- `/dashboard` - Instructor dashboard
- `/courses/create` - Create course (Instructor only)
- `/courses/{id}/edit` - Edit course (Instructor only)

## Deployment Link
🔗 **Live Application:** [Your deployed URL here]

## GitHub Repository
📁 **Source Code:** [Your GitHub URL here]

## Screenshots
(Add screenshots of your application here)

## Known Issues / Future Improvements
- Add file upload for course materials
- Implement course categories
- Add student progress tracking
- Email notifications
- Course ratings and reviews

## License
This project is created for educational purposes as part of the Final Project requirement.

## Contact
For questions or issues, contact:
- Group Leader: [Name] - [Email]