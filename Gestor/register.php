<?php

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

        require "src/Usuarios.php";

		if(isset($_POST)){

			if (empty($_POST["nombre"]) or empty($_POST["apellidop"]) or empty($_POST["apellidom"]) or empty($_POST["usuario"]) or empty($_POST["correo"]) or empty($_POST["contrasena"]))
				echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
				<strong>Error!</strong> Alguno de los campos sigue vacio.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

			else{

				$usuarios = new Usuarios();
				$existeCorreo = $usuarios->buscarCorreo($_POST["correo"]);
				$existeUsuario = $usuarios->buscarUsuario($_POST["usuario"]);

				if($existeCorreo){
					echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					<strong>Error!</strong> El correo ya existe.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				} else if ($existeUsuario){
					echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					<strong>Error!</strong> El nombre de usuario ya existe.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				} else{
					$_params = array(
						'nombre'=>$_POST['nombre'],
						'apellidop'=>$_POST['apellidop'],
						'apellidom'=>$_POST['apellidom'],
						'usuario'=>$_POST['usuario'],
						'correo'=>$_POST['correo'],
						'contrasena'=>$_POST['contrasena'],
					);
			
					$mensaje = $usuarios->registrarUsuario($_params);
				
					if ($mensaje)
						echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
						Cuenta creada exitosamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				}
			}
		}
	}

	 
   ?>
