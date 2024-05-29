<?php
require_once '../controllers/UserController.php';

// Obtener la acción y el id (si corresponde) de la URL
$action = isset($_GET['action']) ? $_GET['action'] : ''; // Acción a realizar (crear, editar, eliminar, etc.)
$id = isset($_GET['id']) ? $_GET['id'] : ''; // Identificador único del usuario (para editar o eliminar)

$controller = new UserController(); // Instancia del controlador de usuarios

// Switch para manejar diferentes acciones basadas en el valor de $action
switch ($action) {
    case 'create':
        // Si la acción es 'create', llamamos al método create del controlador
        $controller->create();
        break;
    case 'edit':
        // Si la acción es 'edit', llamamos al método edit del controlador
        // Si se proporciona un ID, pasamos ese ID al método edit, de lo contrario, mostramos la lista de usuarios
        if ($id) {
            $controller->edit($id);
        } else {
            $controller->index(); // Mostramos la lista de usuarios
        }
        break;
    case 'delete':
        // Si la acción es 'delete', llamamos al método delete del controlador
        // Si se proporciona un ID, pasamos ese ID al método delete, de lo contrario, mostramos la lista de usuarios
        if ($id) {
            $controller->delete($id);
        } else {
            $controller->index(); // Mostramos la lista de usuarios
        }
        break;
    default:
        // Si no se proporciona una acción válida, simplemente mostramos la lista de usuarios
        $controller->index();
        break;
}
?>
