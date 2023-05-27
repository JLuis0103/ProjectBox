<?php

    include_once("cabecera.html");
    include_once("menu.php");

    require_once("src/Tareas.php");
    require_once("src/Proyectos.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['idtarea']) && is_numeric($_GET['idtarea'])){
        $idtarea = $_GET['idtarea'];

        $tareas = new Tareas();
        $resultado = $tareas->mostrarTareasPorId($idtarea);

        $proyectos = new Proyectos();
        $info_proyecto = $proyectos->mostrarProyectoPorID($resultado['idproyecto']);

        if(!$resultado)
            header('Location: seleccionarProyectoP.php');

    } else {
        header('Location: seleccionarProyectoP.php');
    }

?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Editar Tarea</h1>
                <div class="col-md-6 mx-auto">
                    <hr>
                    <?php

                        include_once("accionesTareas.php");

                    ?>
                    <br>
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <label class="form-label">Nombre de la tarea:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="nombretarea" id="nombretarea" placeholder="Nombre" value="<?php print $resultado['nombretarea'] ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Descripci&oacute;n de la tarea:</label>
                            <textarea class="form-control text-center bg-dark text-light indicador area" name="descripcion"
                                id="descripcion" placeholder="Descripci&oacute;n ..." required><?php print $resultado['descripcion'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Proyecto:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="nombreproyecto" id="nombreproyecto" placeholder="Nombre del proyecto" required readonly value="<?php print $info_proyecto['nombreproyecto'] ?>">
                            <input type="hidden" class="form-control text-center bg-dark text-light indicador"
                                name="idproyecto" id="idproyecto" required readonly value="<?php print $info_proyecto['idproyecto'] ?>">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Miembro:</label>
                            <select class="form-select text-center bg-dark text-light indicador" name="idmiembro">
                                <option selected disabled>-- Seleccione un miembro --</option>
                                <?php
                                    require_once("src/Equipos.php");
                                    require_once("src/Usuarios.php");
                                    $equipos = new Equipos();
                                    $usuarios = new Usuarios();
                                    
                                    $info_miembros = $equipos->mostrarMiembrosEquipo($info_proyecto['equipo']);
                                    $cantidad = count($info_miembros);

                                    if($cantidad > 0){
                                    for($x = 0; $x < $cantidad; $x++){ 
                                        $item = $info_miembros[$x];
                                        $info = $usuarios->buscarUsuarioId($info_miembros[$x]['idusuario']);
                                        if($item['idmiembro'] === $resultado['idmiembro'])
                                            echo"<option selected value='".$item['idmiembro']."'>(".($x+1).") ".$info['usuario']."</option>";
                                        else
                                            echo"<option value='".$item['idmiembro']."'>(".($x+1).") ".$info['usuario']."</option>";
                                    }
                                    } else{
                                        "<option selected disabled>No se encontraron equipos</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="idtarea"
                            id="idtarea" value="<?php print $resultado['idtarea'] ?>" required>
                        <br>
                        <div class="d-grid gap-2 col-4 mx-auto p-1">
                            <button type="submit" class="btn btn-warning text-light btn-lg" id="registrar" name="accion" value="editar">Editar</button>
                            <a href="verTareas.php?idproyecto=<?php print $info_proyecto['idproyecto'] ?>" class="btn btn-secondary" id="regresar">Regresar</a>
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