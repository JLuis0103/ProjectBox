<?php

    require_once("src/Equipos.php");
    $equipos = new Equipos();

    if(!empty($_GET['idequipo'])){
        $idequipo = $_GET['idequipo'];
        $equipos->eliminarEquipo($idequipo);
        $equipos->eliminarMiembros($idequipo);
        header('Location: equipos.php');
    }

?>