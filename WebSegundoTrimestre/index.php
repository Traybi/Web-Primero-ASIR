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
        <h2>Modificar Producto</h2>
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
                    <td> <a href="modifica.php?id=<?php echo $unRegistro[0];?>"><img src="images/lapiz.webp" height="30px" width="30px"/></a></td>
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
            if (window.pageYOffset > 300) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        };
        </script>
        <button onclick="window.location.href='inicioweb.html'">Volver a la página principal</button>
    </body>
</html>