<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
    <style>
        /* Flexbox voor sticky footer */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            /* neemt alle beschikbare ruimte */
        }
    </style>
</head>

<body>

    <x-navbar />

    <div class="container main-content">
        <div class="row">
            <div class="col-md-8">
                <x-header />

                <ul class="breadcrumb">
                    <li><a href="/" title="{{ __('misc.home_alt') }}"
                            alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                    {{ $breadcrumb ?? '' }}

                    <li><a href="/contact" title="{{ __('misc.contact_alt') }}"
                            alt="{{ __('misc.contact_alt') }}">{{ __('misc.contact') }}</a></li>
                    {{ $breadcrumb ?? '' }}

                    <li><a href="{{ route('brands.by-letter', 'A') }}" title="{{ __('misc.brandsbyletter_alt') }}"
                            alt="{{ __('misc.brandsbyletter_alt') }}">{{ __('misc.brandsbyletter') }}</a></li>

                </ul>

                @if (isset($_GET['q']))
                    <x-search_results />
                @else
                    {{ $slot }}
                @endif

                <ul class="breadcrumb">
                    <li><a href="/" title="{{ __('misc.home_alt') }}"
                            alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                    {{ $breadcrumb ?? '' }}
                    <li><a href="/contact" title="{{ __('misc.contact_alt') }}"
                            alt="{{ __('misc.contact_alt') }}">{{ __('misc.contact') }}</a></li>
                    {{ $breadcrumb ?? '' }}
                </ul>
            </div>
        </div>
    </div>

    <x-footer />

</body>

</html>
