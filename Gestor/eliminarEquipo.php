<?php

    include_once("cabecera.html");
    include_once("menu.php");
    require_once("src/Equipos.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $idequipo = $_GET['id'];

        $equipos = new Equipos();
        $resultado = $equipos->mostrarEquipoPorID($idequipo);
        $resultadoMiembros = $equipos->mostrarMiembrosEquipo($idequipo);

        if(!$resultado || !$resultadoMiembros)
            header('Location: equipos.php');

    } else {
        header('Location: equipos.php');
    }

?>
<script src="js/confirmacionEquipos.js"></script>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Eliminar equipo</h1>
                <div class="col-md-6 mx-auto">
                    <hr>
                    <?php

                        $cantidadMiembros = count($resultadoMiembros);

                    ?>
                    <br>
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <label class="form-label">Nombre del equipo:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="nombreequipo" id="nombreequipo" placeholder="Nombre" value="<?php print $resultado['nombreequipo'] ?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customRange3" class="form-label">Numero de integrantes:</label><br>
                            <input type="range" class="form-control-range rango" min="1" max="10" step="1" id="customRange3" value="<?php print $cantidadMiembros ?>" disabled>
                            <p id="rangeValue" class="text-light fw-bold"><?php print $cantidadMiembros ?></p>
                        </div>
                        <div class="mb-3">
                            <?php
                            require_once("src/Usuarios.php");
                            $usuarios = new Usuarios();
                            
                            $info_usuario = $usuarios->mostrar();
                            $cantidad = count($info_usuario);

                            if($cantidad > 0){
                                for($i = 1; $i <= $cantidadMiembros; $i++){ 
                                    $usuario_seleccionado = $usuarios->buscarUsuarioId($resultadoMiembros[$i-1]['idusuario']);
                                    echo '<div class="mb-3">';
                                    echo '<label class="form-label">Integrante #' . $i . ':</label>';
                                    echo '<select class="form-select text-center bg-dark text-light indicador" name="integrante' . $i . '" readonly>';
                                    echo '<option selected value="'.$usuario_seleccionado['idusuario'].'">('.$usuario_seleccionado['idusuario'].') '.$usuario_seleccionado['nombre'].' '.$usuario_seleccionado['apellidop'].' '.$usuario_seleccionado['apellidom'].'</option>';
                                    echo '<option disabled>-- Seleccione un integrante --</option>';
                                    echo '</select>';
                                    echo '</div>';
                                    echo '<input type="hidden" class="form-control text-center bg-dark text-light indicador" name="miembro'.$i.'" id="miembro'.$i.'" value=" '.$resultadoMiembros[$i-1]['idmiembro'].'" required>';
                                }
                            } else{
                                echo "<p>No se encontraron usuarios.</p>";
                            }
                            ?>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="idequipo" id="idequipo" value="<?php print $resultado['idequipo'] ?>" required>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="lider" id="lider" value="<?php print $resultado['lider'] ?>" required>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="numintegrantes" id="numintegrantes" value="<?php print $cantidadMiembros ?>" required>
                    </form>
                    <br>
                    <div class="d-grid gap-2 col-4 mx-auto p-1">
                        <button class="btn btn-danger btn-lg" value="<?php print $resultado['idequipo'] ?>" onclick="mostrarDiv('<?php print $resultado['idequipo'] ?>')">Eliminar</button>
                        <a href="equipos.php" class="btn btn-secondary" id="regresar">Regresar</a>
                    </div>
                    <br>
                    <div class="alerta"></div>
                    <br>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>
