<?php
    // Incluimos conexión
    include 'conexion.php';

    if(isset($_POST['crear'])){

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



        if(!isset($cedula) || $cedula == '' || !isset($nombre) || $nombre == '' || !isset($telefono) || $telefono == '' || !isset($email) || $email == '' || !isset($direccion) || $direccion == '' || !isset($nombreA) || $nombreA == '' || !isset($fechaini) || $fechaini == '' || !isset($raza) || $raza == '' || !isset($tamanio) || $tamanio == '' || !isset($color) || $color == '' || !isset($especie) || $especie == ''){
            $error = "Algunos campos están vacíos";
        }else{
            $queryCliente = "INSERT INTO cliente(cedula, nombre, email, telefono, direccion)VALUES('$cedula', '$nombre', '$email', '$telefono', '$direccion')";
            $queryAnimal = "INSERT INTO mascota(nombreA, raza, fechaini, tamanio, color, especie, cedula)VALUES('$nombreA', '$raza', '$fechaini', '$tamanio', '$color', '$especie','$cedula')";

            if(!mysqli_query($con, $queryCliente) || !mysqli_query($con, $queryAnimal)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registro";
            }else{
                $mensaje = "Registro creado correctamente";
                header('Location: index.php?mensaje='.urlecode($mensaje));
                exit();
            }
        }
    }


?>
