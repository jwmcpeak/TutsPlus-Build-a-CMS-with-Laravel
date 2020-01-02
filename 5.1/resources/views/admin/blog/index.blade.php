@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
    @endif
    <br>
    <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Slug</th>
                <th>Published</th>
            </tr>
        </thead>

        @foreach ($model as $post)
            <tr>
                <td>
                    <a href="{{ route('blog.edit', ['blog' => $post->id])}}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->user()->first()->name }}</td>
                <td>{{ $post->slug }}</td>
                <td></td>
            </tr>

        @endforeach
    
    </table>
    {{ $model->links() }}
</div>


@endsection
