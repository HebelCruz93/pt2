<?php
    include 'conexion.php'; 
    $id = $_GET['id'];

    // Confirmacion de eliminar producto   

    $queryEliminar = "DELETE FROM ticket WHERE idTicket =:idTicketD";

    $resultado=$dbConexion->prepare($queryEliminar);
    $resultado->execute(array(":idTicketD"=>$id)); 

    $resultado->closeCursor();      
    echo "<script>alert('Ticket eliminado');</script>";   
    echo "<script> window.location.href = '../vista/supervisor/supervisorVisualizarTicket.php'; </script>";
    
?>