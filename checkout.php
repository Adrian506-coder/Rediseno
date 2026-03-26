<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Checkout</title>

<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Montserrat', sans-serif;
    background:#f3efe6;
    display:flex;
    justify-content:center;
    padding:30px;
}

.container{
    width:600px;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* SECCIONES */
.section{
    margin-bottom:25px;
}

.section h3{
    border-bottom:2px solid #ddd;
    padding-bottom:5px;
    margin-bottom:10px;
    color:#2f4f2f;
}

/* INPUTS */
input{
    width:100%;
    padding:10px;
    margin:6px 0;
    border:1px solid #ccc;
    border-radius:6px;
}

/* GRID */
.row{
    display:flex;
    gap:10px;
}

.row input{
    flex:1;
}

/* PEDIDO */
.producto{
    display:flex;
    justify-content:space-between;
    margin:8px 0;
}

.total{
    text-align:right;
    font-size:18px;
    font-weight:bold;
    color:#2f4f2f;
}

/* BOTON */
button{
    width:100%;
    padding:12px;
    background:#2f4f2f;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    opacity:0.9;
}

.checkbox{
    margin-top:10px;
}

.section {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.section h3 {
  background-color: #0074D9;
  color: white;
  padding: 10px;
  margin: -20px -20px 20px -20px;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  font-size: 18px;
}

.section label {
  display: block;
  margin-bottom: 6px;
  font-weight: bold;
  color: #333;
}

.section input[type="text"],
.section input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 14px;
}

.checkbox {
  display: flex;
  align-items: center;
  margin-top: 15px;
}

.checkbox input[type="checkbox"] {
  margin: 0;
  margin-right: 8px; /* espacio justo entre cuadro y texto */
}

.checkbox label {
  margin: 0;
  font-weight: normal;
  color: #333;
}

.titulo-formulario {
    margin:0;
    background-color: #0074D9;   
    color: white;                
    text-align: center;         
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 25px;
    font-size: 22px;
    font-weight: bold;
}

</style>
</head>

<body>

<div class="container">

<form action="procesar_compra.php" method="POST" onsubmit="return validar()">

    <h2 class="titulo-formulario">Formulario de Compra</h2>

    <!-- ================= ENVÍO ================= -->
    <div class="section">
        <h3>Información de Envío</h3>

        <label>Nombre completo</label>
        <input type="text" name="nombre" required>
        <label>Correo electrónico</label>
        <input type="email" name="correo" required>
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Ciudad, Calle, Número" required>
        <label>Código Postal</label>
        <input type="text" name="cp" required>
    </div>

    <!-- ================= PEDIDO ================= -->
    <div class="section">
        <h3>Detalles del Pedido</h3>

        <div id="detalleCompra"></div>

        <div class="producto">
            <span>Envío:</span>
            <span>$5</span>
        </div>

        <div class="total" id="totalFinal"></div>
    </div>

    <!-- ================= PAGO ================= -->
    <div class="section">
        <h3>Información de Pago</h3>

        <input type="text" id="tarjeta" placeholder="Número de tarjeta" required>

        <input type="text" placeholder="Nombre en la tarjeta" required>

        <div class="row">
            <input type="text" id="fecha" placeholder="MM/AA" required>
            <input type="text" id="cvv" placeholder="CVV" required>
        </div>

        <div class="checkbox">
            <input type="checkbox" required> He leído y acepto los términos
        </div>
    </div>

    <button>💳 Confirmar compra</button>

</form>

</div>

<script>

// ================= CARRITO =================
let carrito = JSON.parse(localStorage.getItem("compraTotal")) || [];

let html = "";
let total = 0;

carrito.forEach(p => {
    html += `
        <div class="producto">
            <span>${p.nombre}</span>
            <span>$${p.precio}</span>
        </div>
    `;
    total += p.precio;
});

// ENVÍO fijo
let envio = 5;
let totalFinal = total + envio;

document.getElementById("detalleCompra").innerHTML = html;
document.getElementById("totalFinal").innerHTML = "Total: $" + totalFinal;


// ================= VALIDACIÓN =================
function validar(){

    let tarjeta = document.getElementById("tarjeta").value;
    let cvv = document.getElementById("cvv").value;

    if(tarjeta.length < 16){
        alert("Tarjeta inválida");
        return false;
    }

    if(cvv.length !== 3){
        alert("CVV inválido");
        return false;
    }

    return true;
}

</script>

</body>
</html>