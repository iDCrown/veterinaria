<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>
  <link rel="stylesheet" href="./css/historial.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- nav -->
  <ul class="nav nav-tabs" style=" padding: 1em; background: #fcfff5;">
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="index.php">Inicio</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="Registro.php">Registrar Paciente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php">cita</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="historialClinico.php">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="factura.php">Factura</a>
    </li>
  </ul> 
  <!-- historial clinico -->
  <div class="conteiner">
    <h1 class="title">Factura</h1>
    <div class="content">
      <form class="consultar" action="">
      <p  style="color:black" class="p_crear">Ingrese el ID del cliente</p>
        <input class="input" type="text" name="cedula">
        <button type="submit" class="button" name="consultar">buscar</button>
      </form>
      <!-- Tabla de clientes -->
      <div id="clientes" style="display: block;">
        <table class="table table-hover ">
          <thead class="table table-bordered b3">
            <tr>
              <th class="th_color" scope="col">Factura Nº</th>
              <th class="th_color" scope="col">Fecha de Emisión</th>
              <th class="th_color" scope="col">Estado</th>
              <th class="th_color" scope="col">Nombre del paciente</th>
              <th class="th_color" scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr class="tr-row" style="font-size: smaller">
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row">
                <form method="POST" action="">
                  <input type="hidden" name="cedula" value="">
                  <button type="submit" class="button" name="consultar">Pagar</button>
                </form>
              </td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>  
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>