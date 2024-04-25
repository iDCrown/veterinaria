<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">
    <title>Reserva de cita</title>
</head>
<body>
    <h1>Reserva de cita</h1>
    <?php
    include 'conexion.php';
    
        // Obtener datos del formulario
        $nombre = $_POST["nombre_cliente"];
        $telefono = $_POST["telefono_cliente"];
        $email = $_POST["email_cliente"];
        $nomMasco = $_POST["nombre_mascota"];
        $Fechaini = $_POST["edad_mascota"];
        $raza= $_POST["raza_mascota"];
        $fecha_emision= $_POST["fecha_cita"];

        // Insertar datos en la base de datos
        $sql_insert_cliente = "INSERT INTO cliente (nombre, telefono, email) VALUES ('$nombre', '$telefono', '$email')";
        if ($conn->query($sql_insert_cliente) === TRUE) {
            $cedula = $conn->insert_id;

            $sql_insert_mascota = "INSERT INTO mascota (nombre, edad, raza, cedula) VALUES ('$nomMasco', '$Fechaini', '$raza', '$cedula')";
            if ($conn->query($sql_insert_mascota) === TRUE) {
                $idMascota = $conn->insert_id;

                $sql_insert_cita = "INSERT INTO cita (fecha, cedula, idMascota) VALUES ('$fecha_emision', '$idCliente', '$idMascota')";
                if ($conn->query($sql_insert_cita) === TRUE) {
                    echo "<p>¡Cita reservada exitosamente!</p>";
                } else {
                    echo "Error al reservar la cita: " . $conn->error;
                }
            } else {
                echo "Error al agregar la mascota: " . $conn->error;
            }
        } else {
            echo "Error al agregar el cliente: " . $conn->error;
        }

        
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre_cliente">Nombre del cliente:</label><br>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>
        
        <label for="telefono_cliente">Teléfono del cliente:</label><br>
        <input type="text" id="telefono_cliente" name="telefono_cliente" required><br><br>
        
        <label for="email_cliente">Correo electrónico del cliente:</label><br>
        <input type="email" id="email_cliente" name="email_cliente" required><br><br>
        
        <label for="nombre_mascota">Nombre de la mascota:</label><br>
        <input type="text" id="nombre_mascota" name="nombre_mascota" required><br><br>
        
        <label for="edad_mascota">Edad de la mascota:</label><br>
        <input type="number" id="edad_mascota" name="edad_mascota" required><br><br>
        
        <label for="raza_mascota">Raza de la mascota:</label><br>
        <input type="text" id="raza_mascota" name="raza_mascota" required><br><br>
        
        <label for="fecha_cita">Fecha de la cita:</label><br>
        <input type="date" id="fecha_cita" name="fecha_cita" required><br><br>
        
        <input type="submit" value="Reservar cita">
    </form>
</body>
</html>