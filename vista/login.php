<?php
session_start();

if(isset($_SESSION['nombreUsuario'])){
        if($_SESSION['nombreUsuario']['idTipoUsuario']==1){
            
         header('Location: ../vista/admin/');
           
        //  echo "<script> window.location.href = '../vista/admin/index.php'; </script>";
        }else if($_SESSION['nombreUsuario']['idTipoUsuario']==2){
             header('Location: /vista/supervisor');
             //echo "<script> window.location.href = '../vista/admin/adminVisualizarEmpleado.php'; </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYREI</title>
    <link rel="stylesheet" type="text/css" href="../css/estilosLogin.css">
</head>

<body>

<?php include("../Componentes/menuPrincipal.php") ?>

    <div class="contenedorServicios">


        <div class="formLogin">
            <h3 id="titulos">PYREI Empleados</h3>
            <form action="../controller/validarLogin.php" method="POST">
                <ul class="flex-externo">
                    <li>
                        <label for="usuario">Usuario</label>
                        <input type="text" name="nombreUsuario" id="usuario" placeholder="Ingresa tu usuario">
                    </li>
                    <li>
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="contraUsuario" id="contraseña" placeholder="Ingresa tu contraseña">
                    </li>
                    <li>
                        <button value="Entrar" type=" submit">Entrar</button>
                    </li>
                    <a href="#">¿Olvidaste tu contraseña?</a>.

                </ul>
            </form>

        </div>
    </div>
    <hr>
    <?php include("../Componentes/footer.php") ?>
</body>

</html>