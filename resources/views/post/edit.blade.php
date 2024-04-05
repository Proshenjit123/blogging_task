@extends('admin.admindashboard')

@section('content')

<div class="container card mt-2">
    <div class="text-right mt-3">
        <h2>Edit Post</h2>
    </div>
    <div class="m-3">
        <form action="{{ route('post.update', $posts->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $posts->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{ $posts->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
