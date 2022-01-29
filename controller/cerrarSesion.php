<?php
    require "conexion.php";
    session_start();
    unset($_SESSION['SessionAdministracion']);
    unset($_SESSION['SessionSupervisor']);
    unset($_SESSION['SessionEmpleado']);    
    $_SESSION= array();
    session_destroy();
    echo "<script>alert('Hasta luego!');</script>";
    echo "<script> window.location.href = '../vista/login.php'; </script>";
    exit();
?>