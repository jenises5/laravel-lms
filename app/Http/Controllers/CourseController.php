<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
{
    $query = Course::with('instructor')->latest();

    if($request->has('search')){
        $search = $request-> get ('search');
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('description','like',"%{$search}%");
    }
    $courses = $query->paginate(12);
    return view ('courses.index', compact('courses'));

}
  public function show(Course $course)
    {
        $course->load('instructor');
        $isBookmarked = false;
        $isCompleted = false;
        if(auth()->check() && auth()->user()->isStudent())
        {
            $isBookmarked = $course->isBookmarkedBy(auth()->id());
            $isCompleted = $course->isCompletedBy(auth()->id());
        }
        return view('courses.show',compact('course','isBookmarked','isCompleted'));

    }
    public function create()
    {
        return view('courses.create');

    }
    public function store( Request $request)
    {
        $validated = $request-> validate([
            'title'=> 'required|strinng|max:255',
            'description' => 'required|string|max:1000',
            'content' => 'required|string',

        ]);
        $course = auth()-> user()->courses()->create($validated);
        return redirect()->route('courses.show',$course)
        -> with('success','Course created successfully!');

    }
    public function edit (Course $course)
    {
        if ($course->instructor_id !== auth()->id()){
             abort(403, 'Unauthorized action.');
        }
         return view('courses.edit', compact('course'));
    }
    public function update(Request $request, Course $course)
    {
        if ($course->instructor_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'content' => 'required|string',
        ]);

         $course->update($validated);

        return redirect()->route('courses.show', $course)
            ->with('success', 'Course updated successfully!');

    }
    public function destroy(Course $course)
    {
        if ($course->instructor_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $course->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Course deleted successfully!');
    }
}
