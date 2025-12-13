@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4">Create New Course</h1>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Course Title *</label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                required
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description *</label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="3"
                                class="form-control @error('description') is-invalid @enderror"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Full Course Content *</label>
                            <textarea 
                                id="content" 
                                name="content" 
                                rows="12"
                                class="form-control @error('content') is-invalid @enderror"
                                required
                            >{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Write your full lesson content here.</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Create Course</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection