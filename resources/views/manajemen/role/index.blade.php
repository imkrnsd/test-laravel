@extends('main')
@section('page.title', 'Manajemen Role')
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
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen021.svg') !!}
                                    </span>
                                    <input type="search" data-kt-filter="search"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Cari" />
                                </div>
                            </div>
                            @can('role_create')
                                <div class="card-toolbar">
                                    <a href="{{ route('roles.create') }}" type="button" class="btn btn-primary">
                                        <span class="svg-icon svg-icon-2">
                                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                        </span>
                                        Tambah Role
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table
                                class="table align-middle table-row-dashed fs-6 gy-5 kt_datatable_responsive kt_datatable_dynamic_search">
                                <thead>
                                    <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th>Id</th>
                                        <th>Nama Role</th>
                                        <th>Dibuat Pada</th>
                                        <th>Diperbarui Pada</th>
                                        @can('role_edit')
                                            <th class="text-center">Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($role->created_at) }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($role->updated_at) }}</td>
                                            @can('role_edit')
                                                <td class="text-center">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('roles.edit', enkrip($role->id)) }}">
                                                        Ubah
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"> Tidak ada data yang bisa ditampilkan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
