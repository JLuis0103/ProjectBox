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
                <h1 class="display-5 fw-bold">Creaci&oacute;n de Proyectos</h1>
                <div class="col-md-6 mx-auto">
                    <hr>
                    <?php

                        include_once("accionesProyectos.php");

                    ?>
                    <br>
                    <form method="post" id="myForm">
                        <div class="mb-3">
                            <label class="form-label">Nombre del proyecto:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="nombreproyecto" id="nombreproyecto" placeholder="Nombre" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Descripcion del proyecto:</label>
                            <textarea class="form-control text-center bg-dark text-light indicador area" name="descripcion"
                                id="descripcion" placeholder="Descripcion ..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL de imag&eacute;n del proyecto:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="url" id="url" placeholder="URL" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Fecha de inicio:</label>
                            <input type="date" class="form-control text-center bg-dark text-light indicador"
                                name="fechainicio" id="fechainicio" placeholder="dd/mm/aaaa" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Fecha de finalizacion:</label>
                            <input type="date" class="form-control text-center bg-dark text-light indicador"
                                name="fechafin" id="fechafin" placeholder="Fecha de finalizacion" required>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="lider"
                            id="lider" value="<?php print $_SESSION['usuario_info']['idusuario'] ?>" required>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Equipo:</label>
                            <select class="form-select text-center bg-dark text-light indicador" name="equipo">
                                <option selected disabled>-- Seleccione un equipo --</option>
                                <?php
                                    require_once("src/Equipos.php");
                                    $equipos = new Equipos();
                                    
                                    $info_equipos = $equipos->mostrarEquiposDondeLider($_SESSION['usuario_info']['idusuario']);
                                    $cantidad = count($info_equipos);

                                    if($cantidad > 0){
                                    for($x = 0; $x < $cantidad; $x++){ 
                                        $item = $info_equipos[$x];
                                        echo"<option value='".$item['idequipo']."'>(".$item['idequipo'].") ".$item['nombreequipo']."</option>";
                                    }
                                    } else{
                                        "<option selected disabled>No se encontraron equipos</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="d-grid gap-2 col-4 mx-auto p-1">
                            <button type="submit" class="btn btn-success btn-lg" id="registrar" name="accion" value="crear">Crear</button>
                            <a href="proyectos.php" class="btn btn-secondary" id="regresar">Regresar</a>
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