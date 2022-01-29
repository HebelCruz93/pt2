<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Clientes</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteClientes.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Cliente </th>
                    <th scope="col"> Razón social </th>                                    
                    <th scope="col"> Teléfono </th>  
                    <th scope="col"> Correo </th>                      
                   
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT * FROM cliente";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idCliente'] ?> </th>
                    <th> <?php echo $row['razonSocial'] ?> </th>                  
                    <th> <?php echo $row['telefono'] ?> </th>                   
                    <th> <?php echo $row['correo'] ?> </th>                   
                    <th class="sinBorde"><a href="detalleCliente.php?id=<?php echo $row['idCliente'];?>"
                         class="botonEstilo"  > Detalles</a></th>                   
                    <th class="sinBorde"><a href="modificacionCliente.php?id=<?php echo $row['idCliente'];?>"
                         class="botonEstilo"  > Modificar</a></th>                    
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

