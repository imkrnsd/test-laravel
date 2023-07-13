<div class="modal fade" tabindex="-1" id="modalUser">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data User</h5>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-2x">
                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr061.svg') !!}
                    </span>
                </div>
            </div>

            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="image-input image-input-outline image-input-placeholder">
                            <div id="preview-image" class="image-input-wrapper w-125px h-125px"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-semibold text-gray-600 fs-7">NRIK</div>
                            </div>
                            <div class="col-md-9">
                                <div class="fw-bold text-gray-800 fs-6" id="nrik"></div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-semibold text-gray-600 fs-7">Username</div>
                            </div>
                            <div class="col-md-9">
                                <div class="fw-bold text-gray-800 fs-6" id="username"></div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="fw-semibold text-gray-600 fs-7">Role</div>
                            </div>
                            <div class="col-md-9">
                                <div class="fw-bold text-gray-800 fs-6" id="roles"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="fw-semibold text-gray-600 fs-7">Nama</div>
                            </div>
                            <div class="col-md-9">
                                <div class="fw-bold text-gray-800 fs-6" id="name"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3">
                        <div class="fw-semibold text-gray-600 fs-7">Email</div>
                    </div>
                    <div class="col-xl-9">
                        <div class="fw-bold text-gray-800 fs-6" id="email"></div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3">
                        <div class="fw-semibold text-gray-600 fs-7">Tanggal Lahir</div>
                    </div>
                    <div class="col-xl-9">
                        <div class="fw-bold text-gray-800 fs-6" id="tanggal_lahir"></div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3">
                        <div class="fw-semibold text-gray-600 fs-7">Unit Kerja</div>
                    </div>
                    <div class="col-xl-9">
                        <div class="fw-bold text-gray-800 fs-6" id="unit_kerja"></div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3">
                        <div class="fw-semibold text-gray-600 fs-7">Expired Password</div>
                    </div>
                    <div class="col-xl-9">
                        <div class="fw-bold text-gray-800 fs-6" id="expired_password"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
