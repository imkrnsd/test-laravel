<div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
    <div class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
        data-kt-menu-trigger="hover" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <i class="far fa-user"></i>
    </div>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}
                        <span
                            class="badge badge-success fw-bold fs-8 px-2 py-1 ms-2">{{ auth()->user()->roles->pluck('name')->implode(', ') }}</span>
                    </div>
                    <label class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->nrik }}</label>
                </div>
            </div>
        </div>
        <div class="menu-item px-5 my-1">
            <a href="{{ route('manajemen-user.change-profile') }}" class="menu-link px-5">Ubah Profile</a>
        </div>
        <div class="menu-item px-5 my-1">
            <a href="{{ route('auth.change-password') }}" class="menu-link px-5">Ganti Password</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('auth.logout') }}" class="menu-link px-5">Log Out</a>
        </div>
    </div>
</div>
