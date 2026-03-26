<?php
$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $correo = $_POST['correo'];

    if(!empty($correo)){
        // 🔥 SIMULACIÓN
        $mensaje = "✔ Se ha enviado un enlace de recuperación a <b>$correo</b>";
        $tipo = "success";
    } else {
        $mensaje = "❌ Ingresa un correo válido";
        $tipo = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Recuperar Contraseña</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family: 'Playfair Display', serif;
    background: url('img/login.png') no-repeat center center/cover;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CAJA */
.box{
    background: rgba(0,0,0,0.7);
    padding:40px;
    border-radius:15px;
    width:320px;
    text-align:center;
    color:#fff;
    border:1px solid rgba(212,175,55,0.5);
}

/* TITULO */
h2{
    color:#f5d37a;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin-top:10px;
    background:#000;
    border:1px solid rgba(212,175,55,0.4);
    border-radius:5px;
    color:#e6c15a;
    font-size:16px;
}

/* BOTON */
button{
    margin-top:15px;
    width:100%;
    padding:10px;
    border:none;
    border-radius:6px;
    background: linear-gradient(145deg, #c89b3c, #f5d37a);
    color:#000;
    font-weight:bold;
    cursor:pointer;
}

/* MENSAJE */
.mensaje{
    margin-top:15px;
    padding:10px;
    border-radius:6px;
}

.success{
    border:1px solid #4CAF50;
    color:#4CAF50;
}

.error{
    border:1px solid #ff4d4d;
    color:#ff4d4d;
}

/* LINK */
a{
    display:block;
    margin-top:15px;
    color:#d4af37;
    text-decoration:none;
}
</style>

</head>
<body>

<div class="box">

    <h2>Recuperar Contraseña</h2>

    <form method="POST">
        <input type="email" name="correo" placeholder="Ingresa tu correo" required>
        <button>Enviar enlace</button>
    </form>

    <?php if(!empty($mensaje)){ ?>
        <div class="mensaje <?php echo $tipo; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php } ?>

    <a href="login.php">Volver al login</a>

</div>

</body>
</html>