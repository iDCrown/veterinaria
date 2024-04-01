<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR</title>
    <link rel="stylesheet" href="./css/crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="conteiner">
    <h2 class="h2_crear">Cliente</h2>
    <p class="p_crear" >Ingrese la información del cliente</p>
    <div style="margin-top: 22px">  
      <form class="conteiner-form">
        <div class="forml1">
          <div class="first mb-3">
            <label for="exampleInputEmail1" class="form-label">Cedula</label>
            <input type="number" class="for" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="first mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre Completo</label>
            <input type="name" class=" for" id="exampleInputPassword1">
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Correo Electronico</label>
          <input type="name" class="for b1" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Numero Telefonico</label>
          <input type="name" class="for b2" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Dirección</label>
          <input type="name" class="for b3" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn-brown">Enviar</button>
      </form>
    </div>
  </div>
</body>
</html>