@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com014.svg') !!}
                        </span>
                        <h2>{{ $title }}</h2>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen031.svg') !!}
                                    Filter
                                </span>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <form action="{{ route('manajemen-user.index') }}">
                                        <div class="mb-7">
                                            <label class="form-label fs-6 fw-semibold">Role :</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Pilih Role" data-allow-clear="true" name="role">
                                                <option></option>
                                                @foreach ($stmtRole as $role)
                                                    @if (request('role') === $role->name)
                                                        <option value="{{ $role->name }}" selected>{{ $role->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-7">
                                            <label class="form-check form-switch form-check-custom form-check-solid"
                                                for="status_blokir">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="status_blokir" name="status_blokir"
                                                    {{ request('status_blokir') == 1 ? 'checked' : '' }} />
                                                <span class="form-check-label">
                                                    User Terblokir
                                                </span>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @can('user_create')
                                <a href="{{ route('manajemen-user.create') }}" type="button" class="btn btn-primary">
                                    <span class="svg-icon svg-icon-2">
                                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                    </span>
                                    Tambah User
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
