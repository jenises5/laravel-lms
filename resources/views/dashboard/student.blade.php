@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="display-5">Student Dashboard</h1>
        <p class="text-muted">Your bookmarked courses</p>
    </div>

    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5>Bookmarked Courses</h5>
                <p class="mb-0 text-muted">Total: {{ $bookmarkedCourses->total() }}</p>
            </div>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">
                Browse Courses
            </a>
        </div>
    </div>

    @if($bookmarkedCourses->count() > 0)
        <div class="row">
            @foreach($bookmarkedCourses as $bookmark)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($bookmark->completed)
                            <div class="badge bg-success position-absolute top-0 end-0 m-2">
                                ✓ Completed
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $bookmark->course->title }}</h5>
                            <p class="text-muted small">By {{ $bookmark->course->instructor->name }}</p>
                            <p class="card-text">{{ Str::limit($bookmark->course->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex gap-2">
                                <a href="{{ route('courses.show', $bookmark->course) }}" class="btn btn-primary btn-sm flex-grow-1">
                                    View Course
                                </a>
                                <form method="POST" action="{{ route('bookmarks.complete', $bookmark->course) }}" class="flex-grow-1">
                                    @csrf
                                    <button type="submit" class="btn btn-sm w-100 {{ $bookmark->completed ? 'btn-outline-secondary' : 'btn-success' }}">
                                        {{ $bookmark->completed ? 'Incomplete' : 'Complete' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $bookmarkedCourses->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4>You haven't bookmarked any courses yet.</h4>
            <a href="{{ route('courses.index') }}" class="btn btn-primary mt-2">Browse Available Courses</a>
        </div>
    @endif
</div>
@endsection