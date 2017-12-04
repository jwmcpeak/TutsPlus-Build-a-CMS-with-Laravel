@foreach ($pages as $page)
<li class="{{$page->present()->dropDownClass}}">
    <a href="{{$page->url}}">
        {{ $page->title}}
        @if (count($page->children))
            <span class="caret"></span>
        @endif
    </a>

    @if (count($page->children))
        <ul class="dropdown-menu">
        @include('partials.nav', ['pages'=>$page->children])
        </ul>
    @endif
</li>
@endforeach