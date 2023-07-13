<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}." />
    <meta name="keywords" content="bank-dki, dki, bank" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.faker_locale') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | Template Apps V3" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    @include('layouts.styles')
    @yield('styles')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.header')
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
    </div>
    @include('layouts.scripts')
    @include('layouts.loading-dialog')
    @include('layouts.alert-dialog')

    @yield('scripts')

</body>

</html>
