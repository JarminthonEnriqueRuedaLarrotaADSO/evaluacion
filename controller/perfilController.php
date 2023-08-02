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

// Creamos un array para almacenar mensajes de error.
$errors = array();

// Verificamos si la solicitud es una petición POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los inputs enviados a través del formulario.
    $input1 = $_POST["first_name"];
    $input2 = $_POST["last_name"];
    $input3 = $_POST["email"];
    $input4 = $_POST["phone"];
    $input5 = $_POST["date_birth"];

    // Validar que los campos no estén vacíos
    if (empty($input1) || $input1 = "") {
        // Si el campo first name está vacío, agrega un mensaje de error al array.
        $errors['input1'] = "El campo first name es obligatorio.";
    } 
    if (empty($input2) || $input2 = "") {
        // Si el campo last name está vacío, agrega un mensaje de error al array.
        $errors['input2'] = "El campo last name es obligatorio.";
    }
    if (empty($input3) || $input3 = "") {
        // Si el campo email está vacío, agrega un mensaje de error al array.
        $errors['input3'] = "El campo email es obligatorio.";
    }
    if (empty($input4) || $input4 = "") {
        // Si el campo phone está vacío, agrega un mensaje de error al array.
        $errors['input4'] = "El campo phone es obligatorio.";
    }
    if (empty($input5) || $input5 = "") {
        // Si el campo date_birth está vacío, agrega un mensaje de error al array.
        $errors['input5'] = "El campo date_birth es obligatorio.";
    } else {
        // Si todos los campos están llenos, continúa con alguna acción o proceso.
        // Aquí puedes realizar alguna acción como guardar los datos en una base de datos, enviar un correo, etc.

        // Calculamos la edad a partir de la fecha de nacimiento ingresada.
        $naci = new DateTime($_POST['date_birth']);
        $ahora = new datetime(date("2023-11-07"));
        $diferencia = $ahora->diff($naci);
        $dif = $diferencia->format("%y");

        // Asignamos los valores a las propiedades del modelo 'profileModel'.
        $model->setFirst_name($_POST['first_name']);
        $model->setLast_name($_POST['last_name']);
        $model->setEmail($_POST['email']);
        $model->setPhone($_POST['phone']);
        $model->setDate_birth($dif);

        // Insertamos los datos del perfil en la base de datos llamando al método 'Insertar' del modelo.
        $model->Insertar();

        // Agregamos un mensaje de éxito al array de errores para indicar que los campos fueron llenados correctamente.
        $errors['llenado'] = "Los campos fueron llenados con éxito";
    }
}

// Incluimos el archivo de vista 'form_profiles.php', que contiene el formulario y mostrará los mensajes de error si existen.
include_once('../views/form_profiles.php');
