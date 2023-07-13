<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="container-xxl d-flex align-items-center">
        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
                id="kt_header_menu_mobile_toggle">
                <span class="svg-icon svg-icon-1">
                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/abstract/abs015.svg') !!}
                </span>
            </div>
        </div>
        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('index') }}">
                <img alt="Logo" src="{{ asset('assets/images/Bank_DKI_white_text_and_logo.svg') }}"
                    class="logo-default h-150px" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            @include('layouts.navbar')
            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                @include('layouts.theme-mode')
                @include('layouts.user-dropdown')
            </div>
        </div>
    </div>
</div>
