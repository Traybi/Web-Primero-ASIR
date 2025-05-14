<?php
// Activar visualización de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Información de conexión
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

// Crear una conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Registrar los datos recibidos
echo "<h3>Datos recibidos:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Verificar si el formulario ha sido enviado
if (isset($_POST['registro'])) {
    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $pago = $_POST['pago'];
    $estado = "procesando";
    
    // Verificar que todos los campos necesarios existan
    if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono) || 
        empty($producto) || empty($cantidad) || empty($pago)) {
        echo "<p style='color:red'>Error: Todos los campos son obligatorios.</p>";
    } else {
        // Consulta SQL para insertar datos
        $sql = "INSERT INTO pedidos (nombre, apellido, email, telefono, producto, cantidad, pago, estado) 
                VALUES ('$nombre', '$apellido', '$email', '$telefono', '$producto', '$cantidad', '$pago', '$estado')";
        
        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            $ultimo_id = $conn->insert_id;
            echo "<p style='color:green'>Registro insertado correctamente. ID del nuevo registro: " . $ultimo_id . "</p>";
            
            // Verificar datos insertados
            echo "<h3>Verificación de datos insertados:</h3>";
            $sql_check = "SELECT * FROM pedidos WHERE id = $ultimo_id";
            $resultado = $conn->query($sql_check);
            
            if ($resultado->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Teléfono</th><th>Producto</th><th>Cantidad</th><th>Pago</th><th>Estado</th></tr>";
                
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["id"] . "</td>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["apellido"] . "</td>";
                    echo "<td>" . $fila["email"] . "</td>";
                    echo "<td>" . $fila["telefono"] . "</td>";
                    echo "<td>" . $fila["producto"] . "</td>";
                    echo "<td>" . $fila["cantidad"] . "</td>";
                    echo "<td>" . $fila["pago"] . "</td>";
                    echo "<td>" . $fila["estado"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red'>Error: No se pudo verificar el registro insertado.</p>";
            }
        } else {
            echo "<p style='color:red'>Error al insertar registro: " . $conn->error . "</p>";
        }
    }
}

// Cerrar la conexión
$conn->close();
?>