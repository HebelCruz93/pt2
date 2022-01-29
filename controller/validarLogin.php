<?php
session_start();
include 'conexion.php';

$usuarioL = $_POST['nombreUsuario'];
$contraL = $_POST['contraUsuario'];

if (empty(trim($usuarioL))) {
    echo "<script>alert('El campo usuario no puede contener unicamente espacios');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>";
} else if (empty(trim($contraL))) {
    echo "<script>alert('El campo contraseña no puede contener unicamente espacios');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>";
}else if (preg_match("/^([*])$/", $usuarioL)) { // Permite validar si existen *
    echo "<script>alert('No se permiten caracteres *');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>";
}else if (preg_match("/^([*])$/", $contraL)) { // Permite validar si existen *
    echo "<script>alert('No se permiten caracteres *');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>"; 
    
}else{

 //sentencia preparada    
    $queryConsulta ="SELECT idUsuario, nombreUsuario, contraUsuario, idTipoUsuario 
    FROM usuario WHERE nombreUsuario =:nombreUsuarioL  AND contraUsuario =:contraUsuarioL";
    $consulta = $dbConexion->prepare($queryConsulta);
     
// Ejecucion sentencia preparada
$consulta->execute(array(":nombreUsuarioL"=>$usuarioL,":contraUsuarioL"=>$contraL));


if ($registro=$consulta->fetch(PDO::FETCH_ASSOC)) {     
    $_SESSION['nombreUsuario']= $registro;
    //echo "<script>alert('Los datos ingresados son correctos');</script>"; 
    if(isset($_SESSION['nombreUsuario'])){
        if($_SESSION['nombreUsuario']['idTipoUsuario']==1){
            
        echo "<script> window.location.href = '../vista/admin/adminVisualizarEmpleado.php'; </script>";                  
        }else if($_SESSION['nombreUsuario']['idTipoUsuario']==2){
        echo "<script> window.location.href = '../vista/supervisor/supervisorVisualizarEmpleado.php'; </script>";
        }else if($_SESSION['nombreUsuario']['idTipoUsuario']==3){
        echo "<script> window.location.href = '../vista/empleado/empleadoVisualizarTIckets.php'; </script>";
       }
    }
    
   
     } else {
    echo "<script>alert('El nombre de usuario o la contraseña son incorrectos');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>";
    }

$consulta->closeCursor();
    
}

?>
