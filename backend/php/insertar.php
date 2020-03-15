<?php
class insertar{
    public static function insertarUsuario($conexion, $usuario){
        $usuarioInsertado = false;
        if(isset($conexion)){
            try{
                $sql = "INSERT INTO listaUsuario(nombre,apellido,correo,fecha,contra) values(:nombre,:apellido,:correo,:fecha,:contra)";
                $sentencia = $conexion->prepare($sql);
                
                
                $nombre = $usuario->getNombre();
                $apellido = $usuario->getApellido();
                $correo = $usuario->getFecha();
                $fecha = $usuario->getCorreo();
                $contra = $usuario->getContra();

                
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':contra', $contra, PDO::PARAM_STR);


                $usuarioInsertado = $sentencia->execute();
                $usuarioInsertado = true;
                

            }catch(PDOException $e){
                echo "ERROR";
            }
        }

        return $usuarioInsertado;
    } 

    public static function existeNombre($conexion,$nombre){
        $nombreExiste = true;

        if(!isset($conexion)){
            try{

                $sql = "SELECT * FROM listaUsuario where nombre = :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if(count($resultado)){
                    $nombreExiste = true;
                }else{
                    $nombreExiste = false;
                } 

            }catch(PDOException $e){
                echo "ERROR";
            }
        }
        return $nombreExiste;
    }

    public static function existeApellido($conexion,$apellido){
        $apellidoExiste = true;

        if(!isset($conexion)){
            try{

                $sql = "SELECT * FROM listaUsuario where apellido = :apellido";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':apellido',$apellido,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if(count($resultado)){
                    $apellidoExiste = true;
                }else{
                    $apellidoExiste = false;
                } 

            }catch(PDOException $e){
                echo "ERROR";
            }
        }
        return $apellidoExiste;
    }

    public function existeCorreo($conexion,$correo){

        $correoExiste = true;

        if(!isset($conexion)){
            try{

                $sql = "SELECT * FROM listaUsuario where correo = :correo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':correo',$correo,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if(count($resultado)){
                    $correoExiste = true;
                }else{
                    $correoExiste = false;
                } 

            }catch(PDOException $e){
                echo "ERROR";
            }
        }  
        return $correoExiste;
    }
}
?>