@extends('admin.admindashboard')

@section('content')

<div class="container card mt-2">
    <div class="text-right mt-3">
        <h2>{{ $posts->title }}</h2>
    </div>
    <div class="m-3">
        <p><strong>Title:</strong> {{ $posts->title }}</p>
        <p><strong>Content:</strong> {{ $posts->content }}</p>
        <p><strong>Created at:</strong> {{ $posts->created_at }}</p>
        <p><strong>Updated at:</strong> {{ $posts->updated_at }}</p>
        <p><strong>User:</strong> {{ $posts->user->name }}</p>
        <p><strong>Views:</strong> {{ $posts->views }}</p>
        <p><strong>Likes:</strong> {{ $posts->likes }}</p>
    </div>
</div>

@endsection
