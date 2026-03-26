<?php
session_start();
include("bd/conexion.php");

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user = pg_escape_string($conn, $_POST['usuario']);
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass'";
    $res = pg_query($conn, $sql);

    if($res && pg_num_rows($res) > 0){

        $fila = pg_fetch_assoc($res);
        $codigo = rand(100000,999999);

        $_SESSION['temp_user'] = $user;
        $_SESSION['codigo'] = $codigo;

        // ✅ CORREGIDO
        $_SESSION['usuario'] = $user;
        $_SESSION['rol'] = $fila['rol'];

        $mensaje = "Tu código MFA es: <b>$codigo</b>";
        $link = true;

    } else {
        $mensaje = "❌ Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/login.css">

<style>

</style>
</head>

<body>

<div class="login-box">

    <div class="logo-superior">
        <img src="img/logotipo.png" alt="Logo">
    </div>

    <img src="img/iniciar_sesion.png" class="titulo-img" alt="Iniciar Sesión">

    <?php if(!empty($mensaje)){ ?>
        <div class="mensaje <?php echo $tipo ?? ''; ?>">
            <?php echo $mensaje; ?>
            <?php if(isset($link)){ ?>
                <br><a href="verificar.php">Ir a verificar</a>
            <?php } ?>
        </div>
    <?php } ?>

    <form method="POST">

        <label class="label">Correo Electronico</label>
        <div class="input-group">
            <i class="fa fa-envelope left"></i>
            <input type="text" name="usuario" placeholder="usuario@ejemplo.com" required>
        </div>

        <label class="label">Contraseña</label>
        <div class="input-group">
            <i class="fa fa-lock left"></i>
            <input type="password" id="password" name="password" required>
            <i class="fa fa-eye right" onclick="togglePassword()"></i>
        </div>

        <button class="btn">Iniciar Sesión</button>

        <div class="links">
            <p><a href="recuperar.php">¿Olvidaste tu contraseña?</a></p>
            <p>¿No tienes cuenta? <a href="#">Regístrate</a></p>
        </div>

    </form>

</div>

<script>
function togglePassword(){
    let pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
