<nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
        <li><a href="{{ route('home') }}">Home</a></li>
        @foreach($breadcrumbs as $breadcrumb)
            @if($breadcrumb['url'])
                <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
            @else
                <li>{{ $breadcrumb['label'] }}</li>
            @endif
        @endforeach
    </ul>
</nav>
