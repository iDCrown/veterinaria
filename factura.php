<?php include "facturacon.php" ?>
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
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Registrar Paciente
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" style="border: none;color: #aee570;font-weight: 900;font-size: 20px;font-family: serif;font-variant-caps: all-petite-caps;" href="Registro.php">Nueva Mascota</a></li>
        <li><a class="dropdown-item" style="border: none;color: #aee570;font-weight: 900;font-size: 20px;font-family: serif;font-variant-caps: all-petite-caps;" href="RegistroMascota.php">Agregar otra Mascota</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php">Cita</a>
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
      <form class="consultar" action="" method="GET">
        <p  style="color:black" class="p_crear">Ingrese el ID del cliente</p>
        <input class="input" type="text" name="cedula">
        <button type="submit" class="button" name="consultar">Buscar</button>
      </form>
      <!-- Tabla de clientes -->
      <div id="clientes" style="display: block;">
        <table class="table table-hover">
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
          <?php if ($result): ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr class="tr-row" style="font-size: smaller">
              <td scope="row"><?php echo $row['Factura_Nº']; ?></td>
              <td scope="row"><?php echo $row['Fecha_Emision']; ?></td>
              <td scope="row"><?php echo $row['estado']; ?></td>
              <td scope="row"><?php echo $row['nombreA']; ?></td>
              <td>
                <button type="button" class="btnVer button" data-factura="<?php echo $row['Factura_Nº']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver</button>
                <button type="button" class="btnPagar button" data-factura="<?php echo $row['Factura_Nº']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Pagar</button>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No se encontraron facturas.</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>
  <!-- modal factura -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modalFactura-header">
          <div>
            <h1 class="modalFactura-title" id="exampleModalLabel">Veterinaria</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="tableFactura-header">
          <div class="infoMascota">
            <h2 class="title_mascota" id="nombreMascota"></h2>
            <table class="data-table">
              <tr>
                <th>Color:</th><td id="tipoMascota"></td>
              </tr>
              <tr>
                <th>Raza:</th><td id="raza"></td>
              </tr>
              <tr>
                <th>Especie:</th><td id="especie"></td>
              </tr>
            </table>
          </div>
          <div class="column_Nfactura">
            <table class="data-table">
              <tr>
                <th class="facturaN">Factura Nº:</th><td id="facturaN"></td>
              </tr>
              <tr>
                <th class="facturaN">Fecha de Emisión:</th><td id="fechaEmision"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="tableFactura-header">
          <table class="table">
            <thead>
              <tr>
                <th style="color: #a4e404;" scope="col">Descripción</th>
                <th style="color: #a4e404;" scope="col">Precio Unit</th>
              </tr>
            </thead>
            <tbody class="table-group-divider" id="detalleServicios">
              <!-- Los detalles de los servicios se agregarán aquí -->
            </tbody>
          </table>
        </div>
        <div class="tableFactura-header total_factura">
          <table class="table">
            <tbody class="table-group-divider">
              <tr>
                <td style="width: 28em;">Subtotal</td>
                <td id="subtotal">$0.00</td>
              </tr>
              <tr>
                <td style="width: 28em;">IVA</td>
                <td id="iva">10%</td>
              </tr>
              <tr>
                <td style="width: 28em;">Total</td>
                <td id="total">$0.00</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="button" name="pagar">Pagar</button>                  
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.btnVer, .btnPagar').on('click', function() {
        var numeroFactura = $(this).data('factura');

        $.ajax({
          url: 'facturacon.php',
          type: 'POST',
          data: { numero_factura: numeroFactura },
          success: function(response) {
            var data = JSON.parse(response);

            $('#fechaEmision').text(data.fecha_Emision);
            $('#nombreMascota').text(data.nombreMascota);
            $('#tipoMascota').text(data.tipoMascota);
            $('#raza').text(data.raza);
            $('#especie').text(data.especie);
            $('#facturaN').text(numeroFactura);

            var servicios = '';
            var subtotal = 0;
            data.servicios.forEach(function(servicio) {
              servicios += '<tr><td style="width: 28em;">' + servicio.Nombre_Servicio + '</td><td>' + servicio.Precio_Unitario + '</td></tr>';
              subtotal += parseFloat(servicio.Precio_Unitario);
            });

            $('#detalleServicios').html(servicios);
            $('#subtotal').text('$' + subtotal.toFixed(2));
            $('#total').text('$' + (subtotal * 1.10).toFixed(2)); // Assuming 10% IVA
          }
        });
      });
    });
  </script>
</body>
</html>
