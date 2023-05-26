<?php

	require_once("src/Equipos.php");
	$equipos = new Equipos();

	  if($_SERVER['REQUEST_METHOD'] === 'POST'){

		if(isset($_POST)){

			if($_POST['accion'] === 'crear'){

				if (empty($_POST["nombreequipo"]) or empty($_POST["lider"]) or empty($_POST["numintegrantes"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{

					$_params = array(
						'nombreequipo'=>$_POST['nombreequipo'],
						'lider'=>$_POST['lider'],
					);

					$idequipo = $equipos->registrarEquipo($_params);
					$miembros = false;

					$numintegrantes = $_POST['numintegrantes'];
						for ($i = 1; $i <= $numintegrantes; $i++) {
							$integrante = $_POST['integrante'.$i];
							$_params = array(
								'idequipo' => $idequipo,
								'idusuario' => $integrante,
							);
							$miembros = $equipos->registrarMiembros($_params);
						}
				
					if ($idequipo && $miembros)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Equipo registrado exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				}
			}

			if($_POST['accion'] === 'editar'){
				
				if (empty($_POST["nombreequipo"]) or empty($_POST["lider"]) or empty($_POST["numintegrantes"]) or empty($_POST["idequipo"]))
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				else{

					$_params = array(
						'nombreequipo'=>$_POST['nombreequipo'],
						'lider'=>$_POST['lider'],
						'idequipo'=>$_POST['idequipo']
					);

					$equipos->actualizarEquipo($_params);
					$idequipo = $_POST["idequipo"];
					$miembros = false;

					$numintegrantes = $_POST['numintegrantes'];
						for ($i = 1; $i <= $numintegrantes; $i++) {
							$integrante = $_POST['integrante'.$i];
							$miembro = $_POST['miembro'.$i];
							$_params = array(
								'idequipo' => $idequipo,
								'idusuario' => $integrante,
								'idmiembro' => $miembro,
							);
							$miembros = $equipos->actualizarMiembros($_params);
						}
				
					if ($idequipo && $miembros)
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Equipo editado exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				}
			}

		}
	}

?>