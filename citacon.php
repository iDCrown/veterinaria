<?php
// Incluimos la conexión que está en el archivo "conexion.php" de la base de datos
include 'conexion.php';
/*La función "obtener_id_servicio", como lo indica su nombre, sirve para hallar el id del servicio o los servicios que hay en cada cita que el cliente realiza.
Se indica un parametro "$nom_servicio" el cual es el nombre del servicio cuyo id se requiere conseguir. También se incluye "global $con" para hacer conexión con la variable $con la cual esta afuera de la función para que no haya problemas de conectividad.  */
function obtener_id_servicio($nom_servicio){
    //Incluyendo la variable $con
    global $con;
    //Definiendo     la consulta. el idServicio tiene que coincidir con el nombre_Servicio.
    $query = "SELECT idServicio FROM servicios WHERE Nombre_Servicio = ?";
    //Preparando la consulta para su ejecución
    $stmt = $con->prepare($query);
    //vinculamos el parametro "$nom_servicio" aclarando que "s" es una cadena de texto. 
    $stmt->bind_param("s", $nom_servicio);
    //Ejecutamos finalmente la consulta con el parametro vinculado.
    $stmt->execute();
    //Obteniendo el resultado de la ejecución de la consulta. Mediante "get_result" devuelve un objeto "mysqli_result"
    $result = $stmt->get_result();

    //Verificando los resultados si la consulta devuelve alguna fila cuando "num_rows" es mayor a 0
    if($result->num_rows > 0){
        //De haber alguna fila se obtiene como un array asociativo usando "fetch_assoc"
        $row = $result->fetch_assoc();
        //Retorna el valor del campo "idServicio"
        return $row["idServicio"];
    }
    // Agregar un retorno nulo en caso de que no se encuentre el servicio
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

/* Usando el método POST se recuperan los datos que se registran en el formulario en el archivo "cita.php" para posteriormente utilizarlos para la inserción de datos y obtención de datos pertinentes */
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
