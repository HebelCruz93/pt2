<?php 
session_start();
if(isset($_SESSION['nombreUsuario'])){
    if($_SESSION['nombreUsuario']['idTipoUsuario']!=3 && $_SESSION['nombreUsuario']['idTipoUsuario']!=1 && $_SESSION['nombreUsuario']['idTipoUsuario']==2 ){
        header('Location: ../../vista/supervisor/');
        

    }else if($_SESSION['nombreUsuario']['idTipoUsuario']!=2 && $_SESSION['nombreUsuario']['idTipoUsuario']!=3 && $_SESSION['nombreUsuario']['idTipoUsuario']==1){

        header('Location: ../../vista/admin/');
    }else{

    }
}else{
      header('Location: ../../vista/login.php');
      die();

}

?>
