@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
    @endif
    <br>
    <a href="{{ route('pages.create') }}" class="btn btn-primary">Create New</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>URL</th>
            </tr>
        </thead>

        @foreach ($pages as $page)
            <tr>
                <td>
                    <a href="{{ route('pages.edit', ['page' => $page->id])}}">{{ $page->title }}</a>
                </td>
                <td>{{ $page->url }}</td>
            </tr>

        @endforeach
    
    </table>
    {{ $pages->links() }}
</div>


@endsection
