<?php

    include_once("cabecera.html");
    include_once("menu.php");

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
        header('Location: error/errorSesion.php');
    }

?>

    <div class="p-4 main">
        <div class="row justify-content-center">
            <div class="col-md-7 dark bg-dark text-light" id="principal">
                <br>
                <h1 class="text-center">Bienvenido "<?php print($_SESSION['usuario_info']['usuario'])?>"</h1>
                <div class="col-md-10 text-center mx-auto">
                    <hr>
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="imgs/lider.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Liderazgo</h5>
                                <p>"El liderazgo no es sobre ser el mejor. Es sobre hacer que los demás sean mejores.”</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="imgs/equipo.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Trabajo en equipo</h5>
                                <p>“El talento gana partidos, pero el trabajo en equipo y la inteligencia ganan campeonatos.”</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="imgs/organizacion.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Organización</h5>
                                <p>“La organización es la clave para el éxito y la eficiencia.”</p>
                            </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h3>Nuestra filosofía</h3>
                        <p>En nuestro equipo, creemos que el éxito de cualquier proyecto depende en gran medida del trabajo en equipo, la organización y un buen liderazgo.</p>
                        <h4>Trabajo en equipo</h4>
                        <p>Sabemos que cada proyecto es único y requiere una combinación única de habilidades y talentos para llevarlo a cabo con éxito. Es por eso que fomentamos un ambiente de trabajo colaborativo y organizado, donde cada miembro del equipo tiene la oportunidad de contribuir con sus habilidades y conocimientos únicos.</p>
                        <h4>Liderazgo</h4>
                        <p>Creemos que el liderazgo efectivo es fundamental para el éxito del proyecto y nos aseguramos de que nuestros líderes estén altamente capacitados y comprometidos con el éxito del equipo.</p>
                        <h4>Organización</h4>
                        <p>La organización es clave para el éxito y la eficiencia en la gestión de proyectos. Nos aseguramos de que cada proyecto esté organizado y planificado cuidadosamente para garantizar su éxito. <br>
                        En resumen, estamos comprometidos con la excelencia en la gestión de proyectos y creemos que el trabajo en equipo, la organización y un buen liderazgo son los pilares fundamentales para lograrlo.</p>
                    </div>
                </div>
                <br>
            </div>

            <?php

                include_once("aside.php");

            ?>

        </div>
    </div>

<?php

    include_once("pie.html");

?>