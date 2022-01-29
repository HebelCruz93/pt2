<?php
    include 'conexion.php'; 
    $id = $_GET['id'];

    // Confirmacion de eliminar producto   

    $queryEliminar = "DELETE FROM catalogo_producto WHERE idProducto =:idProductoP";

    $resultado=$dbConexion->prepare($queryEliminar);
    $resultado->execute(array(":idProductoP"=>$id)); 

    $resultado->closeCursor();      
    echo "<script>alert('Producto eliminado');</script>";   
    echo "<script> window.location.href = '../vista/admin/visualizarCatalogos.php'; </script>";
    
?>