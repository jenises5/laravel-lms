@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="display-5">Instructor Dashboard</h1>
        <p class="text-muted">Manage your courses</p>
    </div>

    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5>My Courses</h5>
                <p class="mb-0 text-muted">Total: {{ $courses->total() }}</p>
            </div>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                + Create New Course
            </a>
        </div>
    </div>

    @if($courses->count() > 0)
        <div class="list-group">
            @foreach($courses as $course)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h5>{{ $course->title }}</h5>
                            <p class="mb-2">{{ Str::limit($course->description, 150) }}</p>
                            <small class="text-muted">
                                Created: {{ $course->created_at->format('M d, Y') }} • 
                                Updated: {{ $course->updated_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="d-flex gap-2 ms-3">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Are you sure?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4>You haven't created any courses yet.</h4>
            <a href="{{ route('courses.create') }}" class="btn btn-primary mt-2">Create Your First Course</a>
        </div>
    @endif
</div>
@endsection