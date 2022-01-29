<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Catalogos</h3>
    <div>
        <a class="botonGenerarPDF" href="reportes/reporteClientes.php">
            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table>
            <thead>
                <tr>
                    <th scope="col"> Id Catalogo </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Descripción </th>



                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT * FROM catalogo";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idCatalogo'] ?> </th>
                    <th> <?php echo $row['nombreCatalogo'] ?> </th>
                    <th> <?php echo $row['descripcion'] ?> </th>

                    <th class="sinBorde"><a href="añadirPiezasCatalogo.php?id=<?php echo $row['idCatalogo'];?>"
                            class="botonEstilo"> Añadir</a></th>
                    <th class="sinBorde"><a href="visualizarProductosCatalogo.php?id=<?php echo $row['idCatalogo'];?>"
                            class="botonEstilo"> Ver</a></th>
                    <th class="sinBorde"><a href="modificarCatalogo.php?id=<?php echo $row['idCatalogo'];?>"
                            class="botonEstilo"> Modificar</a></th>

                    <th class="sinBorde"><a href="../../controller/eliminarCatalogo.php?id=<?php echo $row['idCatalogo'];?>"
                            class="botonEstilo"> Eliminar</a></th>
                    <th class="sinBorde"><a href="reportes/reporteImagenes.php?id=<?php echo $row['idCatalogo'];?>"
                            class="botonEstilo"> Generar PDF</a></th>
                </tr>
                <?php

                        }
                        $resultado->closeCursor();
                    ?>
            </tbody>

        </table>
    </div>
    </div>
</body>