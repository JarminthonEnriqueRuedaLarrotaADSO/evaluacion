<?php
// Incluimos el archivo de configuración que contiene datos de conexión a la base de datos y otros ajustes.
require_once('../config/config.php');

// Incluimos la clase 'database' para gestionar la conexión a la base de datos.
require_once('../libs/database.php');

// Incluimos la clase 'profileModel' que representa el modelo para interactuar con la tabla de perfiles en la base de datos.
require_once('../model/profileModel.php');

// Creamos una instancia de la clase 'Database' para obtener una conexión a la base de datos.
$database = new Database();

// Obtenemos la conexión a la base de datos llamando al método 'getConnection' de la clase 'Database'.
$connection = $database->getConnection();

// Creamos una instancia del modelo 'profileModel' y le pasamos la conexión a la base de datos.
$model = new profileModel();

// Verificamos si se ha enviado una solicitud para eliminar un perfil.
if (isset($_POST['Eliminar'])) {
    // Asignamos el ID del perfil que se va a eliminar al modelo.
    $model->setId($_POST['id']);
}

// Llamamos al método 'Eliminar' del modelo para eliminar el perfil con el ID especificado.
$model->Eliminar();
