<?php

    require_once("src/Tareas.php");
    $tareas = new Tareas();

    if(!empty($_GET['id'])){
        $idtarea = $_GET['id'];
        $info = $tareas->mostrarTareasPorId($idtarea);
        $tareas->eliminarTarea($idtarea);
        header("Location: verTareas.php?idproyecto={$info['idproyecto']}");
    }    

?>