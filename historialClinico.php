<?php include 'historialClinicoCon.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="./css/historial.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- nav -->
  <ul class="nav nav-tabs" style=" padding: 1em; background: #fcfff5;">
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="index.php" >Inicio</a>
    </li>    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Registrar Paciente
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" style="border: none;color: #aee570;font-weight: 900;font-size: 20px;font-family: serif;font-variant-caps: all-petite-caps;" href="Registro.php">Nueva Mascota</a>
        </li>
        <li>
          <a class="dropdown-item" style="border: none;color: #aee570;font-weight: 900;font-size: 20px;font-family: serif;font-variant-caps: all-petite-caps;" href="RegistroMascota.php">Agregar otra Mascota</a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php">cita</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="#">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="factura.php">Factura</a>
    </li>
  </ul> 
  <!-- historial clinico -->
  <div class="conteiner">
    <h1 class="title">Historial Clinico</h1>
    <div class="content">
      <form class="consultar" action="" method="GET">
      <p  style="color:black" class="p_crear">Ingrese el ID del cliente</p>
        <input class="input" type="text" name="cedula">
        <button type="submit" class="button" name="consultar">buscar</button>
      </form>
      <!-- Tabla de clientes -->
      <div id="clientes" style="display: block;">
        <table class="table table-hover ">
          <thead class="table table-bordered b3">
            <tr>
              <th class="th_color" scope="col">numero_cita</th>
              <th class="th_color" scope="col">nombre_cliente</th>
              <th class="th_color" scope="col">nombre_mascota</th>
              <th class="th_color" scope="col">servicios_tomados</th>
              <th class="th_color" scope="col">Fecha_Visita</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($result): ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr class="tr-row" style="font-size: smaller">
              <td scope="row"><?php echo $row['numero_cita']; ?></td>
              <td scope="row"><?php echo $row['nombre_cliente']; ?></td>
              <td scope="row"><?php echo $row['nombre_mascota']; ?></td>
              <td scope="row"><?php echo $row['servicios_tomados']; ?></td>
              <td scope="row"><?php echo $row['Fecha_Visita']; ?></td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No se encontraron registros.</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>