<?php

    include_once("cabecera.html");
    include_once("menu.php");

?>

    <div class="p-4 mainLogin">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 dark bg-dark text-light" id="principal2">
                <br>
                <h2 class="text-center">Iniciar sesion</h2>
                <br>
                <?php

                    include_once("login.php")

                ?>
                <div class="col-md-8 text-center mx-auto">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Usuario:</label>
                            <input type="text" class="form-control text-center bg-dark text-light" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contrase&ntilde;a:</label>
                            <input type="password" class="form-control text-center bg-dark text-light" name="contrasena" required>
                        </div>
                        <br>
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="6LeOLSYmAAAAAB6vhLTYwgLQv3XGHrDL1r8PoURI">

                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto p-1">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                        <p>&iquest;Aun no tienes una cuenta? <a href="registro.php" class="link-light">Registrate aqui.</a></p>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

    include_once("pie.html");

?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>