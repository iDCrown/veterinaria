<?php
include 'conexion.php';
$result = null;

if (isset($_GET['cedula'])) {
  $idCedula = $_GET['cedula'];

  // $query_factura = 
  // "SELECT c.cedula AS cliente_id, c.nombre AS cliente_nombre, 
  //         m.idMacota AS mascota_id, m.nombreA AS mascota_nombre, 
  //         s.idServicio AS servicio_id, s.Nombre_Servicio AS servicio_nombre, s.precio,
  //         d.detallehistorialclinico AS 
  // FROM mascotas m
  // JOIN clientes c ON m.cliente_id = c.id
  // JOIN servicios_mascota sm ON m.id = sm.mascota_id
  // JOIN servicios s ON sm.servicio_id = s.id
  // WHERE c.cedula = ?";

  // $stmt = $con->prepare($query_factura);
  // $stmt->bind_param('i', $idCedula); 
  // $stmt->execute();
  // $result = $stmt->get_result();

  $query_historial_Factura = "SELECT Factura_Nº, Fecha_Emision, nombreA, estado FROM facturas WHERE cedula = ?";

  $stmt = $con->prepare($query_historial_Factura);
  $stmt->bind_param('i', $idCedula); 
  $stmt->execute();
  $result = $stmt->get_result();

}
?>


