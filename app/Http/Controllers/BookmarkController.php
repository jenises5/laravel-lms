<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function toggle(Course $course)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $message = 'Course removed from bookmarks.';
        } else {
            Bookmark::create([
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ]);
            $message = 'Course bookmarked successfully!';
        }

        return back()->with('success', $message);
    }

    public function complete(Course $course)
    {
        $bookmark = Bookmark::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ]
        );

        $bookmark->update(['completed' => !$bookmark->completed]);

        $message = $bookmark->completed 
            ? 'Course marked as completed!' 
            : 'Course marked as incomplete.';

        return back()->with('success', $message);
    }
}
