<?php include 'conexion.php'; ?>
<?php
    //Crear y seleccionar query de clientes
    // $query = "SELECT * FROM clientes ORDER BY cedula DESC";
    // $clientes = mysqli_query($con, $query);

    // if(isset($_POST['borrar'])){        

    //   $idRegistro = $_POST['cedula'];
      //Validar si no están vacíos
    //   $query = "DELETE FROM clientes where cedula='$idRegistro'";

    //     if(!mysqli_query($con, $query)){
        
    //       die('Error: ' . mysqli_error($con));
    //       $error = "Error, no se pudo crear el registros";
    //     }else{
    //       $mensaje = "Registro borrado correctamente";
    //       header('Location: index.php?mensaje='.urlencode($mensaje));
    //       exit();
    //     }
    // }

    // Casos 
    // $query = "SELECT * FROM casos ORDER BY expediente DESC";
    // $casos = mysqli_query($con, $query);

    // if(isset($_POST['borrarCaso'])){        

    //   $idRCasos = $_POST['expediente'];
    //   //Validar si no están vacíos
    //   $query = "DELETE FROM casos where expediente='$idRCasos'";

    //     if(!mysqli_query($con, $query)){
        
    //       die('Error: ' . mysqli_error($con));
    //       $error = "Error, no se pudo crear el registros";
    //     }else{
    //       $mensaje = "Registro borrado correctamente";
    //       header('Location: index.php?mensaje='.urlencode($mensaje));
    //       exit();
    //     }
    // }

    // ABOGADOS
    // if(isset($_POST['enviarAbogado'])){
    //   $idAbogado = mysqli_real_escape_string($con, $_POST['idAbogado']);
    //   $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    //   $email = mysqli_real_escape_string($con, $_POST['email']);
    //   $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    //   $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
    //   $direccion = mysqli_real_escape_string($con, $_POST['direccion']);


      //Configurar tiempo zona horaria
      // date_default_timezone_set('America/Bogota');
      // $time = date('h:i:s a', time());

      //Validar si no están vacíos
  //     if(!isset($idAbogado) || $idAbogado == '' || !isset($nombre) || $nombre == '' || !isset($telefono) || $telefono == '' || !isset($email) || $email == '' || !isset($direccion) || $direccion == ''){
  //         $error = "Algunos campos están vacíos";
  //     }else{
  //         $query = "INSERT INTO abogados(idAbogado, nombre, email, telefono, direccion)VALUES('$idAbogado', '$nombre', '$email', '$telefono', '$direccion')";

  //         if(!mysqli_query($con, $query)){
  //             die('Error: ' . mysqli_error($con));
  //             $error = "Error, no se pudo crear el registro";
  //         }else{
  //             $mensaje = "Registro creado correctamente";
  //             header('Location: index.php?mensaje='.urlencode($mensaje));
  //             exit();
  //         }
  //     }

  // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VETERINARIA</title>
    <link rel="stylesheet" href="./index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <ul class="nav nav-tabs" style=" padding: 1em; background: #fcfff5;">
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="index.php" onclick="mostrarTabla('clientes')">Inicio</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="Registro.php" onclick="mostrarTabla('clientes')">Registrar Paciente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="historialClinico.php">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="#" onclick="mostrarTabla('casos')">Factura</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php" onclick="mostrarTabla('casos')">cita</a>
    </li>
  </ul>
  <div class="container">
    <div class="content">
      <!-- Tabla de clientes -->
      <div id="clientes" style="display: block;">
        <!-- Boton Crear Cliente -->
        <div class="boton">
          <a href="Registro.php" class=""> 
            <button type="button" class=" btn btn-outline-warning">Registrar Paciente</button>
          </a>
        </div>

    </div>  
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- <script>
  function mostrarTabla(tabla) {
    if (tabla === 'clientes') {
      document.getElementById('clientes').style.display = 'block';
      document.getElementById('casos').style.display = 'none';
      document.getElementById('abogado').style.display = 'none';
    } else if (tabla === 'casos') {
      document.getElementById('clientes').style.display = 'none';
      document.getElementById('casos').style.display = 'block';
      document.getElementById('abogado').style.display = 'none';
    } else if (tabla === 'abogado') {
      document.getElementById('clientes').style.display = 'none';
      document.getElementById('casos').style.display = 'none';
      document.getElementById('abogado').style.display = 'block';
    }
  }
</script> -->

</body>
</html>