


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
  <div class="containerr text-center">
  <form class="conteiner-form" method="POST" action="registrocon.php">

    <div style="height: 100vh;display: flex;" class="row content align-items-center">      
      <div class="col col-5 clientes">
        <a href="index.php">
          <img style="position: absolute; top: 24px; left: 31px; width: 44px;" src="./icon/flecha.png" alt="">
        </a>
        <h2  style="color:black" class="h2_crear">Dueño</h2>
        <p  style="color:black" class="p_crear" >Ingrese la información del Dueño</p>
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
      <div style="background:#c0b6ff; color:white;" class="col background">
        <h2  class="h2_crear">MASCOTA</h2>
        <p  style="color:white" class="p_crear" >Ingrese la información de la mascota</p>
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