<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($this->user->name); ?>" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($this->user->email); ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index.php">Volver a la lista de usuarios</a>
</body>
</html>
