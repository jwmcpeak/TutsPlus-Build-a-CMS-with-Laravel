<li class="nav-item">
    <a 
        href="{{route('blog') }}"
        class="nav-link"
        role="button"
        aria-expanded="false"
    >Blog</a>
</li>

@foreach ($pages as $page)

@if (count($page->children))

<li class="nav-item dropdown">
    <a 
        href="#" 
        class="nav-link dropdown-toggle"
        role="button"
        aria-expanded="false"
        data-toggle="dropdown"
    >{{$page->title}} <span class="caret"></span></a>

    <div class="dropdown-menu">
        <a href="{{$page->url}}" class="dropdown-item">{{$page->title}}</a>

        @foreach($page->children as $child)
        <a href="{{$child->url}}" class="dropdown-item">{{$child->title}}</a>
        @endforeach
    </div>
</li>

@else

<li class="nav-item">
    <a 
        href="{{$page->url}}" 
        class="nav-link"
        role="button"
        aria-expanded="false"
    >{{$page->title}}</a>
</li>

@endif

@endforeach