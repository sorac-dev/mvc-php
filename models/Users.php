<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Leer todos los usuarios
    public function read() {
        $query = "SELECT id, name, email FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Crear un nuevo usuario
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email";
        $stmt = $this->conn->prepare($query);

        // Sanitizamos los datos
        // strip_tags elimina cualquier etiqueta HTML y PHP de la entrada
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // bindParam vincula un parámetro a una variable específica para evitar inyección SQL
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);

        // Ejecutamos la declaración y retornamos true si tuvo éxito
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer un solo usuario
    public function readOne() {
        $query = "SELECT id, name, email FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        // Vinculamos el id del usuario a obtener
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Asignamos los valores obtenidos a las propiedades del objeto
        $this->name = $row['name'];
        $this->email = $row['email'];
    }

    // Actualizar un usuario
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitizamos los datos
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bindParam vincula los valores a los parámetros de la consulta
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        // Ejecutamos la declaración y retornamos true si tuvo éxito
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un usuario
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Vinculamos el id del usuario a eliminar
        $stmt->bindParam(1, $this->id);

        // Ejecutamos la declaración y retornamos true si tuvo éxito
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
