<div class="modal fade" tabindex="-1" id="modal-store-example" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Agregar ejemplo</h3>

                <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            <form id="form-store-example" action="{{ route('app.example.store') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="fv-row mb-4">
                        <label class="required fw-semibold">Título</label>
                        <input type="text" class="form-control" name="title">

                        <div id="title-errors" class="invalid-feedback"></div>
                    </div>

                    <div class="fv-row mb-4">
                        <label class="required fw-semibold">Contenido</label>
                        <textarea class="form-control" name="content"></textarea>

                        <div id="content-errors" class="invalid-feedback"></div>
                    </div>

                    <div class="fv-row mb-4">
                        <label class="required fw-semibold">Estado</label>
                        <select name="status" class="form-select" data-control="select2"
                            data-placeholder="Seleccione una opción" data-hide-search="true">
                            <option></option>
                            <option value="published">Publicado</option>
                            <option value="draft">Borrador</option>
                        </select>

                        <div id="status-errors" class="invalid-feedback"></div>
                    </div>

                    <div class="fv-row mb-4">
                        <label>
                            <span class="required"></span>
                            Campos obligatorios
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn-submit-store-example" type="submit" class="btn btn-success">
                        <span class="indicator-label">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar
                        </span>
                        <span class="indicator-progress">
                            Cargando...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
