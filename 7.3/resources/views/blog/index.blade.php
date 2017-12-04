@extends('layouts.frontend')

@section('content')
<div class="container">
  @foreach ($posts as $post)
  <article>
    <h2>
      <a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{$post->title}}</a>
    </h2>
    <p>
      {{ $post->excerpt}}
    </p>
  </article>

  @endforeach

{{ $posts->render() }}


</div>
@endsection
