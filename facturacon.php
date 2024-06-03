<?php
include 'conexion.php';
$result = null;

if (isset($_GET['cedula'])) {
  $idCedula = $_GET['cedula'];
  $query_historial_Factura = "SELECT Factura_Nº, Fecha_Emision, nombreA, estado FROM facturas WHERE cedula = ?";

  $stmt = $con->prepare($query_historial_Factura);
  $stmt->bind_param('i', $idCedula); 
  $stmt->execute();
  $result = $stmt->get_result();

}



if (isset($_POST['numero_factura'])) {
  $numeroFactura = $_POST['numero_factura'];

  $query_factura = "SELECT 
  f.Factura_Nº,
  f.Fecha_Emision, 
  m.nombreA AS nombreMascota, 
  m.raza, 
  m.color, 
  m.especie, 
  s.Nombre_Servicio, 
  s.Precio_Unitario 
  FROM facturas f 
  JOIN historialclinico hc ON f.cedula = hc.cedula 
  JOIN mascota m ON hc.idMascota = m.idMascota 
  JOIN cliente c ON m.cedula = c.cedula 
  JOIN detallehistorialclinico dhc ON hc.idHistorialClinico = dhc.idHistorialClinico 
  JOIN servicios s ON dhc.idServicio = s.idServicio
  WHERE f.Factura_Nº = ?";

  $stmt = $con->prepare($query_factura);
  $stmt->bind_param('i', $numeroFactura);
  $stmt->execute();
  $result = $stmt->get_result();

  $factura = [
    'fecha_Emision' => '',
    'nombreMascota' => '',
    'tipoMascota' => '',
    'raza' => '',
    'especie' => '',
    'servicios' => []
  ];

  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (empty($factura['fecha_Emision'])) {
        $factura['fecha_Emision'] = $row['Fecha_Emision'];
        $factura['nombreMascota'] = $row['nombreMascota'];
        $factura['tipoMascota'] = $row['color'];
        $factura['raza'] = $row['raza'];
        $factura['especie'] = $row['especie'];
      }
      $factura['servicios'][] = [
        'Nombre_Servicio' => $row['Nombre_Servicio'],
        'Precio_Unitario' => $row['Precio_Unitario']
      ];
    }
  }

  echo json_encode($factura);
}
?>




