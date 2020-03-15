<?php
class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $fecha;
    private $contra;

    public function __construct($pId,$pNombre,$pApellido,$pCorreo,$pFecha,$pContra){
        $this->id = $pId;
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->fecha = $pFecha;
        $this->correo = $pCorreo;
        $this->contra = $pContra;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getContra(){
        return $this->contra;
    }
}
?>