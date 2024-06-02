<?php
    // Incluimos conexión
    include 'conexion.php';

    if(isset($_POST['crear'])){
        $nombreA = mysqli_real_escape_string($con, $_POST['nombreA']);
        $fechaini = mysqli_real_escape_string($con, $_POST['fechaini']);
        $raza = mysqli_real_escape_string($con, $_POST['raza']);
        $tamanio = mysqli_real_escape_string($con, $_POST['tamanio']);
        $color = mysqli_real_escape_string($con, $_POST['color']);
        $especie = mysqli_real_escape_string($con, $_POST['especie']);
        $cedula = mysqli_real_escape_string($con, $_POST['cedula']);


        if (empty($nombreA) || empty($fechaini) || empty($raza) || empty($tamanio) || empty($color) || empty($especie) || empty($cedula)) {
            $error = "Algunos campos están vacíos";
        }else{

            $query_cliente_existe = "SELECT cedula FROM cliente WHERE cedula = ?";

            $stmt = $con->prepare($query_cliente_existe);

            $stmt->bind_param('i',$cedula);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result === false) {
                die('Error en la consulta: ' . $con->error);
            }

            if($result->num_rows>0){
                $queryOtroAnimal = "INSERT INTO mascota(nombreA, raza, fechaini, tamanio, color, especie, cedula)VALUES(?, ?, ?, ?, ?, ?, ?)";

                $stmt = $con->prepare($queryOtroAnimal);
    
                $stmt->bind_param('sssissi', $nombreA, $raza, $fechaini, $tamanio, $color, $especie, $cedula);
    
                $stmt->execute();

                if (!$stmt->error) {
                    header('Location: index.php?mensaje=' . urlencode("Mascota registrada correctamente"));
                    exit();
                } else {
                    die('Error: ' . $stmt->error);
                }
            }else {
                // La cédula no está registrada
                echo "Cliente con cédula $cedula no registrado en la página.";
            }

        }
    }


?>