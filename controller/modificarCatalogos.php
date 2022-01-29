<?php
    require 'conexion.php';
     session_start();
    $idCatalogoA = $_POST['idCatalogo'];    
    $nombre = $_POST['nombre'];   
    $descripcion = $_POST['descripcion'];  
    
   
    /*
    if (empty(trim($razonSocialA))) {
        echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$razonSocialA)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($razonSocialA))) {
        echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$razonSocialA)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($rfcA))) {
        echo "<script>alert('El campo RFC no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    }else if (!preg_match("/^[A-Z0-9]{11,13}$/",$rfcA)) {
        echo "<script>alert('El campo RFC solo puede contener letras sin espacios, y numeros en un rango de 11 a 13 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>"; 
    } else if (empty(trim($telefonoA))) {
        echo "<script>alert('El campo Teléfono no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{8,12}$/",$telefonoA) ) {
        echo "<script>alert('Unicamente se aceptan numeros, hasta un maximo de 12 digitos');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>"; 
    } else if (empty(trim($correoA))) {
        echo "<script>alert('El campo Correo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";     
    } else if (!filter_var($correoA, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo electronico debe ser valido');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($estadoA))) {
        echo "<script>alert('El campo Estado no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$estadoA)) {
        echo "<script>alert('El campo Estado solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($ciudadA))) {
        echo "<script>alert('El campo Ciudad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$ciudadA)) {
        echo "<script>alert('El campo Ciudad solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($coloniaA))) {
        echo "<script>alert('El campo Colonia no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$coloniaA)) {
        echo "<script>alert('El campo Colonia solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($cpA))) {
        echo "<script>alert('El campo CP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{5,6}$/",$cpA)) {
        echo "<script>alert('El campo CP solo puede ingresar de 5 a 6 caracteres');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($noExteriorA))) {
        echo "<script>alert('El campo No. Exterior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noExteriorA)) {
        echo "<script>alert(El campo No. Exterior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($noInteriorA))) {
        echo "<script>alert('El campo No. Interior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noInteriorA)) {
        echo "<script>alert(El campo No. Interior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    }else {
    */

   
    // Estos datos de los parametros deben venir de un form para ejecutar el script
    $queryModificar = "UPDATE catalogo
                        SET 
                        idCatalogo=:idCatalogoP,                             
                        nombreCatalogo=:nombreCatalogoP,                       
                        descripcion=:descripcionP                                    
                        WHERE
                        idCatalogo=:idCatalogoP";


    $resultado=$dbConexion->prepare($queryModificar);
    $resultado->execute(array(":idCatalogoP"=>$idCatalogoA,                                
                                ":nombreCatalogoP"=>$nombre,
                                ":descripcionP"=>$descripcion
    ));     
          
    echo "<script>alert('¡Catalogo modificado con exito!');</script>";  
    echo "<script> window.location.href = '../vista/admin/visualizarCatalogos.php'; </script>";
    $resultado->closeCursor();  
    
    
?>