<?php
require_once '../controllers/UserController.php';

// Obtener la acción y el id (si corresponde) de la URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$controller = new UserController();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            $controller->index();
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            $controller->index();
        }
        break;
    default:
        $controller->index();
        break;
}
?>
