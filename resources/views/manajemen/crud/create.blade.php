@extends('main')

@section('content')
    @include('layouts.toolbar')
    @include('sweetalert::alert')

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
                                <h2> {{ $crud->id == null ? 'Tambah Nasabah' : 'Ubah Nasabah' }} </h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form
                                action="{{ $crud->id == null ? route('crud.store') : route('crud.update', ['id' => enkrip($crud->id)]) }}"
                                method="POST" class="form">
                                @csrf
                                @if ($crud->id != null)
                                    @method('put')
                                @endif
                                <div class="fv-row mb-7">
                                    <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Nama nasabah harus berbeda dengan yang sudah ada dan harus berisi antara 2 sampai 50 karakter"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama', $crud->nama) }}" id="nama" />
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Alamat</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Masukkan alamat nasabah"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat', $crud->alamat) }}" id="alamat" />
                                    @error('alamat')
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
                                        id="kt_default_daterangepicker" name="tgl_lahir"
                                        value="{{ old('tgl_lahir', $crud->tgl_lahir) }}" />
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="profesi" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Profesi</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Profesi wajib dipilih"></i>
                                    </label>
                                    <select class="form-select form-select-solid @error('profesi') is-invalid @enderror"
                                        name="profesi" data-control="select2" data-placeholder="---Pilih Profesi---">
                                        <option value="{{ old('model_box', $crud->profesi) }}">
                                            {{ old('model_box', $crud->profesi) }}</option>
                                        {{-- <option value="Guru">Guru</option>
                                        <option value="Atlet">Atlet</option>
                                        <option value="Dokter">Dokter</option> --}}
                                        @foreach ($professions as $profession)
                                            {{-- @if ($profession !== $professions) --}}
                                            <option value="{{ $profession->Name }}">{{ $profession->Name }}</option>
                                            {{-- @endif --}}
                                        @endforeach

                                    </select>
                                </div>

                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('crud.index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            {{ $crud->id == null ? 'Simpan' : 'Perbarui' }}
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
