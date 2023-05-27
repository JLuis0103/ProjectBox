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
                        <h1 class="display-5 fw-bold">Asignaci&oacute;n de Tareas</h1>
                        <hr>
                        <p class="col-md-12 fs-4 text-justify">Como líder del proyecto, es importante asegurarse de que cada miembro del equipo tenga una tarea clara y definida. La asignación de tareas es una parte crucial del proceso de gestión de proyectos y puede ayudar a garantizar que el proyecto se complete a tiempo y dentro del presupuesto. En esta sección, encontrará herramientas y recursos para ayudarlo a asignar tareas de manera efectiva y asegurarse de que su equipo esté en la misma página.</p>
                        <br>
                        <a href="seleccionarProyectoC.php" class="btn btn-success btn-lg">Nueva Tarea</a>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 border rounded-3">
                            <h2>Tareas Pendientes</h2>
                            <p class="text-justify">La sección de tareas pendientes es una herramienta útil para ayudarlo a realizar un seguimiento de las tareas que aún no se han completado. Aquí encontrará una lista de todas las tareas pendientes asignadas a usted y sus equipos, junto con la fecha de vencimiento y cualquier otra información relevante. Utilice esta sección para asegurarse de que no se olvide de ninguna tarea importante y para mantenerse al día con su trabajo.</p>
                            <a href="seleccionarProyectoP.php" class="btn btn-outline-light" type="button">Mis Tareas</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-body-tertiary text-dark rounded-3">
                            <h2>Completar Tareas</h2>
                            <p class="text-justify">La sección de completado de tareas es una herramienta útil para ayudarlo a mantenerse organizado y asegurarse de que todas sus tareas se completen a tiempo. Aquí puede cargar archivos relevantes para cada tarea y marcarlas como completadas una vez que haya terminado. Utilice esta sección para mantener un registro claro del progreso del proyecto y asegurarse de que todas las tareas estén completas.</p>
                            <a href="completarTareas.php" class="btn btn-outline-dark">Subir Archivos</a>
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