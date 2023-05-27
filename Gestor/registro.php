<?php

    include_once("cabecera.html");
    include_once("menu.php");

?>

    <div class="p-4 main">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 dark bg-dark text-light" id="principal2">
                <br>
                <h2 class="text-center">Registrate</h2>
                <br>
                <?php

                    include_once("register.php")

                ?>
                <div class="col-md-8 text-center mx-auto">
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="nombre" id="nombre" placeholder="Nombre" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="apellidop" id="apellidop" placeholder="Apellido paterno" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="apellidom" id="apellidom" placeholder="Apellido materno" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="usuario" id="usuario" placeholder="Usuario" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="email" class="form-control text-center bg-dark text-light indicador" name="correo" id="correo" placeholder="Correo" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="password" class="form-control text-center bg-dark text-light indicador" name="contrasena" id="contrasena" placeholder="Contrase&ntilde;a" required>
                        </div>
                        <div class="text-center">
                              <p>El usuario y la contraseña no pueden ser iguales.</p>
                              <p>La contraseña debe tener como mínimo 8 de longitud y debe incluir una letra mayúscula y un carácter de tipo especial.</p>
                              <p>Verificar que el correo este dado en el formato correcto.</p>
                              <p>Ningún campo puede quedar vacío.</p>
                            </div>
                        <div class="d-grid gap-2 col-6 mx-auto p-1">
                            <button type="submit" class="btn btn-success" id="registrar">Registrarse</button>
                        </div>
                        <p>&iquest;Ya tienes una cuenta? <a href="index.php" class="link-light">Inicia sesion aqui.</a></p>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php

    include_once("pie.html");

?>

<script src="js/registro.js"></script>