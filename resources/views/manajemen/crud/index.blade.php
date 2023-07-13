@extends('main')
@section('page.title', 'Manajemen Nasabah')
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
                            @can('crud_create')
                                <div class="card-toolbar">
                                    <a href="{{ route('crud.create') }}" type="button" class="btn btn-primary">
                                        <span class="svg-icon svg-icon-2">
                                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                        </span>
                                        Tambah Nasabah
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
                                        <th>Nama Nasabah</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Profesi</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cruds as $crud)
                                        <tr>
                                            <td>{{ $crud->id }}</td>
                                            <td>{{ $crud->nama }}</td>
                                            <td>{{ $crud->alamat }}</td>
                                            <td>{{ $crud->tgl_lahir }}</td>
                                            <td>{{ $crud->profesi }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($crud->created_at) }}</td>
                                            <td>{{ dateWithFullMonthAndTimeFormat($crud->updated_at) }}</td>
                                            @can('crud_edit')
                                                <td class="text-center">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('crud.edit', enkrip($crud->id)) }}"
                                                        style="margin-right: -25px;">
                                                        Edit
                                                    </a>
                                                </td>
                                            @endcan
                                            @can('crud_delete')
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('crud.destroy', enkrip($crud->id)) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <a class="btn btn-danger delete-btn" data-nama="{{ $crud->nama }}"
                                                            data-toggle="tooltip">Delete</a>
                                                    </form>
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

@section('scripts')
    <script>
        $(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                var name = $(this).data("nama");

                Swal.fire({
                    title: 'Konfirmasi',
                    html: `Apakah anda yakin ingin menghapus nasabah <b>${name}</b> ?<br/>
                <small><i>*Data yang dihapus tidak dapat dikembalikan</i></small>`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })

            });
        });
    </script>
@endsection
