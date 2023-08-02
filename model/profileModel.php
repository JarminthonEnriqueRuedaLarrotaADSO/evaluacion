<?php
// Incluimos el archivo de configuración que contiene datos de conexión a la base de datos y otros ajustes.
require_once('../config/config.php');

// Incluimos la clase 'database' para gestionar la conexión a la base de datos.
require_once('../libs/database.php');

// Definimos la clase 'profileModel', que representa el modelo para interactuar con la tabla de perfiles en la base de datos.
class profileModel
{
    // Declaración de variables privadas para almacenar los datos del perfil.
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $date_birth;

    // Variables para la conexión a la base de datos.
    protected $db;
    protected $connection;

    // Métodos 'set' para asignar valores a las variables privadas.
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setDate_birth($date_birth)
    {
        $this->date_birth = $date_birth;
    }

    // Métodos 'get' para obtener los valores de las variables privadas.
    public function getId()
    {
        return $this->id;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getDate_birth()
    {
        return $this->date_birth;
    }

    // Constructor de la clase que inicializa la conexión a la base de datos.
    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    // Método para insertar un nuevo perfil en la base de datos.
    public function Insertar()
    {
        $sql = "INSERT INTO tb_profiles (first_name, last_name, email, id_users_fk, phone, date_birth) VALUES (:first_name, :last_name, :Email, :id_users_fk, :Phone, :Date_birth)";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":first_name", $this->first_name);
        $stm->bindValue(":last_name", $this->last_name);
        $stm->bindValue(":Email", $this->email);
        $stm->bindValue(":Phone", $this->phone);
        $stm->bindValue(":id_users_fk", 1); // ¿Quizás aquí debería ir el ID del usuario actual? 1 es un valor constante.
        $stm->bindValue(":Date_birth", $this->date_birth);
        $stm->execute();
        header("Location:../views/listar.php"); // Redireccionar a la lista de perfiles después de la inserción.
    }

    // Método para obtener todos los perfiles de la base de datos.
    public function mostrar()
    {
        $sql = "SELECT * FROM tb_profiles";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    // Método para obtener los datos de un perfil específico a partir de su ID.
    public function mostrarForm()
    {
        $sql = "SELECT * FROM tb_profiles WHERE id = :id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":id", $this->id);
        $stm->execute();
        return $stm->fetchAll();
    }

    // Método para eliminar un perfil de la base de datos a partir de su ID.
    public function Eliminar()
    {
        $sql = "DELETE FROM tb_profiles WHERE id = :id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":id", $this->id);
        $stm->execute();
        header("location:../views/listar.php"); // Redireccionar a la lista de perfiles después de la eliminación.
    }

    // Método para actualizar los datos de un perfil en la base de datos a partir de su ID.
    public function Update()
    {
        $sql = "UPDATE tb_profiles SET first_name = :first_name, last_name = :last_name, email = :Email, phone = :Phone, date_birth = :Date_birth WHERE id = :id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":id", $this->id);
        $stm->bindValue(":first_name", $this->first_name);
        $stm->bindValue(":last_name", $this->last_name);
        $stm->bindValue(":Email", $this->email);
        $stm->bindValue(":Phone", $this->phone);
        $stm->bindValue(":Date_birth", $this->date_birth);
        $stm->execute();
        header('Location:../views/listar.php'); // Redireccionar a la lista de perfiles después de la actualización.
    }
}
