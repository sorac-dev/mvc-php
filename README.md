# Proyecto MVC en PHP con CRUD y PDO

Este proyecto demuestra cómo implementar un sistema básico de CRUD (Crear, Leer, Actualizar y Eliminar) utilizando el patrón de diseño MVC (Modelo-Vista-Controlador) en PHP, con conexiones a la base de datos manejadas mediante PDO (PHP Data Objects).

## Estructura del Proyecto

El proyecto está organizado en varias carpetas, cada una con una responsabilidad específica:

- **`config`**: Contiene la configuración de la base de datos.
- **`controllers`**: Contiene los controladores que manejan la lógica de negocio y la interacción entre las vistas y los modelos.
- **`models`**: Contiene las clases que representan los datos y las reglas de negocio.
- **`views`**: Contiene las plantillas HTML que muestran la información al usuario.
- **`public`**: Contiene el punto de entrada de la aplicación.

## Variables Utilizadas

### Configuración de la Base de Datos

**Archivo: `config/database.php`**

- **`$host`**: Dirección del servidor de la base de datos. Generalmente `localhost` para desarrollo local.
- **`$db_name`**: Nombre de la base de datos a la que se conectará.
- **`$username`**: Nombre de usuario para la autenticación en la base de datos.
- **`$password`**: Contraseña para la autenticación en la base de datos.
- **`$conn`**: Variable que almacenará la conexión PDO.

### Modelo

**Archivo: `models/User.php`**

- **`$conn`**: Conexión PDO a la base de datos.
- **`$table_name`**: Nombre de la tabla en la base de datos (en este caso, `users`).
- **`$id`**: Identificador único del usuario.
- **`$name`**: Nombre del usuario.
- **`$email`**: Correo electrónico del usuario.

### Controlador

**Archivo: `controllers/UserController.php`**

- **`$db`**: Instancia de la conexión a la base de datos.
- **`$user`**: Instancia del modelo `User`.

### Vistas

Las vistas utilizan variables específicas para mostrar información. Aquí se listan las más importantes:

**Archivo: `views/users.php`**

- **`$users`**: Array que contiene la lista de usuarios obtenidos de la base de datos.

**Archivo: `views/create_user.php` y `views/edit_user.php`**

- **`$_POST`**: Superglobal que contiene los datos enviados a través del formulario HTML.

## Explicaciones de Conceptos Clave

### `PDO` y `bindParam`

- **`PDO` (PHP Data Objects)**: Es una extensión de PHP que define una interfaz para acceder a bases de datos. Proporciona una forma segura y eficiente de interactuar con bases de datos.
- **`bindParam`**: Método de PDO que se utiliza para vincular parámetros a una variable específica en una sentencia SQL. Esto ayuda a prevenir inyecciones SQL al asegurarse de que los valores se traten de manera segura.

### `htmlspecialchars` y `strip_tags`

- **`htmlspecialchars`**: Función de PHP que convierte caracteres especiales en entidades HTML. Esto ayuda a prevenir ataques XSS (Cross-Site Scripting) al escapar caracteres que podrían ser interpretados como código HTML.
- **`strip_tags`**: Función de PHP que elimina todas las etiquetas HTML y PHP de una cadena. Esto es útil para limpiar entradas de usuario que podrían contener código malicioso.

### Métodos CRUD

- **`create()`**: Método en el modelo `User` que inserta un nuevo usuario en la base de datos.
- **`read()`**: Método en el modelo `User` que obtiene todos los usuarios de la base de datos.
- **`readOne()`**: Método en el modelo `User` que obtiene un solo usuario basado en su ID.
- **`update()`**: Método en el modelo `User` que actualiza los datos de un usuario existente en la base de datos.
- **`delete()`**: Método en el modelo `User` que elimina un usuario de la base de datos.

### Función de Controlador

- **`index()`**: Método en el controlador `UserController` que muestra la lista de usuarios.
- **`create()`**: Método en el controlador `UserController` que maneja la creación de un nuevo usuario.
- **`edit($id)`**: Método en el controlador `UserController` que maneja la edición de un usuario existente basado en su ID.
- **`delete($id)`**: Método en el controlador `UserController` que maneja la eliminación de un usuario basado en su ID.

## Cómo Ejecutar el Proyecto

1. Clona este repositorio en tu servidor local.
2. Configura los detalles de tu base de datos en `config/database.php`.
3. Asegúrate de que tu servidor web tenga habilitado PHP y PDO.
4. Accede al archivo `index.php` desde tu navegador web.
5. Utiliza la interfaz para crear, leer, actualizar y eliminar usuarios.

Este proyecto sirve como una base para entender el patrón MVC en PHP y cómo implementar operaciones CRUD de manera segura y estructurada utilizando PDO.
