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
  <ul class="nav nav-tabs" style=" padding: 1em; background: #fcfff5; margin-bottom: 34px;">
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
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="historialClinico.php">Historial de cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="factura.php">Factura</a>
    </li>
  </ul> 
  <div class="conten">
    <div class="conteiner">
      <h1 class="h2_crear">Programa tu Cita</h1>
      <p class="p_crear" >Ingrese la información de la cita</p>
      <div style="margin-top: 22px">  
        <form class="conteiner-form" method="POST" action="citacon.php">
          <div class="mb-3">
            <label for="email" class="form-label">fecha de cita</label>
            <input type="date" class="for b1" name="fecha" id="exampleInputPassword1">
          </div>
          <div class="forml1">
            <div class="first mb-3">
              <label for="cedula" class="form-label">Cedula</label>
              <input type="number" class="for" name="cedula" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="first mb-3">
              <label for="nombre" class="form-label">Mascota</label>
              <input type="text" class=" for" name="nombreA" id="exampleInputPassword1">
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="consulta" id="flexCheckDefault">
            <label class=" form-label" for="flexCheckDefault">
              Consulta general - 50.000 COP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="medicamentos" id="flexCheckChecked">
            <label class=" form-label" for="flexCheckChecked">
              administración de medicamentos - 100.000 COP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="vacunas" id="flexCheckChecked">
            <label class="form-label" for="flexCheckChecked">
              Vacunas - 40.000 COP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="basicas" id="flexCheckChecked">
            <label class="form-label" for="flexCheckChecked">
              Realizacion de pruebas básicas(Analisis de sangre, analisis de orina, detección de parasitos etc.) - 60.000 COP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="especializadas" id="flexCheckChecked">
            <label class="form-label" for="flexCheckChecked">
              Realizacion de pruebas especializadas(Resonancia magnética, electrocardiografía, endoscopia) - 120.000 COP
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios[]" value="peluqueria" id="flexCheckChecked">
            <label class=" form-label" for="flexCheckChecked">
              Peluquería - 30.000 COP
            </label>
          </div>
          
          <button type="submit" class="btn-brown" name="enviar">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>