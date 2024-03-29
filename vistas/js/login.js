$('document').ready(() => {
    var datos_persona = {

        usuario: $('#userID'),
        clave: $('#passwordID')
    }
    let frm_login = $('#frm_login');

    frm_login.submit(e => {
        e.preventDefault();
        $.post(frm_login.attr('action'), {
            usuario: datos_persona.usuario.val(),
            clave: datos_persona.clave.val()
        }, res => {

            if (res.login) {
                swal({
                    title: "BIENVENIDO",
                    text: res.nombres + " " + res.apellidos,
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                window.setTimeout(function() {
                    window.location.href = link + 'menu/';

                }, 2000);

                console.log(res.login);
            } else {
                swal({
                    title: "ERROR!!",
                    text: "Usuario y/o Contraseña incorrecta",
                    type: "error",
                    buttons: true,
                    position: 'bottom-end'
                });

            }
        })
    })


})