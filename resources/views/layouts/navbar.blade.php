<div class="d-flex align-items-stretch" id="kt_header_nav">
    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
        <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold my-5 my-lg-0 align-items-stretch px-2 px-lg-0"
            id="#kt_header_menu" data-kt-menu="true">
            @foreach ($menus as $key => $menu)
                @include('layouts.navbar-item', ['item' => $menu])
            @endforeach
        </div>
    </div>
</div>
