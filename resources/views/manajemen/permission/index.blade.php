@extends('main')
@section('page.title', 'Manajemen Akses')
@section('content')

    @include('layouts.toolbar')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <form action="{{ route('permissions.index') }}">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                                {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen021.svg') !!}
                                            </span>
                                            <div class="me-4">
                                                <input type="search" name="name"
                                                    class="form-control form-control-solid w-290px ps-14"
                                                    placeholder="Cari berdasarkan nama" autocomplete="off"
                                                    value="{{ request('name') }}">
                                            </div>
                                            <button type="submit" class="btn btn-secondary btn-lg">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @can('permission_create')
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <a href="{{ route('permissions.create') }}" type="button" class="btn btn-primary">
                                            <span class="svg-icon svg-icon-2">
                                                {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                            </span>
                                            Tambah Akses
                                        </a>
                                    </div>
                                </div>
                            @endcan
                        </div>

                        <div class="card-body py-4">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 kt_default_datatable">
                                <thead>
                                    <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Dibuat Pada</th>
                                        <th>Diperbarui Pada</th>
                                        @can('permission_edit')
                                            <th class="text-center">Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($permission->created_at) }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($permission->updated_at) }}</td>
                                            @can('permission_edit')
                                                <td class="text-center">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('permissions.edit', $permission->id) }}">
                                                        Ubah
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"> Tidak ada data yang bisa ditampilkan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            @if (!$permissions->isEmpty())
                                <div class="pagination">
                                    <div class="d-flex flex-row">
                                        <div class="d-flex flex-column flex-row-auto flex-center w-200px">
                                            <div class="d-flex flex-column-auto">Showing {{ $permissions->firstItem() }} to
                                                {{ $permissions->lastItem() }} of {{ $permissions->total() }} entries
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-row-fluid">
                                            {{ $permissions->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
