<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Remisiones</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteRemisiones.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> No. Remision</th>
                    <th scope="col"> No. Factura </th>                                    
                    <th scope="col"> Motivo </th>  
                  
                  
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT * FROM remision";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['noRemision'] ?> </th>
                    <th> <?php echo $row['noFactura'] ?> </th>        
                    <th> <?php echo $row['motivo'] ?> </th>                  
                                       
                    <th class="sinBorde"><a href="reportes/reporteIndividualRemision.php?id=<?php echo $row['noRemision'];?>"
                         class="botonEstilo" > Generar PDF</a></th> 
                    
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

