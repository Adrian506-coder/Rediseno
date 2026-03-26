<?php

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];

echo "
<style>
body{
    font-family:Arial;
    background:#f3efe6;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.box{
    background:#c2b59b;
    padding:30px;
    border-radius:10px;
    text-align:center;
}
button{
    margin-top:15px;
    padding:10px;
    border:none;
    background:#2f4f2f;
    color:white;
    border-radius:6px;
}
</style>

<div class='box'>
    <h2>✅ Compra realizada</h2>
    <p>Gracias <b>$nombre</b></p>
    <p>Tu pedido será enviado a:</p>
    <p><b>$direccion</b></p>

    <button onclick='volver()'>Volver al inicio</button>
</div>

<script>
localStorage.removeItem('carrito');
localStorage.removeItem('compraTotal');

function volver(){
    window.location.href='index.php';
}
</script>
";

?>