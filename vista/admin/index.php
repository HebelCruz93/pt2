<?php 
session_start();

if(isset($_SESSION['nombreUsuario'])){
    if($_SESSION['nombreUsuario']['idTipoUsuario']!=1){
       header("Location: ../../vista/login.php");
    }else{
      
    }
}

?>

<?php include('../../Componentes/menuAdministracion.php'); ?>