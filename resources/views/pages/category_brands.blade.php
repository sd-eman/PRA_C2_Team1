<x-layouts.app>
    <x-slot name="breadcrumb">
        <li><a href="/categories" title="{{ __('misc.categories_alt') }}">{{ __('misc.categories') }}</a>
        </li>
        <li>{{ $category->name }}</li>
    </x-slot>

    <h2>{{ $category->name }}</h2>

    <div class="container">
        <div class="row">
            @foreach ($brands as $brand)
                <div class="col-md-4">
                    <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}">
                        <h4>{{ $brand->name }}</h4>
                    </a>
                    <p>{{ $brand->manuals->count() }} handleidingen</p>
                </div>
            @endforeach
        </div>
    </div>

</x-layouts.app>
