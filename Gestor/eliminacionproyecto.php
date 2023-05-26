<?php

    require_once("src/Proyectos.php");
    $proyectos = new Proyectos();

    if(!empty($_GET['id'])){
        $idproyecto = $_GET['id'];
        $proyectos->eliminarProyecto($idproyecto);
        header('Location: visualizarproyectos.php');
    }

?>