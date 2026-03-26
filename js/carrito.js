// -----------------------------
// Carrito de compras simulado
// -----------------------------
let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

// Botón “Agregar al carrito” desde productos
function agregarCarrito(nombre, precio){
    carrito.push({nombre, precio});
    guardarCarrito();
    mostrarCarrito();
    mostrarToast(nombre);
}

// Mostrar carrito y total
function mostrarCarrito(){
    const lista = document.getElementById("lista-carrito");
    const totalElemento = document.getElementById("total");

    if(!lista || !totalElemento) return;

    lista.innerHTML = "";
    let total = 0;

    carrito.forEach((producto, index) => {
        total += producto.precio;
        lista.innerHTML += `
            <li>
                ${producto.nombre} - $${producto.precio}
                <button onclick="eliminarProducto(${index})">❌</button>
            </li>
        `;
    });

    totalElemento.innerText = total;
}

// Eliminar producto
function eliminarProducto(index){
    carrito.splice(index, 1);
    guardarCarrito();
    mostrarCarrito();
}

// Vaciar carrito
function vaciarCarrito(){
    carrito = [];
    guardarCarrito();
    mostrarCarrito();
}

function mostrarToast(nombre){
    const toast = document.getElementById("toast");

    if(!toast) return;

    toast.textContent = "✔ " + nombre + " agregado al carrito";
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 2000);
}

// Guardar en localStorage
function guardarCarrito(){
    localStorage.setItem("carrito", JSON.stringify(carrito));
}

// Mostrar carrito al cargar la página
document.addEventListener("DOMContentLoaded", mostrarCarrito);

// -----------------------------
// Toggle del carrito (Ver Carrito)
// -----------------------------
// Mostrar carrito al presionar "Ver Carrito"
const carritoToggle = document.getElementById("carritoToggle");
const carritoFloat = document.getElementById("carritoFloat");
const cerrarCarrito = document.getElementById("cerrarCarrito");

if(carritoToggle && carritoFloat){
    carritoToggle.addEventListener("click", () => {
        carritoFloat.classList.add("show");
    });
}

if(cerrarCarrito && carritoFloat){
    cerrarCarrito.addEventListener("click", () => {
        carritoFloat.classList.remove("show");
    });
}

// Cerrar carrito
cerrarCarrito.addEventListener("click", () => {
    carritoFloat.classList.remove("show");
});

function comprarProductos() {

    if(carrito.length === 0){
        alert("El carrito está vacío 🛒");
        return;
    }

    // Guardar carrito completo para checkout
    localStorage.setItem("compraTotal", JSON.stringify(carrito));

    // Redirigir a formulario
    window.location.href = "checkout.php";
}

// function comprarProductos() {
//     if(carrito.length === 0){
//         alert("El carrito está vacío 😅");
//         return;
//     }

//     let detalle = "<ul>";
//     let total = 0;

//     carrito.forEach(p => {
//         detalle += `<li>${p.nombre} - $${p.precio}</li>`;
//         total += p.precio;
//     });

//     detalle += `</ul><h3>Total: $${total}</h3>`;

//     document.getElementById("detalleCompra").innerHTML = detalle;
//     document.getElementById("modalCompra").style.display = "block";

//     // Vaciar carrito
//     vaciarCarrito();
//     carritoFloat.classList.remove("show");
// }

function cerrarModal() {
    document.getElementById("modalCompra").style.display = "none";
}

