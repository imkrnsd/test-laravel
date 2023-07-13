@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-auto align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                </span>
                                <h2>Tambah User Baru</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('manajemen-user.store') }}" method="POST" class="form">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="nrik" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">NRIK</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="NRIK hanya bisa diisi dengan angka, harus berbeda dengan yang sudah ada dan berisi 8 karakter"></i>
                                    </label>
                                    <input type="text" maxlength="8" autocomplete="off"
                                        class="form-control form-control-solid positive-numeric @error('nrik') is-invalid @enderror"
                                        name="nrik" value="{{ old('nrik') }}" id="nrik" />
                                    @error('nrik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="name" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Nama hanya bisa diisi dengan huruf, titik, koma dan/atau spasi saja."></i>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" id="name" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="email" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Email</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Email harus berbeda dengan yang sudah ada. Email wajib diisi menggunakan alamat surel yang valid"></i>
                                    </label>
                                    <input type="email"
                                        class="form-control form-control-solid @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" id="email" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Tanggal Lahir</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Masukkan tanggal lahir dengan format 'YYYY-MM-DD' contoh: 1999-01-21"></i>
                                    </label>
                                    <input class="form-control form-control-solid" placeholder="Pilih Tanggal Lahir"
                                        id="kt_default_daterangepicker" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" />
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="id_unit_kerja" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Unit Kerja</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Hanya unit kerja yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                        class="form-select form-select-solid @error('id_unit_kerja') is-invalid @enderror"
                                        id="id_unit_kerja" name="id_unit_kerja" data-control="select2"
                                        data-placeholder="---Pilih Unit Kerja---">
                                        <option></option>
                                        @foreach ($stmtUnitKerja as $unitKerja)
                                            <option value="{{ $unitKerja->id_unit_kerja }}"
                                                {{ old('id_unit_kerja') == $unitKerja->id_unit_kerja ? 'selected' : '' }}>
                                                {{ $unitKerja->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_unit_kerja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="id_role" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Role</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Role wajib dipilih minimal 1 dan dapat dipilih lebih dari 1"></i>
                                    </label>
                                    <select class="form-select form-select-solid @error('id_role') is-invalid @enderror"
                                        id="id_role" name="id_role[]" data-control="select2" multiple
                                        data-placeholder="---Pilih Role---">
                                        <option></option>
                                        @foreach ($stmtRole as $role)
                                            <option value="{{ $role->id }}"
                                                {{ in_array($role->id, old('id_role') ?? []) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('manajemen-user.index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
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
