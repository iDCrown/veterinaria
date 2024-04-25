<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="./historial.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<ul class="nav nav-tabs" style=" padding: 1em; background: #fff4c1c2;">
    <li class="nav-item">
      <a class="nav-link myitem"  aria-current="page"  href="Registro.php" onclick="mostrarTabla('clientes')">Registrar Paciente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" href="historialClinico.php">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" href="#" onclick="mostrarTabla('casos')">Factura</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"style="border: none; color: #ffc108; font-variant-caps: all-petite-caps; font-weight: 900; letter-spacing: 1px;" href="cita.php" onclick="mostrarTabla('casos')">cita</a>
    </li>
  </ul>
  <div class="conteiner">
    <div class="content">
      <!-- Tabla de clientes -->
      <div id="clientes" style="display: block;">
        <table class="table table-hover ">
          <thead class="table-warning table-bordered border-warning">
            <tr>
              <th scope="col">Cedula</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Direccion</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr class="tr-row" style="font-size: smaller">
              <td scope="row">

              </td>
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row"></td>
              <td scope="row">
              <form method="POST" >
                <input type="hidden" name="cedula" >
                <button type="submit" class="btn btn-warning w-100" name="borrar">Borrar</button>
              </form>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>  
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>