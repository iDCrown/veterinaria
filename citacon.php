<?php
// Incluimos la conexión que está en el archivo "conexion.php" de la base de datos
include 'conexion.php';

/* Usando el método POST se recuperan los datos que se registran en el formulario en el archivo "cita.php" para posteriormente utilizarlos para la inserción de datos y obtención de datos pertinentes */

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
    return null; // Agregar un retorno nulo en caso de que no se encuentre el servicio
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
    } else {
        // Obtener el idMascota
        $query_id_mascota = "SELECT idMascota FROM mascota WHERE nombreA = ? AND cedula = ?";
        $stmt = $con->prepare($query_id_mascota);
        $stmt->bind_param("si", $nombreA, $cedula);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
        $id_mascota = $row["idMascota"];


        // Hacer la inserción de los datos registrados en el formulario en la tabla "historialclinico"
        $query_cita = "INSERT INTO historialclinico (Fecha_Visita, cedula, nombreA, idMascota) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($query_cita);
        $stmt->bind_param("sisi", $fecha, $cedula, $nombreA, $id_mascota);
        $stmt->execute();
        $id_historial = $stmt->insert_id;

        // Array de servicios
        if(isset($_POST['servicios'])){
            $servicios_seleccionados = $_POST['servicios'];
            foreach($servicios_seleccionados as $servicio){
                $nom_servicio = obtener_servicio($servicio);
                $id_servicio = obtener_id_servicio($nom_servicio);

                $query_detalle = "INSERT INTO detallehistorialclinico (idHistorialClinico, idServicio) VALUES (?, ?)";
                $stmt_detalle = $con->prepare($query_detalle);
                $stmt_detalle->bind_param("ii", $id_historial, $id_servicio);
                $stmt_detalle->execute();
            }
        }
        if($id_servicio === null) {
            echo "Error: No se encontró el servicio $nom_servicio en la base de datos.";
            exit();
        }

        if(!$stmt->error){
            header('Location: index.php?mensaje='.urlencode("Cita programada correctamente"));
            exit();
        } else {
            die('Error: ' . $stmt->error);
        }
    }
}
?>
