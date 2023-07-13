<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Portal Bansos." />
    <meta name="keywords" content="bank-dki, dki, bank, bansos, bantuan sosial, subsidi" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.faker_locale') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | Portal Bansos" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    @include('layouts.styles')
    <style>
        body {
            background-image: url('metronic/demo2/assets/media/auth/bg10.jpeg');
        }

        [data-theme="dark"] body {
            background-image: url('metronic/demo2/assets/media/auth/bg10-dark.jpeg');
        }
    </style>

    <script src="{{ asset('js/theme.js') }}" defer></script>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('metronic/demo2/assets/media/auth/agency.png') }}" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('metronic/demo2/assets/media/auth/agency-dark.png') }}" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{ config('app.name') }}</h1>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <div class="w-md-400px">
                        <form action="{{ route('auth.login-submit') }}" method="POST" class="form">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Username" name="username"
                                    maxlength="10" autocomplete="off" class="form-control bg-transparent text-uppercase"
                                    value="{{ old('username') }}" autofocus />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign In</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.login-script')
    @include('layouts.alert-dialog')
</body>

</html>
