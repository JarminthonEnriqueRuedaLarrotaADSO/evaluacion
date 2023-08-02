<?php
// Se incluye el archivo de configuración con datos de conexión a la base de datos
require_once('../config/config.php');

// Se incluye la clase de la base de datos para establecer la conexión
require_once('../libs/database.php');

// Se incluye la clase del modelo de perfiles
require_once('../model/profileModel.php');

// Se crea una instancia de la clase Database para obtener la conexión a la base de datos
$database = new Database();
$connection = $database->getConnection();

// Se crea una instancia del modelo de perfiles
$model = new profileModel();

// Se obtiene un arreglo con los perfiles desde la base de datos
$variable = $model->mostrar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Se incluye el archivo CSS de Bootstrap para los estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <!-- Se crea una tabla para mostrar los perfiles obtenidos -->
                <table class="table">
                    <thead>
                        <!-- Encabezados de la tabla -->
                        <tr class="text-center">
                            <th>id</th>
                            <th>first_name</th>
                            <th>last_name</th>
                            <th>email</th>                            
                            <th>phone</th>
                            <th>Age</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Se utiliza un bucle para recorrer cada perfil y mostrar sus detalles -->
                        <?php foreach ($variable as $key) { ?>
                            <tr>                                
                                <td><?= $key['id']  ?></td>
                                <td><?= $key['first_name']  ?></td>
                                <td><?= $key['last_name'] ?></td>
                                <td><?= $key['email'] ?></td>
                                <td><?= $key['phone'] ?></td>
                                <td><?= $key['date_birth'] ?></td>
                                <!-- Botón para editar el perfil -->
                                <td>
                                    <form action="../controller/editarController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $key['id']?>">
                                        <input type="submit" value="Editar" name="Editar" class="btn btn-dark">
                                    </form> 
                                </td>
                                <!-- Botón para eliminar el perfil -->
                                <td>
                                    <form action="../controller/eliminarController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $key['id']?>" >
                                        <input type="submit" value="Eliminar" name="Eliminar" class="btn btn-danger">
                                    </form> 
                                </td>   
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- Enlace para volver atrás -->
                <div>
                    <a href="../controller/perfilController.php" class="btn btn-success w-100">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
