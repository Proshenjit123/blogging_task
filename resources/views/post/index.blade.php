@extends('admin.admindashboard')

@section('content')

<div class="container card mt-2">
    <div class="text-right mt-3">
        <h2>Post</h2>
    </div>
    <div class="d-flex justify-content-start m-3">
        <a href="{{route('post.create')}}" class="border border-primary shadow mt-2 d-flex align-items-center justify-content-center" style="background-color: #1789FB; height: 35px; width: 120px; color: white; font-size: 18px;">
          Add
          <i class="icon material-icons md-add me-2"></i>
          
      </a>
    </div>
<table id="datatable" class="table table-bordered display">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Publish_at</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post )
            
        
        <tr>
            <td scope="row">{{$loop->index+1}}</td> 
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
                <img src="{{ asset(str_replace('public', 'storage', $post->image)) }}" alt="" style="height: auto; width: 35px;">
            </td>
            
            <td>{{$post->published_at}}</td>
            <td>{{ $post->user->name }}</td>
            <td>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection