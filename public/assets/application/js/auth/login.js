
handleAxiosRequestForm({
    form: '#form_login',
    buttonSubmit: '#btn_submit_login',
    actionSuccess: () => {
        location.reload()
    },
    messageSuccess: 'Se ha iniciado sesión correctamente.',
}).init()
