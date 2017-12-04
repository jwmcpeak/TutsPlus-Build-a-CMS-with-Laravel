@extends('layouts.frontend')

@section('content')
<div class="container">
  <article>
    <h2>
      <a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{$post->title}}</a>
    </h2>
    <p>Published by {{$post->user->name }} on {{ $post->present()->publishedDate}}</p>
    <p>
      {!! $post->body !!}
    </p>





</div>
@endsection
