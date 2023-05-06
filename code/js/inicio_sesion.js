const formulario = document.getElementById('formulario');

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    let datosFormulario = new FormData(formulario);

    console.log(datosFormulario.get('usuario_nombre'));
    console.log(datosFormulario.get('usuario_contra'));

    if (!validarDatos(datosFormulario.get('usuario_nombre')) || !validarDatos(datosFormulario.get('usuario_contra'))) {
        console.log("No valido");
        return false;
    }

    

    console.log("Valido");
    fetch('/auth', {
        method: 'POST',
        body: datosFormulario
    })
    .then(res => res.json())
    .then(data => {
        if (data === 'error') {
            console.log("No puedes entrar");
            return;
        }

        location.replace("/inicio");
        console.log(data);
    })
});

/**
 * Funcion que valida que el parametro contenga texto
 * @param dato Valor a verificar que no este vacio
 * @returns true si es valido o false en caso contrario
 */
function validarDatos(dato) {
    if (dato.trim().length == 0) {
        return false;
    }

    return true;
}