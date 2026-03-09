<x-layouts.app>
    <h3>{{ $Team }}</h3>
    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100"
                height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


@php
    // Group brands by first letter
    $brandsByLetter = $brands->groupBy(function($brand) {
        return strtoupper(substr($brand->name, 0, 1));
    });
@endphp

    <?php
    $size = count($brands);
    $columns = 20;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="alphabet-nav">
        Ga naar letter:

        @foreach (range('A', 'Z') as $letter)
            <a href="#{{ $letter }}">{{ $letter }}</a>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            @foreach(range('A', 'Z') as $letter)
            @if(isset($brandsByLetter[$letter]))
                <div class="col-md-4">
                    <h2 id="{{ $letter }}">{{ $letter }}</h2>
                    @foreach($brandsByLetter[$letter]->chunk(5) as $chunk)
                        <ul>
                            @foreach($chunk as $brand)
                                <li>
                                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-badge">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            @endif
        @endforeach
        </div>
    </div>



</x-layouts.app>
