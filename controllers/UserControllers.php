<?php
require_once '../models/User.php';
require_once '../config/database.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $database = new Database();
        $this->db = $database->getConnection();
        // Creamos una instancia del modelo User
        $this->user = new User($this->db);
    }

    // Método para mostrar la lista de usuarios
    public function index() {
        // Obtenemos todos los usuarios
        $stmt = $this->user->read();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Incluimos la vista que muestra la lista de usuarios
        include '../views/users.php';
    }

    // Método para crear un nuevo usuario
    public function create() {
        if($_POST) {
            // Asignamos los datos del formulario a las propiedades del usuario
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];

            // Intentamos crear el usuario y mostramos un mensaje según el resultado
            if($this->user->create()) {
                echo "User created successfully.";
            } else {
                echo "Failed to create user.";
            }
        }
        // Incluimos la vista del formulario de creación
        include '../views/create_user.php';
    }

    // Método para editar un usuario existente
    public function edit($id) {
        $this->user->id = $id;
        $this->user->readOne();

        if($_POST) {
            // Asignamos los datos del formulario a las propiedades del usuario
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];

            // Intentamos actualizar el usuario y mostramos un mensaje según el resultado
            if($this->user->update()) {
                echo "User updated successfully.";
            } else {
                echo "Failed to update user.";
            }
        }
        // Incluimos la vista del formulario de edición
        include '../views/edit_user.php';
    }

    // Método para eliminar un usuario
    public function delete($id) {
        $this->user->id = $id;

        // Intentamos eliminar el usuario y mostramos un mensaje según el resultado
        if($this->user->delete()) {
            echo "User deleted successfully.";
        } else {
            echo "Failed to delete user.";
        }

        // Mostramos la lista de usuarios después de la eliminación
        $this->index();
    }
}
?>
