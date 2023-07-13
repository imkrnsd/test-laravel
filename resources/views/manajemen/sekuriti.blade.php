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
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen047.svg') !!}
                                </span>
                                <h2>{{ $title }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('manajemen-sekuriti.update') }}" method="POST" class="form">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="min_pass" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Panjang Minimum Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Jumlah karakter minimal ketika pembuatan password"></i>
                                    </label>
                                    <input type="number" min="1"
                                        class="form-control form-control-solid @error('min_pass') is-invalid @enderror"
                                        name="min_pass" value="{{ config('secure.APP_SEKURITI_LENGTH_PASS_MIN') }}"
                                        id="min_pass" />
                                    @error('min_pass')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="max_fail_login" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Maksimal Kesalahan Login</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Jumlah maksimal kesalahan login yang dilakukan sebelum user diblokir"></i>
                                    </label>
                                    <input type="number" min="1"
                                        class="form-control form-control-solid @error('max_fail_login') is-invalid @enderror"
                                        id="max_fail_login" name="max_fail_login"
                                        value="{{ config('secure.APP_SEKURITI_FAIL_LOGIN') }}" />
                                    @error('max_fail_login')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="exp_pass" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Lama Expired Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Lamanya sebuah password menjadi usang (*dalam bulan)"></i>
                                    </label>
                                    <input type="number" min="1"
                                        class="form-control form-control-solid @error('exp_pass') is-invalid @enderror"
                                        id="exp_pass" name="exp_pass"
                                        value="{{ config('secure.APP_SEKURITI_PASSWORD_EXP') }}" />
                                    @error('exp_pass')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="session_timeout" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Session Timeout</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Lamanya durasi sebuah session (*dalam menit)"></i>
                                    </label>
                                    <input type="number" min="1"
                                        class="form-control form-control-solid @error('session_timeout') is-invalid @enderror"
                                        id="session_timeout" name="session_timeout"
                                        value="{{ config('secure.APP_SEKURITI_SESSION_TIME') }}" />
                                    @error('session_timeout')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Perbarui</span>
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
