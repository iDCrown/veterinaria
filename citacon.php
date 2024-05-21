<?php
//Incluimos la conexión que esta en el archivo "conexion.php de la base de datos"
include 'conexion.php';
/*Usando el método POST se recuperan los datos que se registran en el formulario en el archi "cita.php" para posteriormente utilizarlos para la inserción de datos y obtención de datos pertinentes */

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
}

function obtener_servicio($servicio){
    switch($servicio){
        case "consulta":
            return "Consulta general";
        case "medicamentos":
            return "Administración de medicamentos";
        case "vacunas":
            return "Vacunas";
        case "pruebas_basicas":
            return "Realización de pruebas básicas";
        case "pruebas_especializadas":
            return "Realización de pruebas especializadas";
        case "peluqueria":
            return "Peluquería";
        default:
            return "";
        }
    }

if(isset($_POST['enviar'])){
    $fecha = $_POST['fecha'];
    $cedula = $_POST['cedula'];
    $nombreA = $_POST['nombreA'];

    //Configurar tiempo zona horaria
    date_default_timezone_set('America/Bogota');
    $time = date('h:i:s a', time());

    //Validar si no están vacíos
    if(!isset($fecha) || $fecha == '' || !isset($cedula) || $cedula == '' || !isset($nombreA) || $nombreA == ''){
        $error = "Algunos campos están vacíos";
    }else{
        /*Con esto hacemos la inserción en los datos que se registraron en el formulario que inicialemnte estan como campos vacios en la tabla "historialclinico" para que se almacenen

        En la siguiente parte para la inserción de datos, preparamos la consulta SQL con la consulta preparada para evitar los ataques de inyección SQL. Posrteriormente, se vincula los parametros con "bind_param" con "sis" lo que quiere decir que espera dos STRING y un INTEGER como parametros para $fecha, $cedula, $nombreA.
        
        Finalmente se usa "execute" para ejecutar la consulta
        Obtenemos el id de la cita recien creada con "insert_id" para que con este dato podamos insertar los servicios en la tabla "detallehistorialclinico" en la base de datos*/
        $query_cita = "INSERT INTO historialclinico(Fecha_Visita, cedula, nombreA)VALUES(?, ?, ?)";
        $stmt = $con->prepare($query_cita);
        $stmt->bind_param("sis", $fecha, $cedula, $nombreA);
        $stmt->execute();
        $id_historial = $stmt->insert_id;

        $query_id_mascota = "SELECT idMascota FROM mascota WHERE nombreA = ? AND cedula = ?";
        $stmt = $con->prepare($query_id_mascota);
        $stmt->bind_param("si", $nombreA, $cedula);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
        $id_mascota = $row["idMascota"];

        $servicios = array("consulta", "medicamentos", "vacunas", "puebas_basicas", "pruebas_especializadas", "peluqueria");
        foreach($servicios as $servicio){
            if(isset($POST[$servicio])){
                $nom_servicio = obtener_servicio($servicio);
                $id_servicio = obtener_id_servicio($nom_servicio);

                $query_detalle = "INSERT INTO detallehistorialclinico (idHistorialClinico, idServicio)VALUES(?, ?)";
                $stmt = $con->prepare($query_detalle);
                $stmt->bind_param("ii", $id_historial, $id_servicio);
                $stmt->execute();
            }
        }

        if(!$stmt->execute()){
            die('Error: ' . $stmt->error);
            $error = "Error, no se pudo crear el registro";
        }else{
            header('Location: index.php?mensaje='.urlencode("Cita programada correctamente"));
            exit();
        }
    }
}
?>