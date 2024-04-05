@extends('admin.admindashboard')

@section('content')
<div class="d-flex justify-content-start m-3">
    <a href="{{ route('comments.create') }}" class="border border-primary shadow mt-2 d-flex align-items-center justify-content-center" style="background-color: #1789FB; height: 35px; width: 120px; color: white; font-size: 18px;">
      Add
      <i class="icon material-icons md-add me-2"></i>
      
  </a>
</div>
@foreach ($comments as $comment)
    <div class="card">
        <div class="card-header">
            <strong>{{ $comment->name }}</strong> ({{ $comment->email }})
        </div>
        <div class="card-body">
            {{ $comment->content }}
        </div>
    </div>
@endforeach

    
@endsection