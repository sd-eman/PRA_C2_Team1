<x-layouts.app>

    <nav>
        @foreach (range('A', 'Z') as $char)
            <a href="{{ route('brands.by-letter', $char) }}">{{ $char }}</a>
        @endforeach
    </nav>

    <h1>Merken die beginnen met de letter {{ $letter }}</h1>

    @if ($brands->isEmpty())
        <p>Geen merken gevonden voor de letter {{ $letter }}.</p>
    @else
        <ul>
            @foreach ($brands as $brand)
                <li>
                    <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</x-layouts.app>
