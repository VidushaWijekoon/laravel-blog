@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Post</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter your post title" required>
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <textarea type="text" name="description" class="form-control" rows="5" required placeholder="Enter your post description"></textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-xm btn-primary mt-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
