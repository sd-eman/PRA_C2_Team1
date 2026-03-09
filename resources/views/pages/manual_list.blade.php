<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    {{-- Top 5 populairste manuals --}}
    @if($topManuals->count())
        <h3>Top 5 handleidingen van {{ $brand->name }}</h3>
        <ul>
            @foreach($topManuals as $manual)
                <li>
                    @if($manual->locally_available)
                        <a href="{{ $manual->url }}" target="_blank" alt="{{ $manual->name }}" title="{{ $manual->name }}">
                            {{ $manual->name }}
                        </a>
                        ({{ $manual->filesize_human_readable }})
                    @else
                        <a href="{{ route('manual.show', [
                                'brand_id' => $brand->id,
                                'brand_slug' => $brand->getNameUrlEncodedAttribute(),
                                'manual_id' => $manual->id
                            ]) }}"
                            target="_blank"
                            alt="{{ $manual->name }}"
                            title="{{ $manual->name }}">
                            {{ $manual->name }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    {{-- Alle manuals --}}
    <h3>Alle handleidingen</h3>
    <ul>
        @foreach($manuals as $manual)
            <li>
                @if($manual->locally_available)
                    <a href="{{ $manual->url }}" target="_blank" alt="{{ $manual->name }}" title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                    ({{ $manual->filesize_human_readable }})
                @else
                    <a href="{{ route('manual.show', [
                            'brand_id' => $brand->id,
                            'brand_slug' => $brand->getNameUrlEncodedAttribute(),
                            'manual_id' => $manual->id
                        ]) }}"
                        target="_blank"
                        alt="{{ $manual->name }}"
                        title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

</x-layouts.app>
