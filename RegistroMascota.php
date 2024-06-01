<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR</title>
    <link rel="stylesheet" href="./css/casos.css">

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
            <a class="nav-link" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="cita.php">cita</a>
        </li>
        <li class="nav-item">
            <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="historialClinico.php">Historial de cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link myitem" style="border: none;color: #aee570;font-weight: 900;font-size: 23px;font-family: serif;font-variant-caps: all-petite-caps;" href="factura.php">Factura</a>
        </li>
    </ul> 

    <div class="containerr text-center" style="display: flex; justify-content:center;">
        <form class="conteiner-form" method="POST" action="RegistroMascotaCon.php" style="width:60%; height: 80.5vh;">
            <div style="display: flex;" class="row content align-items-center"> 
        <!-- Mascota -->
                <div style="background:#ecfec3; padding:3em; " class="background">
                    <h1 class="h2_crear">MASCOTA</h1>
                    <p  class="p_crear" >Ingrese la información de la mascota</p>
                <div style="margin-top: 22px"> 
                <div class="forml1"> 
                    <div class="first mb-3">
                        <label for="especie" class="form-label">Cedula del propietario</label>
                        <input type="number" class=" for white" name="cedula" id="exampleInputPassword1">
                    </div>
                    <div class=" first mb-3">
                        <label for="nombreA" class="form-label">Nombre </label>
                        <input type="text" class=" for white" name="nombreA" id="exampleInputPassword1">
                    </div>
                </div>    
            <div class="forml1">
                <div class="first mb-3">
                    <label for="fechaini" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class=" for white"  name="fechaini">
                </div>
                <div class="first mb-3">
                    <label for="raza" class="form-label">Raza</label>
                    <input type="text" class=" for white" name="raza" id="exampleInputPassword1">
                </div>
            </div>
            <div class="forml1">
                <div class="first mb-3">
                    <label for="tamanio" class="form-label">Tamaño</label>
                    <input type="number" class="for white" name="tamanio" id="exampleInputPassword1">
                </div>
                <div class="first mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class=" for white" name="color" id="exampleInputPassword1">
                </div>
            </div>  
                <div class="first mb-3">
                    <label for="especie" class="form-label">Especie</label>
                    <input type="text" class=" for white" name="especie" id="exampleInputPassword1">
                </div>
            </div>
            <button type="submit" class="btn-brown warning" name="crear">Crear</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
