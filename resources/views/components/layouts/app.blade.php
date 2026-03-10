<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
    <style>
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
                    <li><a href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                    <li><a href="/contact" title="{{ __('misc.contact_alt') }}">{{ __('misc.contact') }}</a></li>
                    <li><a href="{{ route('brands.by-letter', 'A') }}"
                            title="{{ __('misc.brandsbyletter_alt') }}">{{ __('misc.brandsbyletter') }}</a></li>

                    {{ $breadcrumb ?? '' }}
                </ul>

                @if (isset($_GET['q']))
                    <x-search_results />
                @else
                    {{ $slot }}
                @endif

                <ul class="breadcrumb">
                    <li><a href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                    <li><a href="/contact" title="{{ __('misc.contact_alt') }}">{{ __('misc.contact') }}</a></li>
                    {{ $breadcrumb ?? '' }}
                </ul>
            </div>
        </div>
    </div>

    <x-footer />

</body>

</html>
