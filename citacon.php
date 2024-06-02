<?php
// Incluimos la conexión que está en el archivo "conexion.php" de la base de datos
include 'conexion.php';

function obtener_id_servicio($nom_servicio){
    global $con;
    $query = "SELECT idServicio FROM servicios WHERE Nombre_Servicio = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $nom_servicio);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row["idServicio"];
    }
    return null; 
}

function obtener_servicio($servicio){
    switch($servicio){
        case "consulta":
            return "Consulta general";
        case "medicamentos":
            return "Administración de medicamentos";
        case "vacunas":
            return "Vacunas";
        case "basicas":
            return "Realización de pruebas básicas";
        case "especializadas":
            return "Realización de pruebas especializadas";
        case "peluqueria":
            return "Peluquería";
        default:
            return "";
    }
}

// Configurar tiempo zona horaria
date_default_timezone_set('America/Bogota');

if(isset($_POST['enviar'])){
    $fecha = $_POST['fecha'];
    $cedula = $_POST['cedula'];
    $nombreA = $_POST['nombreA'];

    // Validar si no están vacíos
    if(empty($fecha) || empty($cedula) || empty($nombreA)){
        $error = "Algunos campos están vacíos";
        echo $error;
        exit();
    } else {
        // Obtener el idMascota
        $query_id_mascota = "SELECT idMascota FROM mascota WHERE nombreA = ? AND cedula = ?"; 
        $stmt = $con->prepare($query_id_mascota);
        $stmt->bind_param("si", $nombreA, $cedula);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
        if(!$row){
            echo "Error: No se encontró la mascota con el nombre y cédula proporcionados.";
            exit();
        }
        $id_mascota = $row["idMascota"];

        // Inserción en la tabla "historialclinico"
        $query_cita = "INSERT INTO historialclinico (Fecha_Visita, cedula, nombreA, idMascota) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($query_cita);
        $stmt->bind_param("sisi", $fecha, $cedula, $nombreA, $id_mascota);
        $stmt->execute();
        if($stmt->error){
            die('Error: ' . $stmt->error);
        }
        $id_historial = $stmt->insert_id;

        // Inserción en "detallehistorialclinico"
        if(isset($_POST['servicios'])){
            $servicios_seleccionados = $_POST['servicios'];
            foreach($servicios_seleccionados as $servicio){
                $nom_servicio = obtener_servicio($servicio);
                $id_servicio = obtener_id_servicio($nom_servicio);
                if($id_servicio === null) {
                    echo "Error: No se encontró el servicio $nom_servicio en la base de datos.";
                    exit();
                }

                $query_detalle = "INSERT INTO detallehistorialclinico (idHistorialClinico, idServicio) VALUES (?, ?)";
                $stmt_detalle = $con->prepare($query_detalle);
                $stmt_detalle->bind_param("ii", $id_historial, $id_servicio);
                $stmt_detalle->execute();
                if($stmt_detalle->error){
                    die('Error: ' . $stmt_detalle->error);
                }
            }
        }

        // Consulta para obtener la fecha de visita, nombre de la mascota y cédula
        // **Nuevo Bloque de Código**
        $query_obtener_datos = "SELECT hc.Fecha_Visita, m.nombreA AS nombreMascota, c.cedula
                                FROM historialclinico hc 
                                JOIN mascota m ON hc.idMascota = m.idMascota
                                JOIN cliente c ON hc.cedula = c.cedula
                                WHERE hc.idHistorialClinico = ?";
        $stmt = $con->prepare($query_obtener_datos);
        $stmt->bind_param("i", $id_historial);  
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(!$row){
            echo "Error: No se encontró el historial clínico con el ID proporcionado.";
            exit();
        }
        
        $fecha_visita = $row['Fecha_Visita'];
        $nombreA = $row['nombreMascota'];
        $cedula = $row['cedula'];

        // Generar un número de expediente aleatorio
        $expediente = rand(1000, 9999);

        // Inserción en la tabla "facturas"
        // **Nuevo Bloque de Código**
        $query_factura = "INSERT INTO facturas(Factura_Nº, Fecha_Emision, nombreA, estado, cedula) VALUES(?, ?, ?, ?, ?)";
        $stmt_factura = $con->prepare($query_factura);
        $estado = 1; // Estado predeterminado
        $stmt_factura->bind_param("issii", $expediente, $fecha_visita, $nombreA, $estado, $cedula);
        $stmt_factura->execute();
        if($stmt_factura->error){
            die('Error: ' . $stmt_factura->error);
        }

        // Redirección con mensaje de éxito
        header('Location: index.php?mensaje='.urlencode("Cita programada correctamente y factura generada"));
        exit();
    }
}

