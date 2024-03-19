
/**
 * Maneja una solicitud de Axios para un formulario.
 *
 * @param {Object} options - Las opciones de configuración.
 * @param {string} options.form - El selector del formulario.
 * @param {string} options.buttonSubmit - El selector del botón de envío del formulario.
 * @param {Function} options.actionSuccess - La función a ejecutar en caso de éxito.
 * @param {string} options.messageSuccess - El mensaje de éxito a mostrar.
 * @param {string|null} options.modal - El selector del modal a ocultar en caso de éxito.
 *
 * @returns {Object} - Un objecto con el método para iniciar la función.
 */
const handleAxiosRequestForm = ({
    form,
    buttonSubmit,
    actionSuccess,
    messageSuccess,
    modal = null,
}) => {
    const submitForm = () => {
        $(document).on('submit', form, function (e) {
            e.preventDefault()

            resetErrorFields()

            let formAction = $(this).attr('action')
            let formMethod = $(this).attr('method')
            let formData = new FormData(this)

            toggleButtonSubmit({ state: 'disabled' })

            axios({
                method: formMethod,
                url: formAction,
                data: formData,
            }).then(function (response) {
                if (response?.status === 200) {
                    customSweetAlertSuccess({
                        action: () => {
                            actionSuccess()

                            if (modal) {
                                $(modal).modal('hide')
                            }

                            KTComponents.init()
                        },
                        message: messageSuccess,
                    })
                } else {
                    customSweetAlertError({
                        message: 'Ha ocurrido un inconveniente, intente nuevamente.',
                    })
                }
            }).catch(function (error) {
                if (error?.response?.data?.errors) {
                    let errors = error.response.data.errors

                    setErrorsFields({ errors })
                }

                if (error?.response?.data?.message) {
                    customSweetAlertError({
                        message: error?.response?.data?.message,
                    })
                }
            }).then(() => {
                toggleButtonSubmit({ state: 'enabled' })
            })
        })
    }

    const setErrorsFields = ({ errors }) => {
        Object.keys(errors).forEach(function (keyName) {
            let input = $(form).find(`[name="${keyName}"]`)
            let inputArray = $(form).find(`[name="${keyName}[]"]`)
            let error = errors[keyName]

            Object.keys(error).forEach(function (keyMessage) {
                let message = error[keyMessage]

                if (input || inputArray) {
                    input.addClass('is-invalid')
                    inputArray.addClass('is-invalid')

                    let invalidFeedback = $(form).find(`#${keyName}-errors`)

                    if (invalidFeedback) {
                        invalidFeedback.html(message)
                    }
                }
            })
        })
    }

    const resetErrorFields = () => {
        $(form).find('input, select, textarea').each(function () {
            $(this).removeClass('is-invalid')
        })
    }

    const toggleButtonSubmit = ({ state }) => {
        if (state === 'enabled') {
            $(buttonSubmit).removeAttr('disabled')
            $(buttonSubmit).removeAttr('data-kt-indicator')
        }

        if (state === 'disabled') {
            $(buttonSubmit).attr('disabled', true)
            $(buttonSubmit).attr('data-kt-indicator', 'on')
        }
    }

    return {
        init: function () {
            submitForm()
        }
    }
}
