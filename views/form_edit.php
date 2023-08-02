<?php
// Incluimos el archivo de configuración que contiene datos de conexión a la base de datos y otros ajustes.
require_once('../config/config.php');

// Incluimos la clase 'database' para gestionar la conexión a la base de datos.
require_once('../libs/database.php');

// Incluimos la clase 'profileModel' que será utilizada para interactuar con la tabla de perfiles en la base de datos.
require_once('../model/profileModel.php');

// Creamos una instancia de la clase 'Database' para obtener una conexión a la base de datos.
$database = new Database();

// Obtenemos la conexión a la base de datos llamando al método 'getConnection' de la clase 'Database'.
$connection = $database->getConnection();

// Creamos una instancia del modelo 'profileModel' y le pasamos la conexión a la base de datos.
$model = new profileModel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al archivo CSS de Bootstrap para estilizar la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <!-- Formulario para editar el perfil del usuario. -->
                <form action="../controller/editarController.php" method="POST">
                    <?php
                    // Iteramos sobre la variable "$variable" (que debería contener los datos del perfil del usuario) usando un bucle "foreach".
                    foreach ($variable as $key) {
                    ?>
                        <!-- Creamos campos ocultos para enviar el "id" del usuario a editar. -->
                        <input type="hidden" name="id" value="<?= $key['id'] ?>">
                        <!-- Campos para editar los datos del usuario, mostrando los valores actuales en los campos de texto. -->
                        <label for="" class="form-label">first_name</label>
                        <input type="text" class="form-control" name="first_name" value="<?= $key['first_name'] ?>">
                        <label for="" class="form-label">last_name</label>
                        <input type="text" class="form-control" name="last_name" value="<?= $key['last_name'] ?>">
                        <label for="" class="form-label">email</label>
                        <input type="text" class="form-control" name="email" value="<?= $key['email'] ?>">
                        <!-- <label for="" class="form-label">id_users_fk</label>
                        <input type="text" class="form-control"> -->
                        <label for="" class="form-label">phone</label>
                        <input type="text" class="form-control" name="phone" value="<?= $key['phone'] ?>">
                        <label for="" class="form-label">date_birth</label>
                        <input type="date" class="form-control" name="date_birth" value="<?= $key['date_birth'] ?>">
                    <?php
                    }
                    ?>
                    <!-- Botón para enviar el formulario y actualizar los datos del usuario -->
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Update" name="envio_edit" class="btn btn-primary mt-2 w-100">
                    </div>
                    <!-- Enlace para volver a la lista de perfiles de usuarios -->
                    <div class="d-flex mt-3">
                        <a href="../views/listar.php" class="btn btn-dark w-100">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
