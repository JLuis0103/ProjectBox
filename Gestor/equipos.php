<?php

    include_once("cabecera.html");
    include_once("menu.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Equipos de Trabajo</h1>
                <div class="d-grid gap-2 col-6 mx-auto p-1">
                    <br>
                    <a href="crearEquipo.php" class="btn btn-success btn-lg">Crear un nuevo equipo</a>
                    <a href="proyectos.php" class="btn btn-secondary">Regresar</a>
                    <hr>
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Mis equipos</h1>
                    <hr>
                    <table class="table table-dark" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre del equipo</th>
                            <th scope="col">Lider</th>
                            <th scope="col">Miembros</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once("src/Equipos.php");
                            $equipos = new Equipos();

                            require_once("src/Usuarios.php");
                            $usuarios = new Usuarios();

                            $info_lider = $equipos->mostrarEquiposDondeLider($_SESSION['usuario_info']['idusuario']);
                            $cantidad = count($info_lider);

                            if($cantidad > 0 ){
                                for($x = 0; $x < $cantidad; $x++){                   
                                    $item = $info_lider[$x];
                                    $info_usuario = $usuarios->buscarUsuarioId($item['lider']);
                            ?>
                            <tr>
                            <th scope="row"><?php print $item['idequipo'] ?></th>
                            <td><?php print $item['nombreequipo'] ?></td>
                            <td><?php print $info_usuario['usuario'] ?></td>
                            <td>
                                <ul class="list-unstyled">
                                <?php
                                    $info_usuarios = $equipos->mostrarMiembrosEquipo($item['idequipo']);
                                    $cantidadUsuarios = count($info_usuarios);
                                    if($cantidadUsuarios > 0 )
                                        for($y = 0; $y < $cantidadUsuarios; $y++) {       
                                            $usuario = $usuarios->buscarUsuarioId($info_usuarios[$y]['idusuario']);   
                                            echo '<li>'.$usuario['usuario'].'</li>';
                                        }
                                ?>
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group">
                                <a href="editarEquipo.php?idequipo=<?php print $item['idequipo'] ?>" class="btn btn-small btn-warning d-inline"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                <a href="eliminarEquipo.php?id=<?php print $item['idequipo'] ?>" class="btn btn-small btn-danger d-inline"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                </div>
                            </td>
                            </tr>
                            <?php
                                } 
                            } else{
                            ?>
                        <tr>
                            <td class="text-center" colspan="6">No existe ningun equipo.</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>  
                </div>
                <div class="col-md-9 justify-content-center mx-auto">
                    <h1 class="fw-bold text-center">Equipos en los que participas</h1>
                    <hr>
                    <table class="table table-dark" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre del equipo</th>
                            <th scope="col">Lider</th>
                            <th scope="col">Miembros</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $info_equipos_miembro = $equipos->mostrarEquiposDondeMiembro($_SESSION['usuario_info']['idusuario']);
                            $cantidad = count($info_equipos_miembro);

                            if($cantidad > 0){
                                for($x = 0; $x < $cantidad; $x++){
                                $item = $equipos->mostrarEquipoPorID($info_equipos_miembro[$x]['idequipo']);
                            ?>
                            <tr>
                            <th scope="row"><?php print $item['idequipo'] ?></th>
                            <td><?php print $item['nombreequipo'] ?></td>
                            <td>
                                <?php 
                                    $info_usuario = $usuarios->buscarUsuarioId($item['lider']);
                                    print $info_usuario['usuario'];
                                ?>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                <?php
                                    $info_usuarios = $equipos->mostrarMiembrosEquipo($item['idequipo']);
                                    $cantidadUsuarios = count($info_usuarios);
                                    if($cantidadUsuarios > 0 )
                                        for($y = 0; $y < $cantidadUsuarios; $y++) {       
                                            $usuario = $usuarios->buscarUsuarioId($info_usuarios[$y]['idusuario']);   
                                            echo '<li>'.$usuario['usuario'].'</li>';
                                        }
                                ?>
                                </ul>
                            </td>
                            <td>
                            </td>
                            </tr>
                            <?php
                            }
                            } else{

                            ?>
                        <tr>
                            <td class="text-center" colspan="6">No estas en ningun equipo.</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>  
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>