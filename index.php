<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="contenedor">

        <nav class="nav">
            <a href="index.html#inicio">INICIO</a>
            <a href="index.html#productos">PRODUCTOS</a>
            <a href="#login">LOGIN</a>
        </nav>

        <main class="contenido-login" id="login">

            <section class="login-card">

                <h1 class="titulo">INICIAR SESIÓN</h1>
                <h2 class="subtitulo">CERVECERÍA SUREÑA</h2>

                <form action="index.php" method="POST">

                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" required>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                    <button type="submit">Login</button>

                </form>

            </section>

        </main>

        <footer class="footer">

            <section>
                <h3>REDES SOCIALES</h3>
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">Facebook</a>
                <a href="https://www.whatsapp.com/" target="_blank" rel="noopener noreferrer">WhatsApp</a>
            </section>

            <section>
                <h3>UBICACIÓN</h3>
                <a href="https://maps.google.com/" target="_blank" rel="noopener noreferrer">Google Maps</a>
                <p>Dirección</p>
            </section>

            <section>
                <h3>DESARROLLADO POR</h3>

                <p>Kevin Alexander Urquizo Chijo</p>
                <p>Estudiante de Sistemas Informaticos</p>
                <p>Instituto Cca Sucre</p>
                
            </section>

        </footer>

    </div>

    <?php
    $conexion = new mysqli("localhost", "root", "", "login");

    $usuario = $_POST['usuario']?? '';
    $password = $_POST['contrasena']?? '';

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conexion->prepare("INSERT INTO usuario (usuario, contrasena) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $password_hash);
    $stmt->execute();
    ?>

</body>
</html>