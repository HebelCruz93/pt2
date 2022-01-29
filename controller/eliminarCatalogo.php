<?php
    include 'conexion.php'; 
    $id = $_GET['id'];

    // Confirmacion de eliminar producto   

    $queryEliminar = "DELETE FROM catalogo_producto WHERE idCatalogo =:idCatalogoP";

    $resultado=$dbConexion->prepare($queryEliminar);
    $resultado->execute(array(":idCatalogoP"=>$id)); 

    $queryEliminar = "DELETE FROM catalogo  WHERE idCatalogo =:idCatalogoP";

    $resultado=$dbConexion->prepare($queryEliminar);
    $resultado->execute(array(":idCatalogoP"=>$id)); 

    $resultado->closeCursor();      
    echo "<script>alert('Catalogo eliminado');</script>";   
    echo "<script> window.location.href = '../vista/admin/visualizarCatalogos.php'; </script>";
    
?>