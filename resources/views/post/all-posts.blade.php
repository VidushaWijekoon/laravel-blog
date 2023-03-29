@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">All Posts</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td>{{ $post->id }}</td>
                              <td>{{ $post->title }}</td>
                              <td>{{ $post->description }}</td>
                              <td>
                                <a href="{{ route('posts.edit', $post->id ) }}" class="btn btn-sm btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Update</a>
                                <a href="{{ route('posts.delete', $post->id ) }}" class="btn btn-sm btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Delete</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection