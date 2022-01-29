<?php 
session_start();
if(isset($_SESSION['nombreUsuario'])){
    if($_SESSION['nombreUsuario']['idTipoUsuario']!=2 && $_SESSION['nombreUsuario']['idTipoUsuario']!=1 && $_SESSION['nombreUsuario']['idTipoUsuario']==3 ){
        header('Location: ../../vista/empleado/');
        

    }else if($_SESSION['nombreUsuario']['idTipoUsuario']!=1 && $_SESSION['nombreUsuario']['idTipoUsuario']!=3 && $_SESSION['nombreUsuario']['idTipoUsuario']==2){

        header('Location: ../../vista/supervisor/');
    }else{

    }
}else{
      header('Location: ../../vista/login.php');
      die();

}

?>
