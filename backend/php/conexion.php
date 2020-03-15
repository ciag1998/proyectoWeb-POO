<?php
class Conexion{

    private static $conexion;

    public static function abrirConexion(){
        
        if(!isset(self::$conexion)){
            try {

                include_once 'config.php';

                self::$conexion = new PDO('pgsql:host='.NOMBRE_SERVIDOR.'; dbname='.BASE_DE_DATOS,NOMBRE_USUARIO,PASSWOED);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET NAMES 'utf8'");

            } catch (PDOException $ex) {

               echo "Error";

            }
        }
    }

    public static function cerrarConexion(){
        if (isset(self::$conexion)) {
            self::$conexion=null;
        }
    }

    public static function obtenerConexion(){

        if(isset(self::$conexion)){
            return self::$conexion;
            echo "conexion exitosa"."<br>";
        }else{
            echo "error conexion";
        }
        
    }
}
   
?>