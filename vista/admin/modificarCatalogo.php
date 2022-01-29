<?php  include  '../../controller/sessionAdmin.php';
 include '../../controller/conexion.php';
 $idCatalogo = $_GET['id'];

 $query = "SELECT idCatalogo, nombreCatalogo, descripcion 
FROM catalogo
WHERE idCatalogo = :idCatalogo";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idCatalogo"=>$idCatalogo)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PYREI Administración</title>
        <link rel="stylesheet" type="text/css" href="../css/estilosAdministracion.css">
    </head>

    <body>



        <div class="contenedorServicios">

            <span> <a href="adminRegistrarUsuario.php"> </a> </span>
            <div class="formLogin">
                <h3 id="titulos">Modificar catalogo</h3>
                <form action="../../controller/modificarCatalogos.php" method="POST">
                <input type="hidden" id="idCatalogo" name="idCatalogo"  value="<?php echo $idCatalogo; ?>"> 
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="nombre">Nombre</label>
                                <input class="separacionInput" type="text" name="nombre" id="nombre"
                                   value="<?php echo $row['nombreCatalogo']; ?>">
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="descripcion">Descripción</label>                                
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="descripcion" rows="10" cols="50" ><?php echo $row['descripcion']; ?></textarea>
                        </li>
                    </ul>
                </div>

                    <div class="flex-externo aumento">
                        <ul>
                            <li>
                                <button type="submit">Modificar catalogo</button>
                            </li>
                        </ul>
                        <div>


                </form>

            </div>
        </div>

    </body>

</html>