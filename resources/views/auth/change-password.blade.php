@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-auto align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('auth.change-password-submit') }}" method="POST" class="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold fs-6 mb-2" for="password">Password Lama</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row" data-kt-password-meter="true">
                                    <div class="form-group mb-1">

                                        <label class="form-label fw-semibold fs-6 mb-2" for="password_baru">
                                            Password Baru
                                        </label>

                                        <div class="position-relative mb-3">
                                            <input
                                                class="form-control form-control-lg form-control-solid @error('password_baru') is-invalid @enderror"
                                                type="password" name="password_baru" autocomplete="off"
                                                id="password_baru" />
                                            @error('password_baru')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>

                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center mb-2"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                    </div>

                                    <div class="text-muted mb-4">
                                        Masukkan minimal 8 karakter dengan kombinasi kapital, huruf kecil, angka dan simbol.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label fw-semibold fs-6 mb-2" for="konfirmasi_password">Konfirmasi
                                        Password</label>
                                    <input type="password"
                                        class="form-control @error('konfirmasi_password') is-invalid @enderror"
                                        name="konfirmasi_password" id="konfirmasi_password">
                                    @error('konfirmasi_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary me-4">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
