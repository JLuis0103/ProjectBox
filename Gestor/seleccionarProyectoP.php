<?php

    include_once("cabecera.html");
    include_once("menu.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Selecciona un proyecto</h1>
                <div class="d-grid gap-2 col-6 mx-auto p-1">
                    <a href="tareas.php" class="btn btn-secondary">Regresar</a>
                    <hr>
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Mis proyectos</h1>
                    <div class="row">
                        <?php

                            require_once("src/Proyectos.php");
                            require_once("src/Usuarios.php");

                            $usuarios = new Usuarios();
                            $proyectos = new Proyectos();

                            $info_lider = $proyectos->mostrarProyectosDondeLider($_SESSION['usuario_info']['idusuario']);
                            $cantidad = count($info_lider);

                            if($cantidad > 0 ){
                                for($x = 0; $x < $cantidad; $x++){                   
                                    $item = $info_lider[$x];
                                    $info_usuario = $usuarios->buscarUsuarioId($item['lider']);
                        ?>
                        <div class="col-lg-4">
                            <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title><?php print $item['nombreproyecto'] ?></title>
                                <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                                <image href="<?php print $item['url'] ?>" width="100%" height="100%" />
                            </svg>
                            <h2 class="fw-normal"><?php print $item['nombreproyecto'] ?></h2>
                            <h4 class="fs-6 text-secondary"><?php print $info_usuario['usuario'] ?></h4>
                            <p><?php print $item['descripcion'] ?></p>
                            <p><a class="btn btn-secondary" href="verTareas.php?idproyecto=<?php print $item['idproyecto'] ?>">Visualizar tareas »</a></p>
                        </div><!-- /.col-lg-4 -->
                        <?php
                                }
                            } else {
                        ?>
                        <div class="col-lg-12">
                            <h4 class="fw-normal text-secondary">No se encontraron proyectos donde seas lider.</h4>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <hr>
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Proyectos en los que participas</h1>
                    <div class="row">
                        <?php

                            $info_miembro = $proyectos->mostrarProyectosDondeMiembro($_SESSION['usuario_info']['idusuario']);
                            $cantidad = count($info_miembro);

                            if($cantidad > 0 ){
                                for($x = 0; $x < $cantidad; $x++){                   
                                    $item = $info_miembro[$x];
                                    $info_usuario = $usuarios->buscarUsuarioId($item['lider']);
                        ?>
                        <div class="col-lg-4">
                            <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title><?php print $item['nombreproyecto'] ?></title>
                                <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                                <image href="<?php print $item['url'] ?>" width="100%" height="100%" />
                            </svg>
                            <h2 class="fw-normal"><?php print $item['nombreproyecto'] ?></h2>
                            <h4 class="fs-6 text-secondary"><?php print $info_usuario['usuario'] ?></h4>
                            <p><?php print $item['descripcion'] ?></p>
                            <p><a class="btn btn-secondary" href="verTareas.php?idproyecto=<?php print $item['idproyecto'] ?>">Visualizar tareas »</a></p>
                        </div><!-- /.col-lg-4 -->
                        <?php
                                }
                            } else {
                        ?>
                        <div class="col-lg-12">
                            <h4 class="fw-normal text-secondary">No se encontraron proyectos donde participes.</h4>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <hr>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>