<?php  include  '../../controller/sessionAdmin.php';
 include '../../controller/conexion.php';

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
                <h3 id="titulos">Creacion de catalogos</h3>
                <form action="../../controller/registrarCatalogo.php" method="POST">
                   
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="nombre">Nombre</label>
                                <input class="separacionInput" type="text" name="nombre" id="nombre"
                                    placeholder="Ingresa el nombre del catalogo" required>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="nombre">Descripción</label>                                
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="descripcion" rows="10" cols="50"></textarea>
                        </li>
                    </ul>
                </div>

                    <div class="flex-externo aumento">
                        <ul>
                            <li>
                                <button type="submit">Crear catalogo</button>
                            </li>
                        </ul>
                        <div>


                </form>

            </div>
        </div>

    </body>

</html>