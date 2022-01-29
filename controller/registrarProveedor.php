<?php
    require 'conexion.php';
     session_start();
    $razonSocialR = $_POST['razonSocial'];
    $rfcR = $_POST['rfc'];   
    $telefonoR = $_POST['telefono']; 
    $correoR = $_POST['correo']; 
    $estadoR = $_POST['estado'];
    $ciudadR = $_POST['ciudad'];
    $coloniaR = $_POST['colonia'];
    $cpR = $_POST['cp'];   
    $noExteriorR = $_POST['noExterior'];
    $noInteriorR = $_POST['noInterior'];  

      if (empty(trim($razonSocialR))) {
         echo "<script>alert('El campo Razon social completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$razonSocialR)) {
        echo "<script>alert('El campo Razon social completo solo puede contener letras');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";    
    } else if (empty(trim($rfcR))) {
        echo "<script>alert('El campo RFC no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    }else if (!preg_match("/^[A-Z0-9]{11,13}$/",$rfcR)) {
        echo "<script>alert('El campo RFC solo puede contener letras sin espacios, y numeros en un rango de 11 a 13 caracteres');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";  
    } else if (empty(trim($telefonoR))) {
        echo "<script>alert('El campo Teléfono no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{8,12}$/",$telefonoR) ) {
        echo "<script>alert('Unicamente se aceptan numeros, hasta un maximo de 12 digitos');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>"; 
    } else if (empty(trim($correoR))) {
        echo "<script>alert('El campo Correo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";    
    } else if (!filter_var($correoR, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo electronico debe ser valido');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($estadoR))) {
        echo "<script>alert('El campo Estado no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$estadoR)) {
        echo "<script>alert('El campo Estado solo puede contener letras');</script>";
         echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($ciudadR))) {
        echo "<script>alert('El campo Ciudad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$ciudadR)) {
        echo "<script>alert('El campo Ciudad solo puede contener letras');</script>";
         echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($coloniaR))) {
        echo "<script>alert('El campo Colonia no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$coloniaR)) {
        echo "<script>alert('El campo Colonia solo puede contener letras');</script>";
         echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($cpR))) {
        echo "<script>alert('El campo CP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^[0-9]{5,6}$/",$cpR)) {
        echo "<script>alert('El campo CP solo puede ingresar de 5 a 6 caracteres');</script>";
         echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($noExteriorR))) {
        echo "<script>alert('El campo No. Exterior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noExteriorR)) {
        echo "<script>alert(El campo No. Exterior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (empty(trim($noInteriorR))) {
        echo "<script>alert('El campo No. Interior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noInteriorR)) {
        echo "<script>alert(El campo No. Interior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../vista/admin/adminRegistrarProveedor.php'; </script>";
    }else {
    // Estos datos de los parametros deben venir de un form para ejecutar el script
  
    $queryRegistro ="INSERT INTO proveedor (razonSocial, rfc, telefono, correo, estado, ciudad, colonia, cp, noExterior, noInterior) 
    VALUES (:razonSocialP, :rfcP, :telefonoP, :correoP, :estadoP, :ciudadP, :coloniaP, :cpP, :noExteriorP, :noInteriorP) ";

    $resultado=$dbConexion->prepare($queryRegistro);
    $resultado->execute(array(":razonSocialP"=>$razonSocialR,                               
                                ":rfcP"=>$rfcR,                               
                                ":telefonoP"=>$telefonoR,
                                ":correoP"=>$correoR,                               
                                ":estadoP"=>$estadoR,
                                ":ciudadP"=>$ciudadR,
                                ":coloniaP"=>$coloniaR,
                                ":cpP"=>$cpR,
                                ":noExteriorP"=>$noExteriorR,                               
                                ":noInteriorP"=>$noInteriorR,                                
                                ));
    echo "<script>alert('¡Proveedor registrado con exito!');</script>";
    echo "<script> window.location.href = '../../vista/admin/adminRegistrarProveedor.php'; </script>";
                            }
    $resultado->closeCursor();  
?>