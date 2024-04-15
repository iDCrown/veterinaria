<?php
    // Incluimos conexión
    include 'conexion.php';

    // Obtener el ID del cliente de la URL
    
      //$idRegistro = $_GET['cedula'];

    // Verificar si se ha enviado el formulario de edición
    if(isset($_POST['crear'])){
        //$idRegistro = $_POST['cedula'];
        // Obtener los datos del formulario
        $cedula = mysqli_real_escape_string($con, $_POST['cedula']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
        $direccion = mysqli_real_escape_string($con, $_POST['direccion']);

        $nombreA = mysqli_real_escape_string($con, $_POST['nombreA']);
        $fechaini = mysqli_real_escape_string($con, $_POST['fechaini']);
        $raza = mysqli_real_escape_string($con, $_POST['raza']);
        $tamanio = mysqli_real_escape_string($con, $_POST['tamanio']);
        $color = mysqli_real_escape_string($con, $_POST['color']);
        $especie = mysqli_real_escape_string($con, $_POST['especie']);

        // Validar si no están vacíos
        if(!isset($cedula) || $cedula == '' || !isset($nombre) || $nombre == '' || !isset($telefono) || $telefono == '' || !isset($email) || $email == '' || !isset($direccion) || $direccion == '' || !isset($nombreA) || $nombreA == '' || !isset($fechaini) || $fechaini == '' || !isset($raza) || $raza == '' || !isset($tamanio) || $tamanio == '' || !isset($color) || $color == '' || !isset($especie) || $especie == ''){
          $error = "Algunos campos están vacíos";
      }else{
          $queryCliente = "INSERT INTO cliente(cedula, nombre, email, telefono, direccion)VALUES('$cedula', '$nombre', '$email', '$telefono', '$direccion')";
          $queryAnimal = "INSERT INTO animal(nombreA, raza, fechaini, tamanio, color, especie)VALUES('$nombreA', '$raza', '$fechaini', '$tamanio', '$color', '$especie')";

          if(!mysqli_query($con, $queryCliente) && mysqli_query($con, $queryAnimal)){
              die('Error: ' . mysqli_error($con));
              $error = "Error, no se pudo crear el registro";
          }else{
              $mensaje = "Registro creado correctamente";
              header('Location: index.php?mensaje='.urlencode($mensaje));
              exit();
          }
      }
    }

    // Seleccionar datos del cliente
    /*$query = "SELECT * FROM clientes WHERE cedula='$idRegistro'";
    $result = mysqli_query($con, $query);
    
    // Verificar si se encontró el cliente
    if(mysqli_num_rows($result) > 0){
      
        $fila = mysqli_fetch_assoc($result);
    } else {
        $error = "Cliente no encontrado";
    }
    */



    /*if(isset($_POST['crear'])){
      $nombreA = mysqli_real_escape_string($con, $_POST['nombreA']);
      $fechaini = mysqli_real_escape_string($con, $_POST['fechaini']);
      $raza = mysqli_real_escape_string($con, $_POST['raza']);
      $tamanio = mysqli_real_escape_string($con, $_POST['tamanio']);
      $color = mysqli_real_escape_string($con, $_POST['color']);
      $especie = mysqli_real_escape_string($con, $_POST['especie']);

       //Configurar tiempo zona horaria
      date_default_timezone_set('America/Bogota');
      $time = date('h:i:s a', time());

      //Validar si no están vacíos
      if(!isset($nombreA) || $nombreA == '' || !isset($fechaini) || $fechaini == '' || !isset($raza) || $raza == '' || !isset($tamanio) || $tamanio == '' || !isset($color) || $color == '' || !isset($especie) || $especie == ''){
      $error = "Algunos campos están vacíos";
      }else{
          $query = "INSERT INTO animal(nombreA, raza, fechaini, tamanio, color, especie)VALUES('$nombreA', '$raza', '$fechaini', '$tamanio', '$color', '$especie')";

          if(!mysqli_query($con, $query)){
              die('Error: ' . mysqli_error($con));
              $error = "Error, no se pudo crear el registro";
          }else{
              $mensaje = "Registro creado correctamente";
                header('Location: index.php?mensaje='.urlencode($mensaje));
                exit();
        }
      }
    }
    */



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR</title>
    <link rel="stylesheet" href="./casos.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>
<body>
  <div class="containerr text-center">
  <form class="conteiner-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="row content align-items-center">      
      <div class="col col-5 clientes">
        <a href="index.php">
          <img style="position: absolute; top: 24px; left: 31px; width: 44px;" src="./icon/flecha.png" alt="">
        </a>
        <h2 class="h2_crear">Dueño</h2>
        <p class="p_crear" >Ingrese la información del Dueño</p>
        <div style="margin-top: 22px">  
            <div class="forml1">
              <div class="first mb-3">
                <label for="cedula" class="form-label">Cedula</label>
                <input type="number" class="for" name="cedula" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="first mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class=" for" name="nombre" id="exampleInputPassword1">
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electronico</label>
              <input type="email" class="for b1" name="email" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Numero Telefonico</label>
              <input type="number" class="for b2" name="telefono" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" class="for b3" name="direccion" id="exampleInputPassword1">
            </div>
          </div>
        </div>
      <!-- Mascota -->
      <div class="col background">
        <h2 class="h2_crear">MASCOTA</h2>
        <p class="p_crear" >Ingrese la información de la mascota</p>
        <div style="margin-top: 22px">  
      
              <div class=" mb-3">
                <label for="nombreA" class="form-label">Nombre </label>
                <input type="text" class=" for" name="nombreA" id="exampleInputPassword1">
              </div>
  
            <div class="forml1">
              <div class="first mb-3">
                <label for="fechaini" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class=" for"  name="fechaini">
              </div>
              <div class="first mb-3">
                <label for="raza" class="form-label">Raza</label>
                <input type="text" class=" for" name="raza" id="exampleInputPassword1">
              </div>
            </div>
            <div class="forml1">
              <div class="first mb-3">
                <label for="tamanio" class="form-label">Tamaño</label>
                <input type="number" class="for b2" name="tamanio" id="exampleInputPassword1">
              </div>
              <div class="first mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class=" for" name="color" id="exampleInputPassword1">
              </div>
            </div>  
              <div class="first mb-3">
                <label for="especie" class="form-label">Especie</label>
                <input type="text" class=" for" name="especie" id="exampleInputPassword1">
              </div>
            </div>
            <button type="submit" class="btn-brown warning" name="crear">Crear</button>
          </div>
        </div>
      </div>
    </form>
  </div>

</body>
</html>

 <!-- MODAL -->
      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
              <form class="conteiner-modal" method="POST" action="">
                <div class="forml1">
                  <div class="first mb-3">
                    <label for="cedula" class="form-labe">Cedula</label>
                    <input type="number" class="for" name="cedula" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fila['cedula']; ?>">
                  </div>
                  <div class="first mb-3">
                    <label for="nombre" class="form-labe">Nombre Completo</label>
                    <input type="text" class=" for" name="nombre" id="exampleInputPassword1"  value="<?php echo $fila['nombre']; ?>">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-labe">Correo Electronico</label>
                  <input type="email" class="for b1" name="email" id="exampleInputPassword1"  value="<?php echo $fila['email']; ?>">
                </div>
                <div class="mb-3">
                  <label for="telefono" class="form-labe">Numero Telefonico</label>
                  <input type="number" class="for b2" name="telefono" id="exampleInputPassword1"  value="<?php echo $fila['telefono']; ?>">
                </div>
                <div class="mb-3">
                  <label for="direccion" class="form-labe">Dirección</label>
                  <input type="text" class="for b3" name="direccion" id="exampleInputPassword1"  value="<?php echo $fila['direccion']; ?>">
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn-brown" name="editarRegistro">Editar Registro</button>                  
                  <button type="button" class="btn-brown" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div> -->