<?php

    include_once("cabecera.html");
    include_once("menu.php");
    require_once("src/Proyectos.php");
    require_once("src/Equipos.php");
    require_once("src/Usuarios.php");
    require_once("src/Tareas.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $idproyecto = $_GET['id'];

        $proyectos = new Proyectos();
        $equipos = new Equipos();
        $usuarios = new Usuarios();
        $tareas = new Tareas();

        $resultado = $proyectos->mostrarProyectoPorID($idproyecto);
        $nombrelider = $usuarios->buscarUsuarioId($resultado['lider']);

        $info_tareas = $tareas->mostrarTareasPorProyecto($idproyecto);

        if(!$resultado)
            header('Location: visualizarproyectos.php');

    } else {
        header('Location: visualizarproyectos.php');
    }

?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <?php

                $fechaActual = date('Y-m-d');
                    
                if ($resultado['fechafin'] < $fechaActual) {
                    $fechaLimite = new DateTime($resultado['fechafin']);
                    $fechaActualObj = new DateTime($fechaActual);
                    $diferencia = $fechaLimite->diff($fechaActualObj)->format('%a');

                    echo '<h2 class="text-warning">Proyecto con retraso de ' . $diferencia . ' días.</h2>';
                } 

                ?>
                <h1 class="display-5 fw-bold">"<?php print $resultado['nombreproyecto'] ?>"</h1>
                <h4 class="fs-3 text-secondary">por "<?php print $nombrelider['usuario'] ?>"</h4>
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>"<?php print $resultado['nombreproyecto'] ?>"</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    <image href="<?php print $resultado['url'] ?>" width="100%" height="100%" />
                </svg>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <h1 class="">Informaci&oacute;n del proyecto</h1>
                    <br>
                    <h4 class="fs-6 text-secondary">Descripci&oacute;n</h4>
                    <p><?php print $resultado['descripcion'] ?></p>
                    <br>
                    <h4 class="fs-6 text-secondary">Fecha de inicio</h4>
                    <p><?php print $resultado['fechainicio'] ?></p>
                    <br>
                    <h4 class="fs-6 text-secondary">Fecha limite</h4>
                    <p><?php print $resultado['fechafin'] ?></p>
                    <br>
                    <h4 class="fs-6 text-secondary">Miembros</h4>
                    <ul class="list-unstyled">
                        <?php
                            $info_usuarios = $equipos->mostrarMiembrosEquipo($resultado['equipo']);
                            $cantidadUsuarios = count($info_usuarios);
                            if($cantidadUsuarios > 0 )
                                for($y = 0; $y < $cantidadUsuarios; $y++) {       
                                    $usuario = $usuarios->buscarUsuarioId($info_usuarios[$y]['idusuario']);   
                                    echo '<li>'.$usuario['usuario'].'</li>';
                                }
                        ?>
                    </ul>
                    <br>
                    <?php

                        if($_SESSION['usuario_info']['idusuario'] === $resultado['lider']){

                    ?>
                    <h4 class="fs-6 text-secondary">Acciones</h4>
                    <div class="btn-group">
                        <a href="editarproyecto.php?id=<?php print $resultado['idproyecto'] ?>" class="btn btn-warning text-light btn-lg"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                        <a href="eliminarproyecto.php?id=<?php print $resultado['idproyecto'] ?>" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                    </div>
                    <?php

                        }

                    ?>
                </div>
                <div class="col-md-4 mx-auto">
                    <h1 class="">Tareas pendientes</h1>
                    <div class="row g-4 py-5 flex-column">
                        <?php

                            $cantidad = count($info_tareas);
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
            <br>
            <hr>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto p-1">
                <a href="visualizarproyectos.php" class="btn btn-secondary btn-lg">Regresar</a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>