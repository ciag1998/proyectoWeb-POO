<?php

include_once 'insertar.php';

class validar{
    private $nombre;
    private $apellido;
    private $correo;
    private $fecha;
    private $contra;
    private $rContra;

    private $errorNombre;
    private $errorApellido;
    private $errorCorreo;
    private $errorFecha;
    private $errorContra;
    private $errorRContra;

    public function __construct($pNombre,$pApellido,$pCorreo,$pFecha,$pContra,$pRContra,$conexion){
        $this->nombre = "";
        $this->apellido = "";
        $this->correo = "";
        $this->fecha = "";
        $this->contra = "";
        $this->rContra = "";
        $this->errorNombre = $this-> validarNombre($pNombre,$conexion);
        $this->errorApellido = $this-> validarApellido($pApellido,$conexion);
        $this->errorCorreo = $this-> validarCorreo($pCorreo,$conexion);
        $this->errorFecha = $this-> validarFecha($pFecha);
        $this->errorContra = $this-> validarContra($pContra);
        $this->errorRContra = $this-> validarRContra($pRContra,$pContra);
    }

    public function variableIniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }

    public function validarNombre($pNombre,$conexion){
        if(!$this->variableIniciada($pNombre)){
            echo "Ingrese un Nombre"."<br>";
        }else{
            $this->nombre = $pNombre;
        }

        if(strlen($pNombre)<2){
            echo "Nombre Muy Pequeño"."<br>";
        }

        if(strlen($pNombre)>20){
            echo "Nombre Muy Largo"."<br>";
        }
        if(insertar::existeNombre($conexion,$pNombre)){
            echo "Nombre en Uso"."<br>";
        }
        return " ";
    }

    public function validarApellido($pApellido, $conexion){
        if(!$this->variableIniciada($pApellido)){
            echo "Ingrese un Apellido"."<br>";
        }else{
            $this->apellido = $pApellido;
        }

        if(strlen($pApellido)<2){
            echo "Apellido Muy Pequeño"."<br>";
        }

        if(strlen($pApellido)>20){
            echo "Apellido Muy Largo"."<br>";
        }
        if(insertar::existeApellido($conexion,$pApellido)){
            echo "Apellido en Uso"."<br>";
        }
        return " ";
    }

    public function validarCorreo($pCorreo, $conexion){
        if(!$this->variableIniciada($pCorreo)){
            echo "Ingrese un Correo"."<br>";
        }else{
            $this->correo = $pCorreo;
        }

        if(insertar::existeCorreo($conexion,$pCorreo)){
            echo "Correo en Uso"."<br>";
        }

        if(filter_var($pCorreo, FILTER_VALIDATE_EMAIL) == false){
            echo "Correo invalido ($pCorreo)"."<br>"; 
        }

        return " ";
    }

    public function validarContra($pContra){
        if(!$this->variableIniciada($pContra)){
            echo "Ingrese Contraseña"."<br>"; 
        }
        if(strlen($pContra)<6){
            echo "Contraseña muy Corta"."<br>";
        }
    }

    public function validarRContra($pContra,$pRContra){
        if(!$this->variableIniciada($pContra)){
            echo "Ingrese Contraseña"."<br>";  
        }

        if(!$this->variableIniciada($pRContra)){
            echo "Ingrese Contraseña"."<br>";   
        }

        if ($pContra != $pRContra) {
            echo "No son iguales"."<br>";
        }
        return " ";
    }

    public function validarFecha($pFecha){
        if(!$this->variableIniciada($pFecha)){
            echo "Ingrese Fecha"."<br>";
        }

        if($pFecha == 0){
            echo "Ingrese Invalida"."<br>";
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getContra(){
        return $this->contra;
    }

    public function getRContra(){
        return $this->rContra;
    }

    public function registroValido(){
        if($this->errorNombre === "" && $this->errorApellido === "" && $this->errorCorreo === "" && $this->errorFecha === "" && $this->errorContra === "" && $this->errorRContra === ""){
            return true;
        }else{
            return false;
        }
    }
}


?>