<?php

    require_once("src/Proyectos.php");

	  if($_SERVER['REQUEST_METHOD'] === 'POST'){

		if(isset($_POST)){

			if($_POST["accion"] === 'crear'){

				if (empty($_POST["nombreproyecto"]) or empty($_POST["descripcion"]) or empty($_POST["fechainicio"]) or empty($_POST["fechafin"]) or empty($_POST["lider"]) or empty($_POST["equipo"]) or empty($_POST["url"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{
					$proyectos = new Proyectos();

					$_params = array(
						'nombreproyecto'=>$_POST['nombreproyecto'],
						'descripcion'=>$_POST['descripcion'],
						'url'=>$_POST['url'],
						'fechainicio'=>$_POST['fechainicio'],
						'fechafin'=>$_POST['fechafin'],
						'lider'=>$_POST['lider'],
						'equipo'=>$_POST['equipo'],
					);

					$mensaje = $proyectos->registrarProyecto($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Proyecto creado exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				}
			}

			if($_POST["accion"] === 'editar'){

				if (empty($_POST["nombreproyecto"]) or empty($_POST["descripcion"]) or empty($_POST["fechainicio"]) or empty($_POST["fechafin"]) or empty($_POST["lider"]) or empty($_POST["equipo"]) or empty($_POST["url"]) or empty($_POST["idproyecto"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{
					$proyectos = new Proyectos();

					$_params = array(
						'nombreproyecto'=>$_POST['nombreproyecto'],
						'descripcion'=>$_POST['descripcion'],
						'url'=>$_POST['url'],
						'fechainicio'=>$_POST['fechainicio'],
						'fechafin'=>$_POST['fechafin'],
						'lider'=>$_POST['lider'],
						'equipo'=>$_POST['equipo'],
						'idproyecto'=>$_POST['idproyecto'],
					);

					$mensaje = $proyectos->editarProyecto($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Proyecto editado exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';

				}
			}

		}
	}

?>