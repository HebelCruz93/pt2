<?php
    require 'conexion.php';
     session_start();
    $nombreCompletoR = $_POST['nombreCompleto'];
    $fechaEntradaR = $_POST['fechaEntrada'];
    $edadR = $_POST['edad']; 
    $sexoR = $_POST['sexo'];  
    $curpR = $_POST['curp'];
    $rfcR = $_POST['rfc'];
    $nssR = $_POST['nss'];
    $telefonoR = $_POST['telefono']; 
    $correoR = $_POST['correo']; 
    $estadoR = $_POST['estado'];
    $ciudadR = $_POST['ciudad'];
    $coloniaR = $_POST['colonia'];
    $cpR = $_POST['cp'];   
    $noExteriorR = $_POST['noExterior'];
    $noInteriorR = $_POST['noInterior'];  
    $idPuestoEmpleadoR = $_POST['idPuestoEmpleado']; 
    $nombreUsuarioR = $_POST['nombreUsuario'];
    $contraUsuarioR = $_POST['contraUsuario'];
    $idTipoUsuarioR = $_POST['idTipoUsuario']; 

      if (empty(trim($nombreCompletoR))) {
         echo "<script>alert('El campo Nombre completo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$nombreCompletoR)) {
        echo "<script>alert('El campo Nombre completo solo puede contener letras');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($fechaEntradaR))) {
        echo "<script>alert('El campo Fecha de entrada no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/",$fechaEntradaR)) {
        echo "<script>alert('El campo Fecha debe contener el formato dd-mm-aaaa');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($edadR))) {
        echo "<script>alert('El campo Edad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{2,2}$/",$edadR) ) {
        echo "<script>alert('Unicamente se aceptan 2 digitos');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($curpR))) {
        echo "<script>alert('El campo CURP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[A-Z0-9]{16,18}$/",$curpR)) {
        echo "<script>alert('Error: CURP - El CURP solo puede contener letras sin espacios, y numeros en un rango de 16 a 18 caracteres');</script>";
        echo "<script> window.location.href = ../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($rfcR))) {
        echo "<script>alert('El campo RFC no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    }else if (!preg_match("/^[A-Z0-9]{11,13}$/",$rfcR)) {
        echo "<script>alert('El campo RFC solo puede contener letras sin espacios, y numeros en un rango de 11 a 13 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";  
    } else if (empty(trim($nssR))) {
        echo "<script>alert('El campo NSS no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{10,11}$/",$nssR)) {
        echo "<script>alert(El campo NSS solo puede ingresar numeros en un rango 10 a 11 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";  
    } else if (empty(trim($telefonoR))) {
        echo "<script>alert('El campo Teléfono no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9 ?]{8,12}$/",$telefonoR) ) {
        echo "<script>alert('Unicamente se aceptan numeros, hasta un maximo de 12 digitos');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>"; 
    } else if (empty(trim($correoR))) {
        echo "<script>alert('El campo Correo no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>"; 
 /*  }else if (strlen($idUsuarioR) == 0) {
        echo "<script>alert('El campo Usuario no debe estar vacio');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";*/
    }else if (strlen($idPuestoEmpleadoR) == 0) {
        echo "<script>alert('El campo Puesto no debe estar vacio');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!filter_var($correoR, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo electronico debe ser valido');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($estadoR))) {
        echo "<script>alert('El campo Estado no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$estadoR)) {
        echo "<script>alert('El campo Estado solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($ciudadR))) {
        echo "<script>alert('El campo Ciudad no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$ciudadR)) {
        echo "<script>alert('El campo Ciudad solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($coloniaR))) {
        echo "<script>alert('El campo Colonia no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",$coloniaR)) {
        echo "<script>alert('El campo Colonia solo puede contener letras');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($cpR))) {
        echo "<script>alert('El campo CP no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{5,6}$/",$cpR)) {
        echo "<script>alert('El campo CP solo puede ingresar de 5 a 6 caracteres');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($noExteriorR))) {
        echo "<script>alert('El campo No. Exterior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noExteriorR)) {
        echo "<script>alert(El campo No. Exterior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (empty(trim($noInteriorR))) {
        echo "<script>alert('El campo No. Interior no puede contener unicamente espacios');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    } else if (!preg_match("/^[0-9]{1,5}$/",$noInteriorR)) {
        echo "<script>alert(El campo No. Interior solo puede ingresar numeros en un rango 1 a 5 caracteres');</script>";
        echo "<script> window.location.href = '../../vista/admin/adminVisualizarEmpleado.php'; </script>";
    }else if (empty(trim($nombreUsuarioR))) {
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
    
    // Estos datos de los parametros deben venir de un form para ejecutar el script

    $queryValidacionUsuario = "SELECT * FROM `usuario` WHERE nombreUsuario LIKE :nombreUsuarioV";
    $validacion = $dbConexion->prepare($queryValidacionUsuario);
    
    $validacion->execute(array(":nombreUsuarioV"=>$nombreUsuarioR));
    if ($consulta=$validacion->fetch(PDO::FETCH_ASSOC)) {
         echo "<script>alert('El nombre de usuario ya existe');</script>";
         echo "<script> window.location.href = '../../vista/admin/adminRegistrarUsuario.php'; </script>";
    }else{

    $queryRegistroUsuario="INSERT INTO usuario (nombreUsuario, contraUsuario, idTipoUsuario) VALUES (:nombreUsuarioP, :contraUsuarioP,:idTipoUsuarioP)";

 
    $resultadoRegistroUsuario=$dbConexion->prepare($queryRegistroUsuario);

// Estos datos de los parametros deben venir de un form para ejecutar el script    


    $resultadoRegistroUsuario->execute(array(":nombreUsuarioP"=>$nombreUsuarioR,
                            ":contraUsuarioP"=>$contraUsuarioR,
                            ":idTipoUsuarioP"=>$idTipoUsuarioR                                 
                            ));

   $queryUsuario = "SELECT idUsuario FROM usuario WHERE nombreUsuario=:nombreUsuarioP";
   $resultadoUsuario=$dbConexion->prepare($queryUsuario);
    $resultadoUsuario->execute(array(":nombreUsuarioP"=>$nombreUsuarioR));
    $row=$resultadoUsuario->fetch(PDO::FETCH_ASSOC);
    $idUsuarioR = $row['idUsuario'];
  
    $queryRegistro ="INSERT INTO empleado (nombreCompleto, fechaEntrada, edad, sexo, curp, rfc, nss, telefono, correo, estado, ciudad, colonia, cp, noExterior, noInterior, idUsuario, idPuestoEmpleado) 
    VALUES (:nombreCompletoP, :fechaEntradaP, :edadP, :sexoP, :curpP, :rfcP, :nssP, :telefonoP, :correoP, :estadoP, :ciudadP, :coloniaP, :cpP, :noExteriorP, :noInteriorP, :idUsuarioP, :idPuestoEmpleadoP) ";

    $resultadoRegistro=$dbConexion->prepare($queryRegistro);
    $resultadoRegistro->execute(array(":nombreCompletoP"=>$nombreCompletoR,
                                ":fechaEntradaP"=>$fechaEntradaR,
                                ":edadP"=>$edadR,   
                                ":sexoP"=>$sexoR,                            
                                ":curpP"=>$curpR,
                                ":rfcP"=>$rfcR,
                                ":nssP"=>$nssR,
                                ":telefonoP"=>$telefonoR,
                                ":correoP"=>$correoR,                               
                                ":estadoP"=>$estadoR,
                                ":ciudadP"=>$ciudadR,
                                ":coloniaP"=>$coloniaR,
                                ":cpP"=>$cpR,
                                ":noExteriorP"=>$noExteriorR,                               
                                ":noInteriorP"=>$noInteriorR,
                                ":idUsuarioP"=>$idUsuarioR,                               
                                ":idPuestoEmpleadoP"=>$idPuestoEmpleadoR
                                ));
    echo "<script>alert('¡Empleado registrado con exito!');</script>";
    echo "<script> window.location.href = '../vista/admin/adminRegistrarEmpleado.php'; </script>";
                            }
    $resultadoRegistro->closeCursor();  
                        }
                    
?>