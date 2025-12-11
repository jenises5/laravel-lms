<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isInstructor()) {
            $courses = $user->courses()->latest()->paginate(10);
            return view('dashboard.instructor', compact('courses'));
        }

        $bookmarkedCourses = $user->bookmarks()->with('course.instructor')->latest()->paginate(10);
        return view('dashboard.student', compact('bookmarkedCourses'));
    }
}