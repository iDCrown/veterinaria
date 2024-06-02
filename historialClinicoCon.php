<?php
include 'conexion.php';
$result = null;

if (isset($_GET['cedula'])) {
    $idCedula = $_GET['cedula'];

    $query_historialClinico = "SELECT 
        hc.idHistorialClinico AS numero_cita, 
        c.nombre AS nombre_cliente, 
        m.nombreA AS nombre_mascota, 
        GROUP_CONCAT(s.Nombre_Servicio SEPARATOR ', ') AS servicios_tomados, 
        hc.Fecha_Visita 
        FROM historialclinico hc 
        INNER JOIN mascota m ON hc.idMascota = m.idMascota 
        INNER JOIN cliente c ON m.cedula = c.cedula 
        INNER JOIN detallehistorialclinico dh ON hc.idHistorialClinico = dh.idHistorialClinico 
        INNER JOIN Servicios s ON dh.idServicio = s.idServicio 
        WHERE c.cedula = ? 
        GROUP BY hc.idHistorialClinico, c.nombre, m.nombreA, hc.Fecha_Visita 
        ORDER BY hc.Fecha_Visita DESC";

    // Preparar la declaración
    $stmt = $con->prepare($query_historialClinico);
    
    // Vincular los parámetros
    $stmt->bind_param('s', $idCedula); // 's' indica que el parámetro es de tipo string
    
    // Ejecutar la declaración
    $stmt->execute();
    
    // Obtener los resultados
    $result = $stmt->get_result();
    
    // Procesar los resultados (ejemplo)

}
?>
