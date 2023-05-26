<?php

    session_start();

	if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>


<?php
    } else {
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proyectos.php">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tareas.php">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Salir</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    
<?php
	}
?>
