
/**
 * Maneja la configuración y funcionalidad de una tabla DataTable.
 *
 * @param {Object} options - Las opciones de configuración de la tabla.
 * @param {string} options.table - El selector del elemento HTML que contiene la tabla.
 * @param {string} options.inputSearch - El selector del elemento HTML que contiene el campo de búsqueda.
 * @param {string} options.menuButtonsExport - El selector del elemento HTML que contiene el menú de botones de exportación.
 * @param {string} options.buttonsExport - El selector del elemento HTML que contiene los botones de exportación.
 * @param {string} options.documentTitle - El título del documento de exportación.
 * @param {Array} [options.exportColumns] - Las columnas que se exportarán.
 *
 * @returns {Object} - Un objeto con métodos para iniciar la función.
 */
const handleDataTable = ({
    table,
    inputSearch,
    menuButtonsExport,
    buttonsExport,
    documentTitle,
    exportColumns = [],
}) => {
    let newDataTable

    const dataTablesOptions = {
        language: {
            sProcessing: 'Procesando...',
            sLengthMenu: 'Mostrar _MENU_ registros',
            sZeroRecords: `
                <div class="text-center">
                    <div>
                        <i class="ki-duotone ki-magnifier fs-4x mb-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    No se encontraron resultados
                </div>
            `,
            sEmptyTable: `
                <div class="text-center">
                    <div>
                        <i class="ki-duotone ki-magnifier fs-4x mb-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    Ningún dato disponible en esta tabla
                </div>
            `,
            sInfo: '',
            sInfoEmpty: '',
            sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
            sInfoPostFix: '',
            sSearch: 'Buscar:',
            sUrl: '',
            sInfoThousands: ',',
            sLoadingRecords: 'Cargando...',
            oPaginate: {
                sFirst: 'Primero',
                sLast: 'Último',
                sNext: 'Siguiente',
                sPrevious: 'Anterior'
            },
            oAria: {
                sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                sSortDescending: ': Activar para ordenar la columna de manera descendente'
            },

            buttons: {
                copyTitle: 'Copiado al portapapeles',
                copySuccess: {
                    _: 'Se han copiado %d filas al portapapeles',
                    1: 'Se ha copiado 1 fila al portapapeles'
                }
            },
        },
    }

    const initDataTable = function () {
        newDataTable = $(table).DataTable(dataTablesOptions)
    }

    const handleExportButtons = () => {
        const buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: exportColumns
                    }
                }
            ],
        }).container().appendTo($(`#${buttonsExport}`))

        const exportButtons = document.querySelectorAll(`#${menuButtonsExport} [data-kt-export]`)
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault()

                const exportValue = e.target.getAttribute('data-kt-export')
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue)

                target.click()
            })
        })
    }


    const handleSearchDataTable = () => {
        const filterSearch = document.querySelector(`[data-kt-docs-table-filter="${inputSearch}"]`)
        filterSearch.addEventListener('keyup', (e) => {
            newDataTable.search(e.target.value).draw()
        })
    }

    return {
        init: () => {
            initDataTable()
            handleSearchDataTable()
            handleExportButtons()
        }
    }
}
