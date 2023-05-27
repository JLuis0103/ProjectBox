<?php

    require_once("src/Tareas.php");

	  if($_SERVER['REQUEST_METHOD'] === 'POST'){

		if(isset($_POST)){

			if($_POST["accion"] === 'crear'){

				if (empty($_POST["nombretarea"]) or empty($_POST["descripcion"]) or empty($_POST["idproyecto"]) or empty($_POST["idmiembro"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{
					$tareas = new Tareas();

					$_params = array(
						'nombretarea'=>$_POST['nombretarea'],
						'descripcion'=>$_POST['descripcion'],
						'idproyecto'=>$_POST['idproyecto'],
						'idmiembro'=>$_POST['idmiembro']
					);

					$mensaje = $tareas->registrarTarea($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Tarea creada exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				}
			}

			if($_POST["accion"] === 'editar'){

				if (empty($_POST["nombretarea"]) or empty($_POST["descripcion"]) or empty($_POST["idproyecto"]) or empty($_POST["idmiembro"])  or empty($_POST["idtarea"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{
					$tareas = new Tareas();

					$_params = array(
						'nombretarea'=>$_POST['nombretarea'],
						'descripcion'=>$_POST['descripcion'],
						'idproyecto'=>$_POST['idproyecto'],
						'idmiembro'=>$_POST['idmiembro'],
						'idtarea'=>$_POST['idtarea']
					);

					$mensaje = $tareas->editarTarea($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Tarea editada exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';

				}
			}

			if($_POST["accion"] === 'subir'){

				if (empty($_POST["url"]) or empty($_POST["idtarea"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{
					$tareas = new Tareas();

					$_params = array(
						'archivo'=>$_POST['url'],
						'completada'=>1,
						'idtarea'=>$_POST['idtarea']
					);

					$mensaje = $tareas->completarTarea($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Tarea completada exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';

				}
			}

		}
	}

?>