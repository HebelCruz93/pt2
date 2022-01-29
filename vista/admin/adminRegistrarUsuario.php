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
                <h3 id="titulos">Registro de usuarios</h3>
                <form action="../../controller/registrarUsuario.php" method="POST">
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="idTipoUsuario">Tipo de usuario</label>
                                <select name="idTipoUsuario">
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Empleado</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="usuario">Usuario</label>
                                <input class="separacionInput" type="text" name="nombreUsuario" id="usuario"
                                    placeholder="Ingresa el nombre del usuario" required>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo">
                        <ul>
                            <li>
                                <label for="contraseña">Contraseña</label>
                                <input type="password" name="contraUsuario" id="contraseña"
                                    placeholder="Ingresa tu contraseña" required>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-externo aumento">
                        <ul>
                            <li>
                                <button type="submit">Registrar usuario</button>
                            </li>
                        </ul>
                        <div>


                </form>

            </div>
        </div>

    </body>

</html>