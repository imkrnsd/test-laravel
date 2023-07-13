@extends('main')
@section('page.title', 'Manajemen Role')

@section('styles')
    <link href="{{ asset('dual-listbox/dual-listbox.css') }}" rel="stylesheet" />
@endsection
@section('content')

    @include('layouts.toolbar')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                </span>
                                <h2> {{ $role->id == null ? 'Tambah Role' : 'Ubah Role' }} </h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form
                                action="{{ $role->id == null ? route('roles.store') : route('roles.update', ['id' => enkrip($role->id)]) }}"
                                method="POST" class="form">
                                @csrf
                                @if ($role->id == null)
                                    <div class="fv-row mb-7">
                                        <label for="id" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Id</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Id hanya dapat diisi dengan angka, harus berbeda dengan yang sudah ada dan harus bernilai antara 1 sampai 100"></i>
                                        </label>
                                        <input type="number" min="1"
                                            class="form-control form-control-solid @error('id') is-invalid @enderror"
                                            name="id" value="{{ old('id', $role->id) }}" id="id" />
                                        @error('id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    @method('put')
                                @endif
                                <div class="fv-row mb-7">
                                    <label for="name" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama Role</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Nama role harus berbeda dengan yang sudah ada dan harus berisi antara 2 sampai 50 karakter"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $role->name) }}" id="name" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="fvrow mb-7">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span class="required">Permission</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Permission wajib dipilih minimal 1 dan dapat dipilih lebih dari 1"></i>
                                        </label>
                                        <select class="form-control @error('permissions') is-invalid @enderror"
                                            id="permissions" name="permissions[]" multiple>
                                            @foreach ($permissions as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ in_array($item->name, old('permissions') ?? []) ? 'selected' : (in_array($item->name, $rolePermissions) ? 'selected' : '') }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('permissions')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="fvrow mb-7">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span class="required">Menu</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Menu wajib dipilih minimal 1 dan dapat dipilih lebih dari 1"></i>
                                        </label>
                                        <select class="form-control @error('menus') is-invalid @enderror" id="menus"
                                            name="menus[]" multiple>
                                            @foreach ($menus as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->name, old('menus') ?? []) ? 'selected' : (in_array($item->name, $roleMenus) ? 'selected' : '') }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('menus')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('roles.index') }}" class="btn btn-light me-3">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            {{ $role->id == null ? 'Simpan' : 'Perbarui' }}
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

@section('scripts')
    <script src="{{ asset('dual-listbox/dual-listbox.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            new DualListbox('#permissions');
            new DualListbox('#menus');
        });
    </script>
@endsection
