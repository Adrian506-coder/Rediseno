<?php
session_start();

if(!isset($_SESSION['temp_user'])){
    header("Location: login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $codigo = $_POST['codigo'];

    if($codigo == $_SESSION['codigo']){

        $_SESSION['admin'] = $_SESSION['temp_user'];

        unset($_SESSION['temp_user']);
        unset($_SESSION['codigo']);

        header("Location: menu.php");
        exit;

    } else {
        echo "Código incorrecto ❌";
    }
}
?>

<h2>Verificación MFA</h2>

<form method="POST">
    <input type="text" name="codigo" placeholder="Código" required>
    <button type="submit">Verificar</button>
</form>