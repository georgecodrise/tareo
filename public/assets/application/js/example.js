
handleAxiosRequestForm({
    form: '#form_upload_files',
    buttonSubmit: '#btn_submit_upload_files',
    actionSuccess: () => {
        $('#form_upload_files').trigger("reset")
    },
    messageSuccess: 'Se han subido los archivos correctamente',
}).init()

handleDataTable({
    table: '#table-simple-examples',
    inputSearch: 'search-table-simple-examples',
    menuButtonsExport: 'menu-buttons-export-table-simple-examples',
    buttonsExport: 'buttons-export-table-simple-examples',
    documentTitle: 'Ejemplos simples',
    exportColumns: [0, 1, 2, 3],
}).init()

handleAxiosRequestForm({
    form: '#form-store-example',
    buttonSubmit: '#btn-submit-store-example',
    messageSuccess: 'Se ha creado el ejemplo correctamente',
    modal: '#modal-store-example',
    actionSuccess: () => {
        $('#form-store-example').trigger("reset")
    },
}).init()

$(document).on('click', '#btn-delete-example', function () {
    let id = $(this).attr('data-id')

    customSweetAlertConfirm({
        message: '¿Está seguro de que desea eliminar este ejemplo?',
        title: 'Confirmación de eliminación de ejemplo',
    })
})
