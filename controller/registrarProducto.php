<?php
    require 'conexion.php';
     session_start();
    $nombreR = $_POST['nombreProducto'];
    $materialR = $_POST['material'];   
    $dimensionesR = $_POST['dimensiones']; 
    $precioR = $_POST['precio']; 
    $cantidadR = $_POST['cantidad'];
    $imagenR = $_POST['imagen']
  
/*
      if (empty(trim($razonSocialR))) {
         echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$razonSocialR)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";    
    } else if (empty(trim($rfcR))) {
        echo "<script>alert('El campo RFC no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    }else if (!preg_match("/^[A-Z0-9]{11,13}$/",$rfcR)) {
        echo "<script>alert('El campo RFC solo puede contener letras sin espacios, y numeros en un rango de 11 a 13 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";  
    } else if (empty(trim($telefonoR))) {
        echo "<script>alert('El campo Teléfono no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{8,12}$/",$telefonoR) ) {
        echo "<script>alert('Unicamente se aceptan numeros, hasta un maximo de 12 digitos');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>"; 
    } else if (empty(trim($correoR))) {
        echo "<script>alert('El campo Correo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";    
    } else if (!filter_var($correoR, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo electronico debe ser valido');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($estadoR))) {
        echo "<script>alert('El campo Estado no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$estadoR)) {
        echo "<script>alert('El campo Estado solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($ciudadR))) {
        echo "<script>alert('El campo Ciudad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$ciudadR)) {
        echo "<script>alert('El campo Ciudad solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($coloniaR))) {
        echo "<script>alert('El campo Colonia no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$coloniaR)) {
        echo "<script>alert('El campo Colonia solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($cpR))) {
        echo "<script>alert('El campo CP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^[0-9]{5,6}$/",$cpR)) {
        echo "<script>alert('El campo CP solo puede ingresar de 5 a 6 caracteres');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($noExteriorR))) {
        echo "<script>alert('El campo No. Exterior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noExteriorR)) {
        echo "<script>alert(El campo No. Exterior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (empty(trim($noInteriorR))) {
        echo "<script>alert('El campo No. Interior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noInteriorR)) {
        echo "<script>alert(El campo No. Interior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminRegistrarCliente.php'; </script>";
    }else {*/
    // Estos datos de los parametros deben venir de un form para ejecutar el script
  
    $queryRegistro ="INSERT INTO producto (nombre, material, dimensiones, precioUnitario, cantidad,imagen) 
    VALUES (:nombreP, :materialP, :dimensionesP, :precioUnitarioP, :cantidadP,:imagenP) ";

    $resultado=$dbConexion->prepare($queryRegistro);
    $resultado->execute(array(":nombreP"=>$nombreR,                               
                                ":materialP"=>$materialR,                               
                                ":dimensionesP"=>$dimensionesR,
                                ":precioUnitarioP"=>$precioR,                               
                                ":cantidadP"=>$cantidadR,
                                ":imagenP"=>$imagenR                                                               
                                ));
    echo "<script>alert('¡Producto registrado con exito!');</script>";
    echo "<script> window.location.href = '../vista/admin/adminRegistrarProducto.php'; </script>";
                            //}
    $resultado->closeCursor();  
?>