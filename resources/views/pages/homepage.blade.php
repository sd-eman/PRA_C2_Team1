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
    @if ($topManuals->count())
        <h3>Top 10 populairste handleidingen</h3>
        <ul>
            @foreach ($topManuals as $manual)
                <li>{{ $manual->brand->name }}: {{ $manual->name }}</li>
            @endforeach
        </ul>
    @endif

    @php
        // Groepeer merken per eerste letter
        $brandsByLetter = $brands->groupBy(function ($brand) {

            return strtoupper(substr($brand->name, 0, 1));
        });
    @endphp

    <x-slot:title>
        {{ __('misc.all_brands') }}
    </x-slot:title>

    <?php
    $size = count($brands);
    $columns = 20;
    ?>

    {{-- Categorieën --}}
    <h3>Categorieën</h3>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/categories/{{ $category->id }}">
                        <h4>{{ $category->name }}</h4>
                    </a>
                    <p>{{ $category->brands_count }} merken</p>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
