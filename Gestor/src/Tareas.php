<?php

    require_once("Conexion.php");

    class Tareas {

        public function registrarTarea($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "INSERT INTO `tareas`(`nombretarea`, `descripcion`, `idproyecto`, `idmiembro`) VALUES (:nombretarea,:descripcion,:idproyecto,:idmiembro)";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombretarea"=>$_params['nombretarea'],
                ":descripcion"=>$_params['descripcion'],
                ":idproyecto"=>$_params['idproyecto'],
                ":idmiembro"=>$_params['idmiembro']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function editarTarea($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "UPDATE `tareas` SET `nombretarea`=:nombretarea,`descripcion`=:descripcion, `idproyecto`=:idproyecto, `idmiembro`=:idmiembro WHERE `idtarea`=:idtarea";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombretarea"=>$_params['nombretarea'],
                ":descripcion"=>$_params['descripcion'],
                ":idproyecto"=>$_params['idproyecto'],
                ":idmiembro"=>$_params['idmiembro'],
                ":idtarea"=>$_params['idtarea']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function completarTarea($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "UPDATE `tareas` SET `archivo`=:archivo,`completada`=:completada WHERE `idtarea`=:idtarea";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":archivo"=>$_params['archivo'],
                ":completada"=> $_params['completada'],
                ":idtarea"=>$_params['idtarea'],
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function mostrarTareasPorProyecto($idproyecto) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `tareas` WHERE `idproyecto`=:idproyecto";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idproyecto" => $idproyecto
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarTareasDeUsuario($idusuario) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `nombretarea`, `descripcion`, `idproyecto`, `idtarea`, `completada` FROM `tareas`
            INNER JOIN `miembros` ON `tareas`.`idmiembro` = `miembros`.`idmiembro`
            WHERE `miembros`.`idusuario` = :idusuario";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idusuario" => $idusuario
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarTareasPorId($idtarea) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `tareas` WHERE `idtarea`=:idtarea";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idtarea" => $idtarea
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
            return false;
        }

        public function eliminarTarea($idtarea) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "DELETE FROM `tareas` WHERE `idtarea`=:idtarea";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idtarea" => $idtarea
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
            return false;
        }

    }
?>