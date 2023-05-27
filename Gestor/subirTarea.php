<?php

    include_once("cabecera.html");
    include_once("menu.php");

    require_once("src/Tareas.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['idtarea']) && is_numeric($_GET['idtarea'])){
        $idtarea = $_GET['idtarea'];

        $tareas = new Tareas();
        $resultado = $tareas->mostrarTareasPorId($idtarea);

        if(!$resultado)
            header('Location: completarTareas.php');

    } else {
        header('Location: completarTareas.php');
    }

?>

<div class="p-4 mainLogin">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Subir Tarea</h1>
                <div class="col-md-6 mx-auto">
                    <hr>
                    <h3 class="fs-1"><?php print $resultado['nombretarea'] ?></h3>
                    <h4 class="fs-5 text-secondary"><?php print $resultado['descripcion'] ?></h4>
                    <br>
                    <?php

                        include_once("accionesTareas.php");

                    ?>
                    <br>
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <label class="form-label">URL de la tarea:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="url" id="url" placeholder="URL" required>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="idtarea"
                            id="idtarea" value="<?php print $resultado['idtarea'] ?>" required>
                        <br>
                        <div class="d-grid gap-2 col-4 mx-auto p-1">
                            <button type="submit" class="btn btn-info text-light btn-lg" id="registrar" name="accion" value="subir">Subir</button>
                            <a href="completarTareas.php" class="btn btn-secondary" id="regresar">Regresar</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>