document.addEventListener("DOMContentLoaded", function() {
    
    var registrar = document.querySelector('#registrar');
    registrar.disabled = true;

    
    var inputs = document.querySelectorAll('#myForm input');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function() {
        
        var empty = false;
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
            empty = true;
            break;
            }
        }

        var usuario = document.querySelector('#usuario').value;
        var contrasena = document.querySelector('#contrasena').value;
        var iguales = (usuario === contrasena);

        
        var contrasenaValida = false;
        var regexMayus = /[A-Z]/;
        var regexEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        if (contrasena.length >= 8 && regexMayus.test(contrasena) && regexEspecial.test(contrasena)) {
            contrasenaValida = true;
        }

        
        var correo = document.querySelector('#correo').value;
        var correoValido = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo));

        
        if (!empty && !iguales && contrasenaValida && correoValido) {
            registrar.disabled = false;
        } else {
            registrar.disabled = true;
        }
        });
    }
});
  