@extends('main')
@section('page.title', 'Manajemen Akses')
@section('content')

    @include('layouts.toolbar')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/coding/cod001.svg') !!}
                                </span>
                                <h2> {{ $permission->id == null ? 'Tambah Akses' : 'Ubah Akses' }} </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ $permission->id == null ? route('permissions.store') : route('permissions.update', ['id' => $permission->id]) }}"
                                method="POST" class="form">
                                @csrf
                                @if ($permission->id != null)
                                    @method('put')
                                @endif
                                <div class="fv-row mb-7">
                                    <label for="id" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Id</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Id hanya dapat diisi dengan angka, harus berbeda dengan yang sudah ada dan harus bernilai antara 1 sampai 100.000"></i>
                                    </label>
                                    <input type="number" min="1"
                                        class="form-control form-control-solid @error('id') is-invalid @enderror"
                                        name="id" value="{{ old('id', $permission->id) }}" id="id" />
                                    @error('id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="name" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama Akses</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Nama akses harus berbeda dengan yang sudah ada dan harus berisi antara 2 sampai 50 karakter"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-solid text-lowercase @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $permission->name) }}" id="name" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('permissions.index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            {{ $permission->id == null ? 'Simpan' : 'Perbarui' }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
