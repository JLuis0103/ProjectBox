<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = "6LeOLSYmAAAAAIX_YHJni1GtP02LVAXjcsVOcolu";

        $respuestaCaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

        $atributos = (json_decode($respuestaCaptcha, TRUE));

        require "src/Usuarios.php";

        $usuarios = new Usuarios();
        $resultado = $usuarios->login($usuario, $contrasena);

        if($resultado && $atributos['success']){
            session_start();
            $_SESSION['usuario_info'] = array(
                'idusuario'=>$resultado['idusuario'],
                'usuario'=>$resultado['usuario'],
                'tipousuario'=>$resultado['tipousuario'],
            );
            if($_SESSION['usuario_info']['tipousuario'] == 0)
                header('Location: inicio.php');
        } else if(!$atributos['success']){
            echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Error!</strong> Complete la verificaci&oacute;n reCAPTCHA.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else 
            echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Error!</strong> Alguno de los campos sigue vacio o las credenciales son incorrectas.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>