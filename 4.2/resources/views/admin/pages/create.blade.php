@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create New</h1>
    <form action="{{ route('pages.store') }}" method="post">
        @include('admin.pages.partials.fields')
    
    </form>
</div>


@endsection
