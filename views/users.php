<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="index.php?action=create">Crear Usuario</a>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo htmlspecialchars($user['name']); ?> - <?php echo htmlspecialchars($user['email']); ?>
                <a href="index.php?action=edit&id=<?php echo $user['id']; ?>">Editar</a>
                <a href="index.php?action=delete&id=<?php echo $user['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
