
<?php
include 'conexion.php';

if(isset($_POST['enviar'])){
    $cedula = mysqli_real_escape_string($con, $_POST['cedula']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $direccion = mysqli_real_escape_string($con, $_POST['direccion']);

    //Configurar tiempo zona horaria
    date_default_timezone_set('America/Bogota');
    $time = date('h:i:s a', time());

    //Validar si no están vacíos
    if(!isset($cedula) || $cedula == '' || !isset($nombre) || $nombre == '' || !isset($telefono) || $telefono == '' || !isset($email) || $email == '' || !isset($direccion) || $direccion == ''){
        $error = "Algunos campos están vacíos";
    }else{
        $query = "INSERT INTO clientes(cedula, nombre, email, telefono, direccion)VALUES('$cedula', '$nombre', '$email', '$telefono', '$direccion')";

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
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR</title>
    <link rel="stylesheet" href="./css/cita.css">
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
  <div class="conten">
    <div class="conteiner">
        <h2 class="h2_crear">Cita</h2>
        <p class="p_crear" >Ingrese la información de la cita</p>
        <div style="margin-top: 22px">  
        <form class="conteiner-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="forml1">
            <div class="first mb-3">
                <label for="cedula" class="form-label">Cedula</label>
                <input type="number" class="for" name="cedula" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="first mb-3">
                <label for="nombre" class="form-label">Mascota</label>
                <input type="text" class=" for" name="nombre" id="exampleInputPassword1">
            </div>
            </div>
            
            <div class="mb-3">
            <label for="email" class="form-label">Fecha de la Cita</label>
            <input type="email" class="for b1" name="email" id="exampleInputPassword1">
            </div>
            
            <label for="email" class="form-label">Servicios</label>

            

            <!--CHECKS PARA ESCOGER LOS SERVICIOS-->

            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              <b>Consulta general - 50.000 COP</b>
            </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <b>administración de medicamentos - 100.000 COP</b>
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <b>Vacunas - 40.000 COP</b>
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <b>Realizacion de pruebas básicas(Analisis de sangre, analisis de orina, detección de parasitos etc.) - 60.000 COP</b>
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <b>Realizacion de pruebas especializadas(Resonancia magnética, electrocardiografía, endoscopia) - 120.000 COP</b>
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <b>Peluquería - 30.000 COP</b>
              </label>
            </div>
            <!--  
            <div class="mb-3">
            <label for="telefono" class="form-label">Numero Telefonico</label>
            <input type="number" class="for b2" name="telefono" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="for b3" name="direccion" id="exampleInputPassword1">
            </div>-->

            <button type="submit" class="btn-brown" name="enviar">Enviar</button>
        </form>
        </div>
    </div>
  </div>
  <ul class="nav nav-tabs" style=" padding: 1em; background: #fcfff5;">
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="index.php" onclick="mostrarTabla('clientes')">Inicio</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" aria-current="page"  href="Registro.php" onclick="mostrarTabla('clientes')">Registrar Paciente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php" onclick="mostrarTabla('casos')">cita</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="historialClinico.php">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="#" onclick="mostrarTabla('casos')">Factura</a>
    </li>
  </ul> 
  <div class="conten">
    <div class="conteiner">
        <h1 class="h2_crear">Programa tu Cita</h1>
        <p class="p_crear" >Ingrese la información de la cita</p>
        <div style="margin-top: 22px">  
        <form class="conteiner-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
            <button type="submit" class="btn-brown" name="enviar">Enviar</button>
        </form>
        </div>
    </div>
  </div>
</body>
</html>