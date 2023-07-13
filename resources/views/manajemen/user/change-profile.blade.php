@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-auto align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                </span>
                                <h2>Ubah Profile</h2>
                            </div>
                        </div>
                        <form action="{{ route('manajemen-user.update-profile') }}" method="POST" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="fv-row mb-7">
                                    <label for="foto" class="d-block fw-semibold fs-6 mb-5">Foto Profile</label>
                                    <div class="image-input image-input-outline image-input-placeholder"
                                        data-kt-image-input="true">
                                        <div id="preview-image" class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ auth()->user()->id_file_foto ? asset('storage/' . auth()->user()->foto->path_file) : 'metronic/demo2/assets/media/avatars/blank.png' }});">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti foto">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" id="foto" name="foto"
                                                accept=".png, .jpg, .jpeg" />
                                        </label>
                                        <span id="remove-avatar"
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove-avatar" data-bs-toggle="tooltip"
                                            title="Hilangkan foto">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Tipe file yang diizinkan: png, jpg, jpeg.</div>
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="name" class="required fw-semibold fs-6 mb-2">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Lengkap"
                                        value="{{ old('name', auth()->user()->name) }}" autocomplete="off" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="email" class="required fw-semibold fs-6 mb-2">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com"
                                        value="{{ old('email', auth()->user()->email) }}" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="tanggal_lahir" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Tanggal Lahir</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Masukkan tanggal lahir dengan format 'YYYY-MM-DD' contoh: 1999-01-21"></i>
                                    </label>
                                    <input class="form-control form-control-solid" placeholder="Pilih Tanggal Lahir"
                                        id="kt_default_daterangepicker" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}" />
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Perbarui</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const imageFileType = ['png', 'jpg', 'jpeg'];
        const errorMessageImageFormat = 'Masukkan file dengan ekstensi file .png, .jpg, atau .jpeg saja!';
        const imageUrl = 'metronic/demo2/assets/media/avatars/blank.png';

        $('#foto').on('change', function() {
            let file = this.files[0];
            let ext = $(this).val().split('.').pop().toLowerCase();

            if (file) {
                // check ekstensi file
                if ($.inArray(ext, imageFileType) == -1) {
                    $(this).val('');
                    $('#preview-image').css('background-image', 'url(' + imageUrl + ')');
                    return Swal.fire({
                        icon: 'error',
                        title: 'Gagal mengunggah file',
                        html: errorMessageImageFormat
                    });
                }
            }
        });

        $('#remove-avatar').on('click', function() {
            $('#preview-image').css('background-image', 'url(' + imageUrl + ')');
            $('#foto').val(null);

            $.ajax({
                url: "{{ route('manajemen-user.remove-profile-picture') }}",
                type: 'GET',
                contentType: 'application/json',
                success: (data) => {
                    Swal.fire({
                        title: "Info",
                        html: data,
                        icon: "success",
                    });
                }
            });
        });
    </script>
@endsection
