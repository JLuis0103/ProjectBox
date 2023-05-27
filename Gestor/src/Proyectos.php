<?php

    require_once("Conexion.php");

    class Proyectos {

        public function registrarProyecto($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "INSERT INTO `proyectos`(`nombreproyecto`, `descripcion`, `url`, `fechainicio`, `fechafin`, `lider`, `equipo`) VALUES (:nombreproyecto, :descripcion, :urll, :fechainicio, :fechafin, :lider, :equipo)";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombreproyecto"=>$_params['nombreproyecto'],
                ":descripcion"=>$_params['descripcion'],
                ":urll"=>$_params['url'],
                ":fechainicio"=>$_params['fechainicio'],
                ":fechafin"=>$_params['fechafin'],
                ":lider"=>$_params['lider'],
                ":equipo"=>$_params['equipo']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function editarProyecto($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "UPDATE `proyectos` SET `nombreproyecto`=:nombreproyecto,`descripcion`=:descripcion,`url`=:urll,`fechainicio`=:fechainicio,`fechafin`=:fechafin,`lider`=:lider,`equipo`=:equipo WHERE `idproyecto`=:idproyecto";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombreproyecto"=>$_params['nombreproyecto'],
                ":descripcion"=>$_params['descripcion'],
                ":urll"=>$_params['url'],
                ":fechainicio"=>$_params['fechainicio'],
                ":fechafin"=>$_params['fechafin'],
                ":lider"=>$_params['lider'],
                ":equipo"=>$_params['equipo'],
                ":idproyecto"=>$_params['idproyecto']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function eliminarProyecto($idproyecto) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "DELETE FROM `proyectos` WHERE `idproyecto` = :idproyecto";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idproyecto" => $idproyecto
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function mostrarProyectos() {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `proyectos` ORDER BY `idproyecto`";
            $resultado = $cn->prepare($sql);
    
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarProyectoPorID($idproyecto) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `proyectos` WHERE `idproyecto` = :idproyecto";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idproyecto" => $idproyecto
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
                
            return false;
        }

        public function mostrarProyectosDondeLider($lider) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `proyectos` WHERE `lider` = :lider";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":lider" => $lider
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarProyectosDondeMiembro($idusuario) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM proyectos INNER JOIN equipos ON proyectos.equipo = equipos.idequipo INNER JOIN miembros ON equipos.idequipo = miembros.idequipo WHERE idusuario = :idusuario";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idusuario" => $idusuario
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }


    }
?>