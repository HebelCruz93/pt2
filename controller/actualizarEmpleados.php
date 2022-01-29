<?php
    require 'conexion.php';
     session_start();
    $idEmpleadoA = $_POST['idEmpleado'];    
    $nombreCompletoA = $_POST['nombreCompleto'];
    $fechaEntradaA = $_POST['fechaEntrada'];
    $edadA = $_POST['edad']; 
    $sexoA = $_POST['sexo'];  
    $curpA = $_POST['curp'];
    $rfcA = $_POST['rfc'];
    $nssA = $_POST['nss'];
    $telefonoA = $_POST['telefono']; 
    $correoA = $_POST['correo']; 
    $estadoA = $_POST['estado'];
    $ciudadA = $_POST['ciudad'];
    $coloniaA = $_POST['colonia'];
    $cpA = $_POST['cp'];   
    $noExteriorA = $_POST['noExterior'];
    $noInteriorA = $_POST['noInterior'];   
    $idPuestoEmpleadoA = $_POST['idPuestoEmpleado'];  
    
    if (empty(trim($nombreCompletoA))) {
        echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$nombreCompletoA)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($nombreCompletoA))) {
        echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$nombreCompletoA)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($fechaEntradaA))) {
        echo "<script>alert('El campo Fecha de entrada no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
  /*  } else if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/",$fechaEntradaA)) {
        echo "<script>alert('El campo Fecha debe contener el formato dd-mm-aaaa');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";*/

    } else if (empty(trim($edadA))) {
        echo "<script>alert('El campo Edad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{2,2}$/",$edadA) ) {
        echo "<script>alert('Unicamente se aceptan 2 digitos');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($curpA))) {
        echo "<script>alert('El campo CURP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[A-Z0-9]{16,18}$/",$curpA)) {
        echo "<script>alert('Error: CURP - El CURP solo puede contener letras sin espacios, y numeros en un rango de 16 a 18 caracteres');</script>";
        echo "<script> window.location.href = ../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($rfcA))) {
        echo "<script>alert('El campo RFC no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    }else if (!preg_match("/^[A-Z0-9]{11,13}$/",$rfcA)) {
        echo "<script>alert('El campo RFC solo puede contener letras sin espacios, y numeros en un rango de 11 a 13 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";  
    } else if (empty(trim($nssA))) {
        echo "<script>alert('El campo NSS no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{10,11}$/",$nssA)) {
        echo "<script>alert(El campo NSS solo puede ingresar numeros en un rango 10 a 11 caracteres');</script>";
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
   /* }else if (strlen($idUsuarioA) == 0) {
        echo "<script>alert('El campo Usuario no debe estar vacio');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";*/
    }else if (strlen($idPuestoEmpleadoA) == 0) {
        echo "<script>alert('El campo Puesto no debe estar vacio');</script>";
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
    

   
    // Estos datos de los parametros deben venir de un form para ejecutar el script
    $queryModificar = "UPDATE empleado
                        SET 
                        nombreCompleto=:nombreCompletoP,
                        fechaEntrada=:fechaEntradaP,                        
                        edad=:edadP,
                        sexo=:sexoP,
                        curp=:curpP,
                        rfc=:rfcP,
                        nss=:nssP,
                        telefono=:telefonoP,
                        correo=:correoP,
                        estado=:estadoP,
                        ciudad=:ciudadP,
                        colonia=:coloniaP,
                        cp=:cpP,
                        noExterior=:noExteriorP,
                        noInterior=:noInteriorP,
                        idPuestoEmpleado=:idPuestoEmpleadoP
                        WHERE
                        idEmpleado=:idEmpleadoP";


    $resultado=$dbConexion->prepare($queryModificar);
    $resultado->execute(array(":nombreCompletoP"=>$nombreCompletoA,
                                ":fechaEntradaP"=>$fechaEntradaA,
                                ":edadP"=>$edadA,
                                ":sexoP"=>$sexoA,                               
                                ":curpP"=>$curpA,
                                ":rfcP"=>$rfcA,
                                ":nssP"=>$nssA,
                                ":telefonoP"=>$telefonoA,
                                ":correoP"=>$correoA,                               
                                ":estadoP"=>$estadoA,
                                ":ciudadP"=>$ciudadA,
                                ":coloniaP"=>$coloniaA,
                                ":cpP"=>$cpA,
                                ":noExteriorP"=>$noExteriorA,                               
                                ":noInteriorP"=>$noInteriorA,
                                ":idPuestoEmpleadoP"=>$idPuestoEmpleadoA,
                                ":idEmpleadoP"=>$idEmpleadoA));     
          
    echo "<script>alert('¡Usuario modificado con exito!');</script>";  
    echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    $resultado->closeCursor();  
    
    }
?>