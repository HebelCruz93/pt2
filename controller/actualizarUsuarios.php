<?php
    require 'conexion.php';
     session_start();
    $idUsuarioA = $_POST['idUsuario'];
    $nombreUsuarioA = $_POST['nombreUsuario'];
    $contraUsuarioA = $_POST['contraUsuario'];
    $idTipoUsuarioA = $_POST['idTipoUsuario'];   

    if (empty(trim($nombreUsuarioA))) {
        echo "<script>alert('El campo usuario no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    } else if (empty(trim($contraUsuarioA))) {
        echo "<script>alert('El campo contraseña no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    }else if (preg_match("/^([*])$/",$nombreUsuarioA)) { // Permite validar si existen *
        echo "<script>alert('No se permiten caracteres *');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    }else if (preg_match("/^([*])$/",$contraUsuarioA)) { // Permite validar si existen *
        echo "<script>alert('No se permiten caracteres *');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    }else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$nombreUsuarioA)) { 
        echo "<script>alert('El usuario debe contener mínimo 8 caracteres, al menos una letra y un número');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    }else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$contraUsuarioA)) { 
        echo "<script>alert('La contraseña debe contener mínimo 8, al menos una letra mayúscula, una letra minúscula y un número'); </script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";  
    }else{
    // Estos datos de los parametros deben venir de un form para ejecutar el script
    $queryModificar = "UPDATE usuario
                        SET 
                        nombreUsuario=:nombreUsuario,
                        contraUsuario=:contraUsuario,
                        idTipoUsuario=:idTipoUsuario
                        WHERE
                        idUsuario =:idUsuario";

    $resultado=$dbConexion->prepare($queryModificar);
    $resultado->execute(array(":nombreUsuario"=>$nombreUsuarioA,
                                ":contraUsuario"=>$contraUsuarioA,
                                ":idTipoUsuario"=>$idTipoUsuarioA,                               
                                ":idUsuario"=>$idUsuarioA
                                ));
    echo "<script>alert('¡Usuario modificado con exito!');</script>";  
    echo "<script> window.location.href = '../../vista/admin/adminVisualizarUsuario.php'; </script>";
    }
    $resultado->closeCursor();  
?>