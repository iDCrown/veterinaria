<?php include 'conexion.php'; ?>
<?php
    //Crear y seleccionar query
    $query = "SELECT * FROM clientes ORDER BY cedula DESC";
    $clientes = mysqli_query($con, $query);

    if(isset($_POST['borrar'])){        

      $idRegistro = $_POST['cedula'];
      //Validar si no están vacíos
      $query = "DELETE FROM clientes where cedula='$idRegistro'";

          if(!mysqli_query($con, $query)){
            
              die('Error: ' . mysqli_error($con));
              $error = "Error, no se pudo crear el registros";
          }else{
              $mensaje = "Registro borrado correctamente";
              header('Location: index.php?mensaje='.urlencode($mensaje));
              exit();
          }
  }

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="conteiner">
    <div class="content">
      <div class="boton">
      <a href="crearCliente.php" class=""> 
        <button type="button" class=" btn btn-outline-warning">Crear Cliente</button>
      </a>
      </div>
      <table class="table table-hover ">
        <thead class="table-warning table-bordered border-warning">
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
          </tr>
        </thead>
        <tbody>
        <?php while ( $fila = mysqli_fetch_assoc($clientes)) : ?>
                        <tr class="tr-row" style="font-size: smaller">
                            <td scope="row"><?php echo $fila['cedula']; ?></td>
                            <td scope="row"><?php echo $fila['nombre']; ?></td>
                            <td scope="row"><?php echo $fila['email']; ?></td>
                            <td scope="row"><?php echo $fila['telefono']; ?></td>
                            <td scope="row"><?php echo $fila['direccion']; ?></td>
                            <td scope="row">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="cedula" value="<?php echo $fila['cedula']; ?>">
                                <button type="submit" class="btn btn-warning w-100" name="borrar">Borrar</button>
                            </form>
                        </tr> 

                        <?php endwhile; ?>
          <tr class="tr-row" style="font-size: smaller">
            <th scope="row">1016944232</th>
            <td class="tdd">Sara Daniela Vargas Martinez</td>
            <td class="tdd">sadaran.vm@gmail.com</td>
            <td class="tdd">3193165506</td>
            <td class="tdd">calle 65b #88-59</td>
          </tr>
          <tr class="tr-row" style="font-size: smaller">
            <th scope="row">1016944232</th>
            <td class="tdd">Sara Daniela Vargas Martinez</td>
            <td class="tdd">sadaran.vm@gmail.com</td>
            <td class="tdd">3193165506</td>
            <td class="tdd">calle 65b #88-59</td>
          </tr>
          <tr class="tr-row" >
            <th scope="row">1016944232</th>
            <td class="tdd">Sara Daniela Vargas Martinez</td>
            <td class="tdd">sadaran.vm@gmail.com</td>
            <td class="tdd">3193165506</td>
            <td class="tdd">calle 65b #88-59</td>
          </tr>
        </tbody>
      </table>
    </div>  
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>