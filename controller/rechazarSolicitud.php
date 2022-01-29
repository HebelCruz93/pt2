<?php
    include 'conexion.php'; 
    $id = $_GET['id'];

    // Confirmacion de eliminar producto   

    

    $queryFinalizar = "UPDATE solicitud
    SET 
    idEstatus=2   
    WHERE
    idSolicitud=:idSolicitudF";

    $resultado=$dbConexion->prepare($queryFinalizar);
    $resultado->execute(array(":idSolicitudF"=>$id)); 

    $resultado->closeCursor();      
    echo "<script>alert('Solicitud rechazada');</script>";   
    echo "<script> window.location.href = '../vista/admin/visualizarSolicitud.php'; </script>";
    
?>