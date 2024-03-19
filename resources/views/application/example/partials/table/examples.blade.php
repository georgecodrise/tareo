<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">
            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <input type="text" data-kt-docs-table-filter="search-table-simple-examples"
                class="form-control w-250px ps-15" placeholder="Buscar" />
        </h3>

        <div class="card-toolbar flex-row-fluid justify-content-end gap-2">
            <button type="button" id="btn-refresh" class="btn btn-sm btn-light-secondary">
                <i class="fa-solid fa-rotate-right"></i>
                Recargar
            </button>

            <button type="button" id="btn-create-example" class="btn btn-sm btn-light-success" data-bs-toggle="modal"
                data-bs-target="#modal-store-example" data-url="#">
                <i class="fa-solid fa-plus"></i>
                Agregar
            </button>

            <button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                Exportar
            </button>

            <div id="menu-buttons-export-table-simple-examples"
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                data-kt-menu="true">
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="copy">
                        Copiar al portapapeles
                    </a>
                </div>
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                        Exportar como Excel
                    </a>
                </div>
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="csv">
                        Exportar como CSV
                    </a>
                </div>
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="pdf">
                        Exportar como PDF
                    </a>
                </div>
            </div>

            <div id="buttons-export-table-simple-examples" class="d-none"></div>
        </div>
    </div>

    <div class="card-header">
        <div class="card-toolbar flex-row-fluid justify-content-start gap-2">
            <a href="{{ route('app.example.export.excel') }}" target="_blank" class="btn btn-sm btn-light-success">
                <i class="fa-solid fa-file-excel"></i>
                Exportar a Excel
            </a>

            <a href="{{ route('app.example.export.pdf') }}" target="_blank" class="btn btn-sm btn-light-danger">
                <i class="fa-solid fa-file-pdf"></i>
                Exportar a PDF
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="table-simple-examples"
                class="table table-sm align-middle border table-row-bordered rounded g-5 gs-5">
                <thead class="bg-gray-200">
                    <tr class="fw-bold text-uppercase gs-0">
                        <th>ID</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody class="fw-semibold text-gray-700">
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                @if ($post->status == 'published')
                                    <div class="badge badge-light-success fw-bold">
                                        Publicado
                                    </div>
                                @elseif ($post->status == 'draft')
                                    <div class="badge badge-light-warning fw-bold">
                                        Borrador
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="me-0">
                                    <button class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Acciones
                                        <i class="fa-solid fa-chevron-down ms-2"></i>
                                    </button>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="#" id="btn-edit-example" class="menu-link px-3"
                                                data-bs-toggle="modal" data-bs-target="#modal-store-example"
                                                data-url="#">
                                                Editar
                                            </a>
                                            <a href="#" id="btn-delete-example" class="menu-link px-3"
                                                data-url="#">
                                                Eliminar
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
