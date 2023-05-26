<?php

    require_once("Conexion.php");

    class Equipos {

        public function registrarEquipo($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "INSERT INTO `equipos`( `nombreequipo`, `lider`) VALUES (:nombreequipo, :lider)";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombreequipo"=>$_params['nombreequipo'],
                ":lider"=>$_params['lider']
            );
    
            if($resultado->execute($_array)) {
                $equipoId = $cn->lastInsertId();
                return $equipoId;
            }
            return false;
        }

        public function actualizarEquipo($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "UPDATE `equipos` SET `nombreequipo`=:nombreequipo,`lider`=:lider WHERE `idequipo`=:idequipo";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":nombreequipo"=>$_params['nombreequipo'],
                ":lider"=>$_params['lider'],
                ":idequipo"=>$_params['idequipo']
            );
    
            if($resultado->execute($_array)) {
                $equipoId = $cn->lastInsertId();
                return $equipoId;
            }
            return false;
        }

        public function registrarMiembros($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "INSERT INTO `miembros`(`idequipo`, `idusuario`) VALUES (:idequipo, :idusuario)";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo"=>$_params['idequipo'],
                ":idusuario"=>$_params['idusuario']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function actualizarMiembros($_params) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "UPDATE `miembros` SET `idequipo`=:idequipo,`idusuario`=:idusuario WHERE `idmiembro`=:idmiembro";
    
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo"=>$_params['idequipo'],
                ":idusuario"=>$_params['idusuario'],
                ":idmiembro"=>$_params['idmiembro']
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function eliminarEquipo($idequipo) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "DELETE FROM `equipos` WHERE `idequipo` = :idequipo";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo" => $idequipo
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function eliminarMiembros($idequipo) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "DELETE FROM `miembros` WHERE `idequipo` = :idequipo";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo" => $idequipo
            );
    
            if($resultado->execute($_array))
                return true;
            return false;
        }
    
        public function mostrarEquipos() {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `equipos` ORDER BY `idequipo`";
            $resultado = $cn->prepare($sql);
    
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarEquiposDondeMiembro($idusuario) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `idequipo` FROM `miembros` WHERE `idusuario` = :idusuario";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idusuario" => $idusuario
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarMiembrosEquipo($idequipo) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `miembros` WHERE `idequipo` = :idequipo";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo" => $idequipo
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }

        public function mostrarEquiposDondeLider($lider) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `equipos` WHERE `lider` = :lider";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":lider" => $lider
            );
    
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }
    
        public function mostrarEquipoPorID($idequipo) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT * FROM `equipos` WHERE `idequipo` = :idequipo";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idequipo" => $idequipo
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
                
            return false;
        }

        public function mostrarMiembroPorID($idmiembro) {
            $base = new Conexion();
            $cn = $base->getConexion();
            $sql = "SELECT `idusuario` FROM `miembros` WHERE `idmiembro` = :idmiembro";
            $resultado = $cn->prepare($sql);
    
            $_array = array(
                ":idmiembro" => $idmiembro
            );
    
            if($resultado->execute($_array))
                return $resultado->fetch();
                
            return false;
        }


    }
?>