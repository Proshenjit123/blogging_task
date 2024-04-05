@extends('admin.admindashboard')

@section('content')
<h1>Create New Post</h1>

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br><br>

    <label for="content">Content:</label><br>
    <textarea id="content" name="content"></textarea><br><br>

    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image"><br><br>

    <label for="published_at">Published At:</label><br>
    <input type="date" id="published_at" name="published_at"><br><br>

    <button type="submit">Create Post</button>
</form>
    
@endsection