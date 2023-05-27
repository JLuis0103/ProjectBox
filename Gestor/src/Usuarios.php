<?php

    require_once("Conexion.php");

    class Usuarios {

        public function login($usuario, $contrasena) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `idusuario`, `usuario`, `tipousuario`  FROM `usuarios` WHERE `usuario` = :usuario AND `contrasena` = :contrasena";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":usuario" => $usuario,
                ":contrasena" => $contrasena
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
                
            return false;
        }

        public function registrarUsuario($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "INSERT INTO `usuarios`(`nombre`, `apellidop`, `apellidom`, `usuario`, `correo`, `contrasena`) VALUES (:nombre, :apellidop, :apellidom, :usuario, :correo, :contrasena)";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombre"=>$_params['nombre'],
                ":apellidop"=>$_params['apellidop'],
                ":apellidom"=>$_params['apellidom'],
                ":usuario"=>$_params['usuario'],
                ":correo"=>$_params['correo'],
                ":contrasena"=>$_params['contrasena']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function buscarCorreo($correo) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `idusuario`, `usuario`, `tipousuario` FROM `usuarios` WHERE `correo` = :correo";
            $resultado = $cn->prepare($sql);
        
            $_array = array(
                ":correo" => $correo
            );
        
            if($resultado->execute($_array))
                return $resultado->fetch();
        
            return false;
        }
        
        public function buscarUsuario($usuario) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `idusuario`, `usuario`, `tipousuario` FROM `usuarios` WHERE `usuario` = :usuario";
            $resultado = $cn->prepare($sql);
        
            $_array = array(
                ":usuario" => $usuario
            );
        
            if($resultado->execute($_array))
                return $resultado->fetch();
        
            return false;
        }

        public function buscarUsuarioId($idusuario) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `usuarios` WHERE `idusuario` = :idusuario";
            $resultado = $cn->prepare($sql);
        
            $_array = array(
                ":idusuario" => $idusuario
            );
        
            if($resultado->execute($_array))
                return $resultado->fetch();
        
            return false;
        }

        public function mostrar() {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `usuarios` ORDER BY `idusuario`";
            $resultado = $cn->prepare($sql);
    
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }

    }

?>