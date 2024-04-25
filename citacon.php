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
        $query = "INSERT INTO historialclinico(Fecha_Visita)VALUES('$cedula', '$nombre', '$email', '$telefono', '$direccion')";

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