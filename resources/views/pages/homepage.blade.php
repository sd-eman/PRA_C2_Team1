<x-layouts.app>
    <h3>{{ $Team }}</h3>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">
            {{ __('introduction_texts.homepage_line_1') }}
        </p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    {{-- Top 10 populairste handleidingen --}}
    @if($topManuals->count())
        <h3>Top 10 populairste handleidingen</h3>
        <ul>
            @foreach($topManuals as $manual)
                <li>{{ $manual->brand->name }}: {{ $manual->type }}</li>
            @endforeach
        </ul>
    @endif

    <x-slot:title>
        {{ __('misc.all_brands') }}
    </x-slot:title>

    <div class="alphabet-nav">
        Ga naar letter:
        @foreach (range('A', 'Z') as $letter)
            <a href="#{{ $letter }}">{{ $letter }}</a>
        @endforeach
    </div>

    <div class="container">
        @foreach(range('A', 'Z') as $letter)
            @if(isset($brandsByLetter[$letter]))
                <h2 id="{{ $letter }}">{{ $letter }}</h2>
                <ul>
                    @foreach($brandsByLetter[$letter] as $brand)
                        <li>
                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-badge">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </div>
</x-layouts.app>
