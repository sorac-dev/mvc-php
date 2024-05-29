<?php
class Database {
    // Definimos las propiedades necesarias para la conexión a la base de datos.
    private $host = "localhost"; // Nombre del host de la base de datos
    private $db_name = "testdb"; // Nombre de la base de datos
    private $username = "root"; // Nombre de usuario para la base de datos
    private $password = ""; // Contraseña para la base de datos
    public $conn; // Propiedad pública que mantendrá la conexión

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null; // Inicializamos la conexión como null

        try {
            // Intentamos crear una nueva instancia de PDO para la conexión a la base de datos
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            // Establecemos el conjunto de caracteres a UTF-8 para soportar caracteres especiales y acentos
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            // Capturamos cualquier excepción que ocurra durante la conexión
            // PDOException se usa para manejar errores específicos de la base de datos
            echo "Connection error: " . $exception->getMessage();
        }

        // Retornamos la conexión (será null si hubo un error)
        return $this->conn;
    }
}
?>
