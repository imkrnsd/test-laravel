@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <form action="{{ route('konfigurasi.last-seen') }}">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen021.svg') !!}
                                    </span>
                                    <div class="me-4">
                                        <input type="search" name="nama"
                                            class="form-control form-control-solid w-290px ps-14"
                                            placeholder="Cari berdasarkan nama" autocomplete="off"
                                            value="{{ request('nama') }}">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-lg">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
                                    <form action="{{ route('konfigurasi.last-seen') }}">
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
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 kt_datatable_responsive">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th>No.</th>
                                <th>NRIK</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Last Seen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($stmtUser as $user)
                                <tr>
                                    <td class="d-flex align-items-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->nrik }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->roles->pluck('name')[0] }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans(['parts' => 2]) }}</td>
                                    <td class="fw-bold">
                                        @if (Cache::has('user-is-online-' . $user->id))
                                            <div class="badge badge-light-success">Online</div>
                                        @else
                                            <div class="badge badge-light-secondary bg-secondary text-dark">Offline</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!$stmtUser->isEmpty())
                        <div class="pagination py-5">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column flex-row-auto flex-center w-200px">
                                    <div class="d-flex flex-column-auto">Showing {{ $stmtUser->firstItem() }} to
                                        {{ $stmtUser->lastItem() }} of {{ $stmtUser->total() }} entries</div>
                                </div>
                                <div class="d-flex flex-column flex-row-fluid">
                                    {{ $stmtUser->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
