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

// Asignamos el ID del perfil que se va a mostrar y editar al modelo.
$model->setId($_POST['id']);

// Obtenemos los datos del perfil a través del método 'mostrarForm' del modelo y los almacenamos en la variable '$variable'.
$variable = $model->mostrarForm();

// Incluimos el archivo de vista 'form_edit.php', que contiene el formulario para editar el perfil y mostrará los datos del perfil actual.
include_once("../views/form_edit.php");

// Verificamos si se ha enviado una solicitud para actualizar los datos del perfil (formulario enviado).
if (isset($_POST['envio_edit'])) {
    // Calculamos la edad a partir de la fecha de nacimiento ingresada.
    $naci = new DateTime($_POST['date_birth']);
    $ahora = new datetime(date("2023-02-08"));
    $diferencia = $ahora->diff($naci);
    $dif = $diferencia->format("%y");

    // Obtenemos los valores de los campos del formulario para actualizar el perfil.
    $id = $_POST["id"];
    $nombre = $_POST["first_name"];
    $apellido = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $edad = $_POST['date_birth'];

    // Asignamos los valores actualizados al modelo 'profileModel'.
    $model->setId($_POST['id']);
    $model->setFirst_name($_POST['first_name']);
    $model->setLast_name($_POST['last_name']);
    $model->setEmail($_POST['email']);
    $model->setPhone($_POST['phone']);
    $model->setDate_birth($dif);

    // Llamamos al método 'Update' del modelo para actualizar los datos del perfil en la base de datos.
    $model->Update();
}
