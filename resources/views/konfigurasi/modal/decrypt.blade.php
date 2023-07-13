<div class="modal fade" tabindex="-1" id="modalDekrypt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Decrypt Data</h5>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-2x">
                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr061.svg') !!}
                    </span>
                </div>
            </div>

            <div class="modal-body">
                <div class="fv-row mb-7">
                    <label for="encrypt" class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Encrypt</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Masukkan data enkripsi"></i>
                    </label>
                    <textarea class="form-control form-control-solid" id="encrypt" name="encrypt" rows="3"></textarea>
                </div>
                <div class="fv-row mb-7">
                    <label for="decrypt" class="fs-6 fw-semibold form-label mt-3">
                        <span>Decrypt</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Data dekripsi"></i>
                    </label>
                    <input type="text" class="form-control form-control-solid" name="decrypt" id="decrypt"
                        readonly />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnDecrypt">Decrypt</button>
            </div>
        </div>
    </div>
</div>
