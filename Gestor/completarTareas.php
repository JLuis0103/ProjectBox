<?php

    include_once("cabecera.html");
    include_once("menu.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    require_once("src/Tareas.php");
    require_once("src/Proyectos.php");

    $tareas = new Tareas();
    $proyectos = new Proyectos();

    $info_tareas = $tareas->mostrarTareasDeUsuario($_SESSION['usuario_info']['idusuario']);

    $cantidad = count($info_tareas);

?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Selecciona una Tarea</h1>
                <div class="d-grid gap-2 col-6 mx-auto p-1">
                    <a href="tareas.php" class="btn btn-secondary">Regresar</a>
                    <hr>
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Mis Tareas</h1>
                    <br>
                    <div class="row">
                        <?php

                            if($cantidad > 0 ){
                                for($x = 0; $x < $cantidad; $x++){                   
                                    $item = $info_tareas[$x];
                                    $proyecto = $proyectos->mostrarProyectoPorID($item['idproyecto']);

                        ?>
                            <div class="col-lg-4 mx-auto">
                                <a href="subirTarea.php?idtarea=<?php print $item['idtarea'] ?>" class="btn btn-light align-items-center justify-content-center botonTareas">
                                    <i class="fa-sharp fa-solid fa-thumbtack fa-xl" style="color: #212529;"></i>
                                </a>
                                <h3 class="fs-2"><?php print $item['nombretarea'] ?></h3>
                                <h4 class="fs-6 text-secondary"><?php print $proyecto['nombreproyecto'] ?></h4>
                                <p><?php print $item['descripcion'] ?></p>
                            </div>
                        <?php

                                }
                            } else {

                        ?>
                            <div class="col-lg-4 mx-auto">
                                <h3 class="fs-2 text-secondary">Felicidades!</h3>
                                <h4 class="fs-6 text-secondary">Pareces que has terminado con todos tus pendientes.</h4>
                            </div>
                            <hr>
                        <?php

                            }

                        ?>
                    </div>
                    <br>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>