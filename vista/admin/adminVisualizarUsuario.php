<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Usuarios</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Usuario </th>
                    <th scope="col"> Usuario </th>
                    <th scope="col"> Contraseña </th>
                    <th scope="col"> Tipo de usuario </th>                    
                   
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idUsuario, nombreUsuario, contraUsuario, 
                        idTipoUsuario FROM usuario";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <tr>
                    <th> <?php echo $row['idUsuario'] ?> </th>
                    <th> <?php echo $row['nombreUsuario'] ?> </th>
                    <th> <?php echo base64_decode( $row['contraUsuario']) ?> </th>
                    <th> <?php echo $row['idTipoUsuario'] ?> </th>                    
                    <th class="sinBorde"><a href="modificacionUsuarios.php?id=<?php echo $row['idUsuario'];?>"
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

</html>