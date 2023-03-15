<?php
require_once "template/header.php";


$pdo = new PDO(SGBD, USER, PASS);
$sql = "SELECT COUNT(*) FROM estudiantes WHERE idmunicipio = 68001";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

echo "<h3>Conteo de estudiantes para el municipio Bucaramanga (68001)</h3>";
echo "<p>El numero de estudiantes es: " . $result['COUNT(*)'] . "</p>";

$sql = "SELECT * FROM estudiantes WHERE Genero = 'F'";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
echo "<h3>Listado de estudiantes de genero femenino (Genero = F)</h3>";

echo "<table class='table table-striped table-hover table-bordered'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Nombres</th>";
echo "<th>Apellidos</th>";
echo "<th>Email</th>";
echo "<th>Fecha de Nacimiento</th>";
echo "<th>Genero</th>";
echo "<th>Direccion</th>";
echo "<th>Activo</th>";
echo "<th>Municipio</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['IDEstudiante'] . "</td>";
    echo "<td>" . $row['Nombres'] . "</td>";
    echo "<td>" . $row['Apellidos'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['FechaNacimiento'] . "</td>";
    echo "<td>" . $row['Genero'] . "</td>";
    echo "<td>" . $row['Direccion'] . "</td>";
    echo "<td>" . $row['SwActivo'] . "</td>";
    echo "<td>" . $row['idmunicipio'] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";




require_once "template/footer.php";