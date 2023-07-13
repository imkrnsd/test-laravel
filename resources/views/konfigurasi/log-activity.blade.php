@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/technology/teh009.svg') !!}
                        </span>
                        <h2>{{ $title }}</h2>
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-2">
                                {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/general/gen031.svg') !!}
                                Filter
                            </span>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <form action="{{ route('konfigurasi.log-activity') }}">
                                    <div class="mb-7">
                                        <label for="role" class="form-label fs-6 fw-semibold">Role :</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                            data-placeholder="Pilih Role" data-allow-clear="true" id="role"
                                            data-control="select2" name="role">
                                            <option></option>
                                            @foreach ($stmtRole as $role)
                                                @if (request('role') === $role->name)
                                                    <option value="{{ $role->name }}" selected>{{ $role->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-7">
                                        <label for="user" class="form-label fs-6 fw-semibold">User :</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                            data-placeholder="Pilih User" data-allow-clear="true" id="user"
                                            data-control="select2" name="user">
                                            <option></option>
                                            @foreach ($stmtUser as $user)
                                                @if (request('user') == $user->id)
                                                    <option value="{{ $user->id }}" selected>{{ $user->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @can('decrypt')
                            <button type="button" id="btnModalDecrypt" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalDekrypt">
                                Decrypt
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="card-body py-4">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    @include('konfigurasi.modal.decrypt')
    @include('modals.detail-user')
@endsection

@section('scripts')
    @can('decrypt')
        <script>
            $('#btnModalDecrypt').on('click', function() {
                $('#encrypt').val('');
                $('#decrypt').val('');
            });
            $('#btnDecrypt').on('click', function() {
                let dataBody = {
                    'encrypt': $('#encrypt').val()
                }
                $.ajax({
                    url: `{{ route('konfigurasi.decrypt') }}`,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(dataBody),
                    success: (data) => {
                        $('#decrypt').val(data);
                    }
                });
            });
        </script>
    @endcan
    {{ $dataTable->scripts() }}
    @can('user_show')
        <script>
            $(document).on('click', '.btnModalUser', function() {
                const defaultBackgroundImage = '/metronic/demo2/assets/media/illustrations/sigma-1/20.png';
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };

                let dataObject = JSON.parse(atob($(this).attr('data-object')));
                let backgroundImage = dataObject.id_file_foto != null ? '/storage/' + dataObject.foto.path_file :
                    defaultBackgroundImage;
                let rolesName = [];
                $.each(dataObject.roles, (key, value) => rolesName.push(value.name));

                let tanggalLahir = new Date(dataObject.tanggal_lahir).toLocaleDateString('id-ID',
                    options);
                let expiredPassword = new Date(dataObject.expired_password).toLocaleDateString('id-ID',
                    options);

                $('#preview-image').css('background-image', 'url(' + backgroundImage + ')');
                $('#nrik').text(`: ${dataObject.nrik}`);
                $('#username').text(`: ${dataObject.username}`);
                $('#roles').text(`: ${rolesName.join(', ')}`);
                $('#name').text(`: ${dataObject.name}`);
                $('#email').text(`: ${dataObject.email}`);
                $('#tanggal_lahir').text(`: ${tanggalLahir}`);
                $('#unit_kerja').text(`: ${dataObject.unit_kerja.nama}`);
                $('#expired_password').text(`: ${expiredPassword}`);
            });
        </script>
    @endcan
@endsection
