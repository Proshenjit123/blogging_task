@extends('admin.admindashboard')

@section('content')

<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    {{-- <input type="hidden" name="post_id" value="{{ $post->id }}"> --}}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Comment:</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>

    
@endsection