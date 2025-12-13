<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class LmsSeeder extends Seeder
{
    public function run(): void
    {
        // Create Instructor
        $instructor = User::create([
            'name' => 'John Instructor',
            'email' => 'instructor@test.com',
            'password' => Hash::make('password'),
            'role' => 'instructor',
        ]);

        // Create Student
        $student = User::create([
            'name' => 'Alice Student',
            'email' => 'student@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // Create Sample Courses
        Course::create([
            'instructor_id' => $instructor->id,
            'title' => 'Introduction to Web Development',
            'description' => 'Learn HTML, CSS, and JavaScript fundamentals.',
            'content' => "Welcome to Web Development!

Lesson 1: HTML Basics
- Document structure
- Common tags
- Semantic HTML

Lesson 2: CSS Styling
- Selectors
- Box model
- Flexbox & Grid

Lesson 3: JavaScript
- Variables
- Functions
- DOM manipulation",
        ]);

        Course::create([
            'instructor_id' => $instructor->id,
            'title' => 'Laravel PHP Framework',
            'description' => 'Master Laravel for building modern web applications.',
            'content' => "Laravel Course Content

Module 1: Getting Started
- Installation
- Routing
- Controllers

Module 2: Database
- Migrations
- Eloquent ORM
- Relationships

Module 3: Views
- Blade templates
- Components
- Layouts",
        ]);

        Course::create([
            'instructor_id' => $instructor->id,
            'title' => 'Database Design Fundamentals',
            'description' => 'Learn to design efficient and scalable databases.',
            'content' => "Database Design Course

Chapter 1: Database Basics
- What is a database?
- DBMS types
- Normalization

Chapter 2: SQL
- SELECT queries
- JOINs
- Aggregate functions

Chapter 3: Design Principles
- Schema design
- Indexes
- Optimization",
        ]);
    }
}