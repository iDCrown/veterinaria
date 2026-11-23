<?php

$host = getenv('DB_HOST') ?: 'localhost';
$database = getenv('DB_NAME') ?: 'veterinaria';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

mysqli_report(MYSQLI_REPORT_OFF);
$con = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    die('Fallo al conectarse a MySQL: ' . mysqli_connect_error());
}