<?php
session_start();

require_once "config.php";
//get the data sent by the form by the POST method
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$sexo = $_POST['sexo'];
$telefono = $_POST['Direccion'];
$municipio = $_POST['municipio'];
$active = $_POST['active'];

//connect to the database
$pdo = new PDO(SGBD, USER, PASS);

//prepare the query
$sql = "INSERT INTO estudiantes (Nombres, Apellidos, Email, FechaNacimiento, Genero, Direccion, SwActivo, idmunicipio) VALUES (?,?,?,?,?,?,?,?)";
$query = $pdo->prepare($sql);

//execute the query

try {
    $query->execute([$nombre, $apellido, $email, $fechaNacimiento, $sexo, $telefono, $active, $municipio]);
    $_SESSION['message'] = "Estudiante registrado con exito";
    $_SESSION['message_type'] = "success";
    header("Location: index.php");
} catch (PDOException $e) {
    $_SESSION['message'] = "Error al registrar el estudiante";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");

}


