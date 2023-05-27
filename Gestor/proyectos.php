<?php

    include_once("cabecera.html");
    include_once("menu.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

?>

<div class="p-4 main">
    <div class="row justify-content-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-10 mx-auto">
                <div class="p-5 mb-4 rounded-3">
                    <div class="container-fluid">
                        <h1 class="display-5 fw-bold">Creaci&oacute;n de Proyectos</h1>
                        <hr>
                        <p class="col-md-12 fs-4 text-justify">Bienvenido/a a nuestra plataforma de creación de proyectos. Antes de comenzar, nos gustaría darte una breve introducción de lo que encontrarás en esta sección. Aquí podrás crear y visualizar proyectos en tu cuenta. Además, podrás asignar a los miembros de tu equipo para una mejor organización y seguimiento. ¡Comienza a crear tus proyectos ahora mismo!</p>
                        <br>
                        <a href="crearProyecto.php" class="btn btn-success btn-lg">Nuevo Proyecto</a>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 border rounded-3">
                            <h2>Visualizar Proyectos</h2>
                            <p class="text-justify">Aquí podrás encontrar una lista de tus proyectos creados y los que estás participando. Podrás ver el estado actual de cada proyecto, los miembros que están participando, y la información relevante sobre cada uno de ellos. ¡Explora y mantente al día con el progreso de tus proyectos!</p>
                            <a href="visualizarproyectos.php" class="btn btn-outline-light" type="button">Mis Proyectos</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-body-tertiary text-dark rounded-3">
                            <h2>Equipos de Trabajo</h2>
                            <p class="text-justify">En esta sección podrás crear y unirte a equipos de trabajo para colaborar en tus proyectos. Los equipos te permiten asignar tareas, compartir archivos y comunicarte con otros miembros de forma eficiente y organizada. ¡Únete a un equipo o crea uno propio para maximizar la productividad y alcanzar tus objetivos más rápido!</p>
                            <a href="equipos.php" class="btn btn-outline-dark">Mis Equipos</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>