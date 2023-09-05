class Auth {
    constructor(nombre, contra) {
        this.nombre = nombre;
        this.contra = contra;
    }

    autorizar() {
        fetch('/auth', {
            method: 'POST',
            body: datosFormulario
        })
        .then(res => res.json()    
        )
        .then(data => {
            if (data === 'error') {
                console.log("No puedes entrar");
                return;
            }
    
            location.replace("/inicio");
            console.log(data);
        })
    }

    /**
     * Funcion que valida que el parametro contenga texto
     * @param dato Valor a verificar que no este vacio
     * @returns true si es valido o false en caso contrario
     */
    validarDatos(dato) {
        if (dato.trim().length == 0) {
            return false;
        }

        return true;
    }
}