<?php require_once "template/header.php"; ?>

<h2>Formulario Registro Estudiantes</h2>

<?php
session_start();

if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php session_unset(); endif; ?>

<form action="insertar.php" method="post" class="m-4">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                    <option selected>Seleccione un sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
    </div>

                <div class="mb-3">
                    <label for="Direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="Direccion" name="Direccion">
                </div>


    <div class="mb-3">
        <label for="municipio" class="form-label">Municipio</label>
        <select class="form-select" aria-label="Default select example" name="municipio" id="municipio">
            <option selected>Seleccione un municipio</option>
            <?php
            $sql = "SELECT * FROM Municipio";
            $pdo = new PDO(SGBD, USER, PASS);
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $municipio) {
                echo "<option value='" . $municipio['idMunicipio'] . "'>" . $municipio['Nombre'] . "</option>";
            }
            ?>
        </select>
    </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="active" name="active" checked />
            <label class="form-check-label">
                Estudiante Activo
            </label>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>

<h2>Formulario Registro Municipios</h2>

<form action="insertarMunicipio.php" method="post" class="m-4">
    <!-- this form is for the insert of the municipios with idMunicipio, idDepartamento and nombre -->
    <div class="mb-3">
        <label for="idMunicipio" class="form-label">Id Municipio</label>
        <input type="text" class="form-control" id="idMunicipio" name="idMunicipio" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="idDepartamento" class="form-label">Id Departamento</label>
        <input type="text" class="form-control" id="idDepartamento" name="idDepartamento">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once "template/footer.php"; ?>