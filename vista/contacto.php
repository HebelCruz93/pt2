<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYREI</title>
    <link rel="stylesheet" type="text/css" href="../css/estilosContacto.css">
</head>

<body>

<?php include("../Componentes/menuPrincipal.php") ?>
    <h3 id="titulos">Envianos tu solicitud</h3>


    <div class="contenedorServicios">


        <div class="formContacto">
            <form>
                <ul class="flex-externo">
                    <li>
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" placeholder="Ingresa tu nombre">
                    </li>
                    <li>
                        <label for="empresa">Empresa</label>
                        <input type="text" id="empresa" placeholder="Ingresa tu empresa">
                    </li>
                    <li>
                        <label for="correo">Correo</label>
                        <input type="email" id="correo" placeholder="Ingresa tu correo">
                    </li>
                    <li>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" placeholder="Ingresa tu teléfono">
                    </li>
                    <li>
                        <label for="material">Material</label>
                        <select name="select">
                            <option value="valor1">Acero</option>
                            <option value="valor2" selected>Aluminio</option>
                            <option value="valor3">Cobre</option>
                        </select>
                    </li>
                    <li>
                        <label for="message">Descripción</label>
                        <textarea rows="6" id="message" placeholder="Ingresa una descripción"></textarea>
                    </li>

                    <li>
                        <button type="submit">Enviar solicitud</button>
                    </li>
                </ul>
            </form>

        </div>
        <div class="alineacionMapa">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.0542001474246!2d-100.1619187836592!3d25.6363265944394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662c3d2fde7c7e5%3A0xd7934414ec48c288!2sHacienda%20de%20San%20Juan%20317%2C%20Villas%20de%20la%20Hacienda%2C%2067288%20Ju%C3%A1rez%2C%20N.L.!5e0!3m2!1ses!2smx!4v1635113851941!5m2!1ses!2smx"
                width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <hr>
    <?php include("../Componentes/footer.php") ?>

</body>

</html>