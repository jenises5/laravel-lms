<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index(Request $request)
    {
        $query = Course::with('instructor')->latest();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $courses = $query->paginate(12);

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'content'     => 'required|string',
        ]);

        try {
            // Authenticated user must be instructor
            $user = auth()->user();

            if (!$user || !$user->isInstructor()) {
                abort(403, 'Unauthorized action.');
            }

            $course = $user->courses()->create($validated);

            return redirect()->route('courses.show', $course)
                             ->with('success', 'Course created successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return dd("DATABASE ERROR: ".$e->getMessage());
        } catch (\Exception $e) {
            return dd("GENERIC ERROR: ".$e->getMessage());
        }
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        $course->load('instructor');

        $isBookmarked = false;
        $isCompleted  = false;

        if (auth()->check() && auth()->user()->isStudent()) {
            $isBookmarked = $course->isBookmarkedBy(auth()->id());
            $isCompleted  = $course->isCompletedBy(auth()->id());
        }

        return view('courses.show', compact('course', 'isBookmarked', 'isCompleted'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Course $course)
    {
        $user = auth()->user();

        if (!$user || $user->id !== $course->instructor_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Course $course)
    {
        $user = auth()->user();

        if (!$user || $user->id !== $course->instructor_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'content'     => 'required|string',
        ]);

        $course->update($validated);

        return redirect()->route('courses.show', $course)
                         ->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Course $course)
    {
        $user = auth()->user();

        if (!$user || $user->id !== $course->instructor_id) {
            abort(403, 'Unauthorized action.');
        }

        $course->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Course deleted successfully!');
    }
}
