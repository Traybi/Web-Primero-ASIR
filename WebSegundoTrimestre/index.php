<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Administrador</title>
        <link rel="stylesheet" href="indexcss.css">
    </head>
    <body>
        <?php
        include("IndexConexion.php");

        //Selecciona la base de datos
        mysqli_select_db($conexion, "tiendaderopa") or die("Error de selección de base de datos: " . mysqli_error($conexion));
    
        //Crear datos para insertar en la tabla 
        $nombre = "Administrador";
        $fecha_acceso = date("d-m-Y H:i:s");
        $accion = "Acceso al portal del administrador";
        $ip = $_SERVER['REMOTE_ADDR']; // Obtener la IP del usuario
        $navegador = $_SERVER['HTTP_USER_AGENT']; // Obtener el navegador del usuario

        //Para evitar la inyección de SQL
        //Prepara la estructura de la sentencia, que no cambia, solo cambian los datos
        $sentencia = mysqli_prepare($conexion, "INSERT INTO logs_admin (nombre,fecha_acceso,accion,ip,navegador) VALUES (?,?,?,?,?)");
    
        if ($sentencia) {
        //Se asignan los datos - CORRECCIÓN: usar $sentencia en lugar de $conexion
        mysqli_stmt_bind_param($sentencia, "sssss", $nombre, $fecha_acceso, $accion, $ip, $navegador);
        //Se ejecuta la sentencia.
        mysqli_stmt_execute($sentencia);
        //Cerrar la sentencia preparada
        mysqli_stmt_close($sentencia);
            } else {
                die("Error al preparar la sentencia: " . mysqli_error($conexion));
            }
        ?>

        <h1>Portal del Administrador</h1>
        <br>
        <br>
        <div class="volverinicio">
            <button onclick="window.location.href='inicioweb.html'">Volver a la página principal</button>
        </div>
        <br>
        <br>
        <?php
            // Conexión a la base de datos
            include("IndexConexion.php");

            //Selección de la base de datos
            mysqli_select_db($conexion, "tiendaderopa");

            //Preparar sentencia MySQL
            $consultar = "SELECT * FROM pedidos";

            //Ejecutar sentencia y se almacena en la variables '$registros'
            $registros = mysqli_query($conexion, $consultar) or die("Error al insertar el registro" . mysqli_error($conexion));
        ?>
        <h2>Eliminar Producto</h2>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Pago</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($unRegistro = mysqli_fetch_row($registros)){
                ?>
                <tr>
                    <td><?php echo $unRegistro[0];?></td>
                    <td><?php echo $unRegistro[1];?></td>
                    <td><?php echo $unRegistro[2];?></td>
                    <td><?php echo $unRegistro[3];?></td>
                    <td><?php echo $unRegistro[4];?></td>
                    <td><?php echo $unRegistro[5];?></td>
                    <td><?php echo $unRegistro[6];?></td>
                    <td><?php echo $unRegistro[7];?></td>
                    <td><?php echo $unRegistro[8];?></td>
                    <td> <a href="baja.php?id=<?php echo $unRegistro[0];?>"><img src="images/papelera.png" height="30px" width="30px"/></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <?php
            // Conexión a la base de datos
            include("IndexConexion.php");

            //Selección de la base de datos
            mysqli_select_db($conexion, "tiendaderopa");

            //Preparar sentencia MySQL
            $consultar = "SELECT * FROM pedidos";

            //Ejecutar sentencia y se almacena en la variables '$registros'
            $registros = mysqli_query($conexion, $consultar) or die("Error al insertar el registro" . mysqli_error($conexion));
        ?>
        <br>
        <br>
        <br>
        <br>
        <h2>Enviar Producto</h2>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Pago</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    //Recorrer los registros de '$registros', uno a uno, hasta
                    //que no haya más y se van almacenando en el array '$unRegistro'
                    while($unRegistro = mysqli_fetch_row($registros)){
                ?>
                <tr>
                    <td><?php echo $unRegistro[0];?></td>
                    <td><?php echo $unRegistro[1];?></td>
                    <td><?php echo $unRegistro[2];?></td>
                    <td><?php echo $unRegistro[3];?></td>
                    <td><?php echo $unRegistro[4];?></td>
                    <td><?php echo $unRegistro[5];?></td>
                    <td><?php echo $unRegistro[6];?></td>
                    <td><?php echo $unRegistro[7];?></td>
                    <td><?php echo $unRegistro[8];?></td>
                    <td> <a href="modifica.php?id=<?php echo $unRegistro[0];?>"><img src="images/camion.png" height="30px" width="30px"/></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>


        <?php
            // Conexión a la base de datos
            include("IndexConexion.php");

            //Selección de la base de datos
            mysqli_select_db($conexion, "tiendaderopa");

            //Preparar sentencia MySQL
            $consultar = "SELECT * FROM ayudacliente";

            //Ejecutar sentencia y se almacena en la variables '$registros'
            $registros = mysqli_query($conexion, $consultar) or die("Error al insertar el registro" . mysqli_error($conexion));
        ?>
        <br>
        <br>
        <br>
        <br>
        <h2>Ayuda Cliente</h2>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Género</th>
                    <th>Comentarios</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    //Recorrer los registros de '$registros', uno a uno, hasta
                    //que no haya más y se van almacenando en el array '$unRegistro'
                    while($unRegistro = mysqli_fetch_row($registros)){
                ?>
                <tr>
                    <td><?php echo $unRegistro[0];?></td>
                    <td><?php echo $unRegistro[1];?></td>
                    <td><?php echo $unRegistro[2];?></td>
                    <td><?php echo $unRegistro[3];?></td>
                    <td><?php echo $unRegistro[4];?></td>
                    <td><?php echo $unRegistro[5];?></td>
                    <td><?php echo $unRegistro[6];?></td>
                    <td><?php echo $unRegistro[7];?></td>
                    <td><?php echo $unRegistro[8];?></td>
                    <td> <a href="modificacliente.php?id=<?php echo $unRegistro[0];?>"><img src="images/tickresuelto.webp" height="20px" width="30px"/></a></td>
                    <td> <a href="eliminarconsulta.php?id=<?php echo $unRegistro[0];?>"><img src="images/papelera.png" height="30px" width="30px"/></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <br>
        <br>
        <?php
            // Conexión a la base de datos
            include("IndexConexion.php");

            //Selección de la base de datos
            mysqli_select_db($conexion, "tiendaderopa");

            //Preparar sentencia MySQL
            $consultar = "SELECT * FROM logs_admin";

            //Ejecutar sentencia y se almacena en la variables '$registros'
            $registros = mysqli_query($conexion, $consultar) or die("Error al insertar el registro" . mysqli_error($conexion));
        ?>
        <h2>Logs Admin</h2>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Acceso</th>
                    <th>Accion</th>
                    <th>IP</th>
                    <th>Navegador</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($unRegistro = mysqli_fetch_row($registros)){
                ?>
                <tr>
                    <td><?php echo $unRegistro[0];?></td>
                    <td><?php echo $unRegistro[1];?></td>
                    <td><?php echo $unRegistro[2];?></td>
                    <td><?php echo $unRegistro[3];?></td>
                    <td><?php echo $unRegistro[4];?></td>
                    <td><?php echo $unRegistro[5];?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        
        <script>
            let con = prompt("Introduce la contraseña para acceder al portal del Administrador: ");
            let correcta = "administrador"
            while (con != correcta){
            alert("Error! Contraseña incorrecta. Recuerde que si no es administrador no puede acceder a esta zona, todo lo que haga quedará registrado y sabremos quien ha hecho todo")
            con = prompt("Introduce la contraseña para acceder a la web: ");
            }
            alert ("Bienvenido Administrador. Que tenga muy buen día")
        </script>
        <script>
            window.onscroll = function() {
            var btn = document.getElementById("btn-top");
            if (window.pageYOffset > 100) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        };
        </script>
    <button id="btn-top" onclick="window.scrollTo(0, 0)">⬆</button>
    </body>
</html>