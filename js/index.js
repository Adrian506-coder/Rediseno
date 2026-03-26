function cargarProductos(){
    fetch("bd/obtener_destacados.php")
    .then(response => response.json())
    .then(data => {

        const contenedor = document.getElementById("contenedor-productos");
        contenedor.innerHTML = "";

        data.forEach(producto => {

            contenedor.innerHTML += `
                <div class="card">
                    <img src="img/platillos/${producto.imagen}" alt="${producto.nombre}">
                    <h3>${producto.nombre}</h3>
                    <p>${producto.descripcion}</p>
                    <div class="price">$${producto.precio}</div>
                    <br>
                    <div class="card-buttons">
                        <a href="menu.php" class="btn green">Ver Menú</a>
                        <button class="btn orange" onclick="agregarCarrito('${producto.nombre}', ${producto.precio})">
                            🛒 Agregar al carrito
                        </button>
                    </div>
                </div>
            `;
        });

    })
    .catch(error => console.log("Error:", error));
    setInterval(cargarProductos, 15000);
}

const toggleBtn = document.getElementById("modoToggle");

if(localStorage.getItem("modo") === "oscuro"){
    document.body.classList.add("dark-mode");
    toggleBtn.textContent = "☀️";
}

toggleBtn.addEventListener("click", () => {

    document.body.classList.toggle("dark-mode");

    if(document.body.classList.contains("dark-mode")){
        localStorage.setItem("modo","oscuro");
        toggleBtn.textContent = "☀️";
    } else {
        localStorage.setItem("modo","claro");
        toggleBtn.textContent = "🌙";
    }

});

document.addEventListener("DOMContentLoaded", cargarProductos);

