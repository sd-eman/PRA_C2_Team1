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

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <?php
    $size = count($brands);
    $columns = 3;
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
            @foreach ($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">
                    <ul>
                        @foreach ($chunk as $brand)
                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));
                            if (!isset($header_first_letter) || $current_first_letter != $header_first_letter) {
                                echo '</ul>
                                    <h2 id="' . $current_first_letter . '">' . $current_first_letter . '</h2>
                                    <ul>';
                            }
                            $header_first_letter = $current_first_letter;
                            ?>
                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-badge">
                                    {{ $brand->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

</x-layouts.app>
