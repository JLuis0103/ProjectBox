<?php

    include_once("cabecera.html");
    include_once("menu.php");

    require_once("src/Proyectos.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['idproyecto']) && is_numeric($_GET['idproyecto'])){
        $idproyecto = $_GET['idproyecto'];

        $proyectos = new Proyectos();
        $resultado = $proyectos->mostrarProyectoPorID($idproyecto);

        if(!$resultado)
            header('Location: seleccionarProyectoP.php');

    } else {
        header('Location: seleccionarProyectoP.php');
    }

?>

<div class="p-4 mainLogin">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">"<?php print $resultado['nombreproyecto'] ?>"</h1>
                <div class="d-grid gap-2 col-6 mx-auto p-1">
                    <br>
                    <a href="seleccionarProyectoP.php" class="btn btn-secondary">Regresar</a>
                    <hr>
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Tareas asignadas</h1>
                    <hr>
                    <table class="table table-dark" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tarea</th>
                            <th scope="col">Descripci&oacute;n</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Estado</th>
                            <?php
                                if($resultado['lider'] === $_SESSION['usuario_info']['idusuario']) {
                            ?>
                            <th scope="col">Acci&oacute;n</th>
                            <?php
                                }
                            ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once("src/Tareas.php");
                            $tareas = new Tareas();

                            require_once("src/Usuarios.php");
                            $usuarios = new Usuarios();

                            require_once("src/Equipos.php");
                            $equipos = new Equipos();

                            $info_tareas = $tareas->mostrarTareasPorProyecto($idproyecto);
                            $cantidad = count($info_tareas);

                            if($cantidad > 0 ){
                                for($x = 0; $x < $cantidad; $x++){                   
                                    $item = $info_tareas[$x];
                                    $idusuario = $equipos->mostrarMiembroPorID($item['idmiembro']);
                                    $info_usuario = $usuarios->buscarUsuarioId($idusuario['idusuario']);
                            ?>
                            <tr>
                            <th scope="row"><?php print $item['idtarea'] ?></th>
                            <td><?php print $item['nombretarea'] ?></td>
                            <td><?php print $item['descripcion'] ?></td>
                            <td><?php print $info_usuario['usuario'] ?></td>
                            <td>
                                <?php 
                                    if(strlen($item['archivo']) != 0)
                                        print "<a href={$item['archivo']}>URL</a>";
                                    else
                                        print '<p class="text-secondary">No hay ningun archivo a&uacute;n</p>';
                                    
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($item['completada'] != 0)
                                        print '<p class="text-success">Completado</p>';
                                    else
                                        print '<p class="text-warning">Pendiente</p>';
                                    
                                ?>
                            </td>
                            <?php
                                if($resultado['lider'] === $_SESSION['usuario_info']['idusuario']) {
                            ?>
                            <td>
                                <div class="btn-group">
                                <a href="editarTarea.php?idtarea=<?php print $item['idtarea'] ?>" class="btn btn-small btn-warning d-inline"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                <a href="eliminarTarea.php?idtarea=<?php print $item['idtarea'] ?>" class="btn btn-small btn-danger d-inline"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                </div>
                            </td>
                            <?php
                                }
                            ?>
                            </tr>
                            <?php
                                } 
                            } else{
                            ?>
                        <tr>
                            <td class="text-center text-secondary" colspan="6">No existe ninguna tarea en este proyecto.</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>  
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>