<?php
    require 'conexion.php';
    

    $nombreUsuarioR = $_POST['nombreUsuario'];
    $contraUsuarioR = $_POST['contraUsuario'];
    $idTipoUsuarioR = $_POST['idTipoUsuario']; 


    if (empty(trim($nombreUsuarioR))) {
       echo "<script>alert('El campo usuario no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    } else if (empty(trim($contraUsuarioR))) {
        echo "<script>alert('El campo contraseña no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else if (preg_match("/^([*])$/",$nombreUsuarioR)) { // Permite validar si existen *
        echo "<script>alert('No se permiten caracteres *');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else if (preg_match("/^([*])$/",$contraUsuarioR)) { // Permite validar si existen *
        echo "<script>alert('No se permiten caracteres *');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$nombreUsuarioR)) { 
        echo "<script>alert('El usuario debe contener mínimo 8 caracteres, al menos una letra y un número');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$contraUsuarioR)) { 
        echo "<script>alert('La contraseña debe contener mínimo 8, al menos una letra mayúscula, una letra minúscula y un número'); </script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else{
        
        $queryValidacionUsuario = "SELECT * FROM `usuario` WHERE nombreUsuario LIKE :nombreUsuarioV";
        $validacion = $dbConexion->prepare($queryValidacionUsuario);
        
        $validacion->execute(array(":nombreUsuarioV"=>$nombreUsuarioR));
        if ($consulta=$validacion->fetch(PDO::FETCH_ASSOC)) {
             echo "<script>alert('El nombre de usuario ya existe');</script>";
             echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
        }else{

    $queryRegistroUsuario="INSERT INTO usuario (nombreUsuario, contraUsuario, idTipoUsuario) VALUES (:nombreUsuarioP, :contraUsuarioP,:idTipoUsuarioP)";

     
    $resultado=$dbConexion->prepare($queryRegistroUsuario);
   
    // Estos datos de los parametros deben venir de un form para ejecutar el script    

   
    $resultado->execute(array(":nombreUsuarioP"=>$nombreUsuarioR,
                                ":contraUsuarioP"=>$contraUsuarioR,
                                ":idTipoUsuarioP"=>$idTipoUsuarioR                                 
                                ));
    echo "<script>alert('¡Empleado registrado con exito!');</script>";
    echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    
    }
    }
?>