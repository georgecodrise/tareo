
/**
 * Alerta personalizada de carga.
 *
 * @param {Object} options - Opciones para la alerta personalizada.
 * @param {string} options.title - El título de la alerta. Por defecto: 'Cargando...'.
 * @param {Function} options.action - La función a ejecutar después de cerrar la alerta. Por defecto: una función vacía.
 */
const customSweetAlertLoading = ({
    title = 'Cargando...',
    action = () => { }
}) => {
    Swal.fire({
        title: title,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        },
    }).then(function () {
        action()
    })
}

/**
 * Alerta personalizada de éxito.
 *
 * @param {Object} options - Opciones para personalizar la alerta.
 * @param {string} options.message - Mensaje de la alerta. Por defecto: 'Acción realizada correctamente'.
 * @param {string} options.title - Título de la alerta. Por defecto: 'Buen trabajo'.
 * @param {string} options.confirmButtonText - Texto del botón de confirmación. Por defecto: 'Aceptar'.
 * @param {Function} options.action - Acción a ejecutar después de confirmar la alerta. Por defecto: función vacía.
 */
const customSweetAlertSuccess = ({
    message = 'Acción realizada correctamente',
    title = 'Buen trabajo',
    confirmButtonText = 'Aceptar',
    action = () => { }
}) => {
    Swal.fire({
        icon: 'success',
        title: title,
        html: message,
        buttonsStyling: false,
        confirmButtonText: confirmButtonText,
        customClass: {
            confirmButton: 'btn btn-success'
        }
    }).then(function () {
        action()
    })
}

/**
 * Alerta personalizada para confirmar una acción.
 *
 * @param {Object} options - Opciones para personalizar el cuadro de diálogo de confirmación.
 * @param {string} options.message - El mensaje a mostrar en el cuadro de diálogo de confirmación. Por defecto: '¿Está seguro de que desea realizar esta acción?'.
 * @param {string} options.title - El título del cuadro de diálogo de confirmación. Por defecto: 'Confirmación de acción'.
 * @param {string} options.confirmButtonText - El texto del botón de confirmación. Por defecto: 'Aceptar'.
 * @param {string} options.cancelButtonText - El texto del botón de cancelación. Por defecto: 'Cancelar'.
 * @param {Function} options.action - La función a ejecutar cuando se confirma la acción. Por defecto: una función vacía.
 * @param {Function} options.actionCancelled - La función a ejecutar cuando se cancela la acción. Por defecto: una función vacía.
 */
const customSweetAlertConfirm = ({
    message = '¿Está seguro de que desea realizar esta acción?',
    title = 'Confirmación de acción',
    confirmButtonText = 'Aceptar',
    cancelButtonText = 'Cancelar',
    action = () => { },
    actionCancelled = () => { }
}) => {
    Swal.fire({
        icon: 'warning',
        title: title,
        html: message,
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText,
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-danger'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            action()
        } else {
            actionCancelled()
        }
    })
}

/**
 * Alerta personalizada de error.
 *
 * @param {Object} options - Opciones para la alerta personalizada.
 * @param {string} options.message - El mensaje de error. Por defecto: 'Ha ocurrido un inconveniente, intente nuevamente.'.
 * @param {string} options.title - El título de la alerta. Por defecto: 'Error'.
 * @param {string} options.confirmButtonText - El texto del botón de confirmación. Por defecto: 'Aceptar'.
 * @param {Function} options.action - La función a ejecutar después de confirmar la alerta. Por defecto: una función vacía.
 * @param {Object} options.response - La respuesta del servidor. Por defecto: un objeto vacío.
 */
const customSweetAlertError = ({
    message = 'Ha ocurrido un inconveniente, intente nuevamente.',
    title = 'Error',
    confirmButtonText = 'Aceptar',
    action = () => { },
    response = {},
}) => {
    if (response?.status === 401) {
        location.reload()
    } else if (response?.status === 419) {
        location.reload()
    } else {
        return Swal.fire({
            icon: 'error',
            title: title,
            html: message,
            buttonsStyling: false,
            confirmButtonText: confirmButtonText,
            customClass: {
                confirmButton: 'btn btn-danger'
            }
        }).then(function () {
            action()
        })
    }
}
