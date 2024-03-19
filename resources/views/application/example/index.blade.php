@extends('layout.master', [
    'title' => 'Ejemplos',
    'type' => 'app',
    'breadcrumbs' => [
        (object) [
            'name' => 'Inicio',
            'route' => route('app.index'),
        ],
        (object) [
            'name' => 'Ejemplos',
        ],
    ],
])

@section('custom-scripts')
    <script src="{{ asset('assets/application/js/example.js') . '?t=' . time() }}"></script>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Subir archivos</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            Acción
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form_upload_files" class="form" action="{{ route('app.example.upload') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="fv-row mb-8">
                            <label class="required fw-semibold fs-6 mb-2">Archivos</label>

                            <input type="file" name="files[]" class="form-control bg-transparent" multiple />

                            <div id="files-errors" class="invalid-feedback"></div>
                        </div>

                        <div class="d-grid mb-3">
                            <button id="btn_submit_upload_files" type="submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Subir archivos
                                </span>
                                <span class="indicator-progress">
                                    Cargando...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Permisos</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            Acción
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('app.example.permissions') }}" target="_blank" class="btn btn-sm btn-light-primary">
                        <i class="fa-solid fa-key"></i>
                        Permisos
                    </a>
                </div>
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('application.example.partials.table.examples', ['posts' => $posts])
        </div>
    </div>

    @include('application.example.partials.modal.create')
@endsection
