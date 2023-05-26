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
                <h1 class="display-5 fw-bold">Creaci&oacute;n de equipos</h1>
                <div class="col-md-6 mx-auto">
                    <hr>
                    <?php

                        include_once("accionesEquipos.php");

                    ?>
                    <br>
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <label class="form-label">Nombre del equipo:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador" name="nombreequipo" id="nombreequipo" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="customRange3" class="form-label">Numero de integrantes:</label><br>
                            <input type="range" class="form-control-range rango" min="1" max="10" step="1" id="customRange3" value="10" name="numintegrantes">
                            <p id="rangeValue" class="text-light fw-bold">10</p>
                        </div>
                        <div id="selectores-container" class="mb-3">
                            <?php
                            require_once("src/Usuarios.php");
                            $usuarios = new Usuarios();
                            
                            $info_usuario = $usuarios->mostrar();
                            $cantidad = count($info_usuario);

                            if($cantidad > 0){
                                for($i = 1; $i <= 10; $i++){ 
                                    echo '<div class="mb-3">';
                                    echo '<label class="form-label">Integrante #' . $i . ':</label>';
                                    echo '<select class="form-select text-center bg-dark text-light indicador" name="integrante' . $i . '">';
                                    echo '<option selected disabled>-- Seleccione un integrante --</option>';
                                    foreach ($info_usuario as $item) {
                                        echo '<option value="'.$item['idusuario'].'">('.$item['idusuario'].') '.$item['nombre'].' '.$item['apellidop'].' '.$item['apellidom'].'</option>';
                                    }
                                    echo '</select>';
                                    echo '</div>';
                                }
                            } else{
                                echo "<p>No se encontraron usuarios.</p>";
                            }
                            ?>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="lider" id="lider" value="<?php print $_SESSION['usuario_info']['idusuario'] ?>" required>
                        <br>
                        <div class="d-grid gap-2 col-4 mx-auto p-1">
                            <button type="submit" class="btn btn-success btn-lg" id="registrar" name="accion" value="crear">Crear</button>
                            <a href="equipos.php" class="btn btn-secondary" id="regresar">Regresar</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php

    include_once("pie.html");

?>

<script>
    const rangeInput = document.getElementById('customRange3');
    const rangeValue = document.getElementById('rangeValue');
    const selectoresContainer = document.getElementById('selectores-container');

    rangeInput.addEventListener('input', function() {
        rangeValue.textContent = this.value;

        // Limpiar selectores existentes
        selectoresContainer.innerHTML = '';

        // Agregar selectores según el valor del rango
        for (let i = 1; i <= this.value; i++) {
            const selector = document.createElement('div');
            selector.classList.add('mb-3');
            selector.innerHTML = `
                <label class="form-label">Integrante #${i}:</label>
                <select class="form-select text-center bg-dark text-light indicador" name="integrante${i}">
                    <option selected disabled>-- Seleccione un integrante --</option>
                    <?php
                        foreach ($info_usuario as $item) {
                            echo '<option value="'.$item['idusuario'].'">('.$item['idusuario'].') '.$item['nombre'].' '.$item['apellidop'].' '.$item['apellidom'].'</option>';
                        }
                    ?>
                </select>
            `;
            selectoresContainer.appendChild(selector);
        }
    });
</script>