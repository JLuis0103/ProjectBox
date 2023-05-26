<?php

    require_once("src/Tareas.php");
    require_once("src/Proyectos.php");

    $tareas = new Tareas();
    $proyectos = new Proyectos();

    $info_tareas = $tareas->mostrarTareasDeUsuario($_SESSION['usuario_info']['idusuario']);

    $cantidad = count($info_tareas);

?>
<div class="col-md-3 text-center bg-dark text-light" id="barralateral">
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Pendientes</h2>
        <div class="row g-4 py-5 flex-column">
            <?php

                if($cantidad > 0 ){
                    for($x = 0; $x < $cantidad; $x++){                   
                        $item = $info_tareas[$x];
                        $proyecto = $proyectos->mostrarProyectoPorID($item['idproyecto']);

            ?>
                <div class="feature my-3">
                    <a href="verTareas.php?idproyecto=<?php print $item['idproyecto'] ?>" class="btn btn-light align-items-center justify-content-center botonTareas">
                        <i class="fa-sharp fa-solid fa-thumbtack fa-xl" style="color: #212529;"></i>
                    </a>
                    <h3 class="fs-2"><?php print $item['nombretarea'] ?></h3>
                    <h4 class="fs-6 text-secondary"><?php print $proyecto['nombreproyecto'] ?></h4>
                    <p><?php print $item['descripcion'] ?></p>
                </div>
                <hr>
            <?php

                    }
                } else {

            ?>
                <div class="feature my-3">
                    <h3 class="fs-2 text-secondary">Felicidades!</h3>
                    <h4 class="fs-6 text-secondary">Pareces que has terminado con todos tus pendientes.</h4>
                </div>
                <hr>
            <?php

                }

            ?>
        </div>
    </div>
</div> 