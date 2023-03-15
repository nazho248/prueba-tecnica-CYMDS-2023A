<?php
session_start();

require_once "config.php";

$idMunicipio = $_POST['idMunicipio'];
$nombre = $_POST['nombre'];
$idDepartamento = $_POST['idDepartamento'];

$pdo = new PDO(SGBD, USER, PASS);


$sql = "INSERT INTO Municipio (idMunicipio, Nombre, idDepartamento) VALUES (?,?,?)";
$query = $pdo->prepare($sql);


try {
    $query->execute([$idMunicipio, $nombre, $idDepartamento]);
    $_SESSION['message'] = "Municipio registrado con exito";
    $_SESSION['message_type'] = "success";
    header("Location: index.php");
} catch (PDOException $e) {
    $_SESSION['message'] = "Error al registrar el municipio";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
}