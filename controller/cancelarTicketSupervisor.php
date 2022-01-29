<?php
    include 'conexion.php'; 
    $id = $_GET['id'];

    // Confirmacion de eliminar producto   

    

    $queryFinalizar = "UPDATE ticket
    SET 
    idEstatus=3  
    WHERE
    idTicket=:idTicketF";

    $resultado=$dbConexion->prepare($queryFinalizar);
    $resultado->execute(array(":idTicketF"=>$id)); 

    $resultado->closeCursor();      
    echo "<script>alert('Ticket cancelado');</script>";   
    echo "<script> window.location.href = '../vista/supervisor/supervisorVisualizarTicket.php'; </script>";
    
?>