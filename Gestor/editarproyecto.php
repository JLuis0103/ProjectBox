<?php

    include_once("cabecera.html");
    include_once("menu.php");
    require_once("src/Proyectos.php");
    require_once("src/Equipos.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $idproyecto = $_GET['id'];

        $proyectos = new Proyectos();
        $equipos = new Equipos();
        $resultado = $proyectos->mostrarProyectoPorID($idproyecto);

        if(!$resultado)
            header('Location: visualizarproyectos.php');

    } else {
        header('Location: visualizarproyectos.php');
    }


?>

<div class="p-4 main">
    <div class="row justify-content-center text-center">
        <div class="col-md-10 dark bg-dark text-light" id="principal2">
            <br>
            <div class="col-md-9 mx-auto">
                <h1 class="display-5 fw-bold">Editar Proyecto</h1>
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
                                name="nombreproyecto" id="nombreproyecto" placeholder="Nombre" value="<?php print $resultado['nombreproyecto'] ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Descripcion del proyecto:</label>
                            <textarea class="form-control text-center bg-dark text-light indicador area" name="descripcion"
                                id="descripcion" placeholder="Descripcion ..." required><?php print $resultado['descripcion'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL de imag&eacute;n del proyecto:</label>
                            <input type="text" class="form-control text-center bg-dark text-light indicador"
                                name="url" id="url" placeholder="URL" value="<?php print $resultado['url'] ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Fecha de inicio:</label>
                            <input type="date" class="form-control text-center bg-dark text-light indicador"
                                name="fechainicio" id="fechainicio" placeholder="dd/mm/aaaa" value="<?php print $resultado['fechainicio'] ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Fecha de finalizacion:</label>
                            <input type="date" class="form-control text-center bg-dark text-light indicador"
                                name="fechafin" id="fechafin" placeholder="Fecha de finalizacion" value="<?php print $resultado['fechafin'] ?>" required>
                        </div>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="lider"
                            id="lider" value="<?php print $_SESSION['usuario_info']['idusuario'] ?>" required>
                        <input type="hidden" class="form-control text-center bg-dark text-light indicador" name="idproyecto"
                            id="idproyecto" value="<?php print $resultado['idproyecto'] ?>" required>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Equipo:</label>
                            <select class="form-select text-center bg-dark text-light indicador" name="equipo">
                                <?php 
                                    $info_equipo = $equipos->mostrarEquipoPorID($resultado['equipo']);
                                    echo "<option selected value='".$info_equipo['idequipo']."'>(".$info_equipo['idequipo'].") ".$info_equipo['nombreequipo']."</option>";
                                ?>
                                <option disabled>-- Seleccione un equipo --</option>
                                <?php     
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
                            <button type="submit" class="btn btn-warning btn-lg text-light" id="registrar" name="accion" value="editar">Editar</button>
                            <a href="detallesproyecto.php?id=<?php print $resultado['idproyecto'] ?>" class="btn btn-secondary" id="regresar">Regresar</a>
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