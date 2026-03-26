<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cantina Chichilo</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<div id="modalCompra" class="modal">
  <div class="modal-contenido">
    <h2>✅ Compra realizada</h2>
    <div id="detalleCompra"></div>
    <button onclick="cerrarModal()">Cerrar</button>
  </div>
</div>

<div id="toast" class="toast"></div>

<div class="top-bar"></div>

<header>
    <div class="logo">
        <img src="img/Logo.png" >
    </div>

    <nav>
        <a href="#inicio" id="menu_Inicio">Inicio</a>
        <a href="#Nosotros" id="menu_Nosotros">Sobre Nosotros</a>
        <a href="#Galeria" id="menu_Galeria">Galería</a>
    </nav>

    <div class="phone">
        <i class="bi bi-telephone-fill"><a> (054)011-4584-1263</a></i>
    </div>
    <div class="header-buttons">
        <button id="carritoToggle" class="btn blue">🛒 Ver Carrito</button>
        <div class="side-buttons">
            <button id="modoToggle" class="modo-btn no-escalar">🌙</button>
            <button id="langToggle" class="modo-btn no-escalar">EN</button>
            <button id="textToggle" class="modo-btn no-escalar">A+</button>
        </div>
    </div>
    
</header>

<div class="carrito-float" id="carritoFloat">
    <div class="carrito-header">
        <h3 id="carrito">🛒 Carrito</h3>
        <button id="cerrarCarrito">✖</button>
    </div>

    <ul id="lista-carrito"></ul>

    <p><strong>Total: $<span id="total">0</span></strong></p>

    <div class="carrito-actions">
        <button onclick="vaciarCarrito()" id="vaciarCarrito">Vaciar carrito</button>
        <button onclick="comprarProductos()" id="comprar">Comprar</button>
    </div>
</div>

<section id="inicio" class="hero">
    <div class="hero-content">
        <h2 id="tituloHero">TALLARINES AL VERDEO</h2>
        <p id="subtituloHero">Cocina Italiana Calabresa desde 1956</p>
        <br>
        <br>
        <a href="menu.php" class="btn green" id="btnMenu">Ver Menú</a>
        <a href="#contacto" class="btn red" id="btnContacto">Contacto</a>
    </div>
</section>
<!-- Platillos principales -->
<section id="Menu" class="section">
    <h2 class="section-title" id="tituloPlatillos">PLATILLOS DESTACADOS</h2>

    <div class="cards" id="contenedor-productos">
    </div>
</section>

<section id="Nosotros" class="section about">
    <img src="img/Gemini_Generated_Image_5oxnr65oxnr65oxn.png">
    <div class="about-text">
        <h2 class="section-title" id="tituloNosotros">Sobre Nosotros</h2>
        <p id="textoNosotros">
            Desde 1956, Cantina Chichilo representa la tradición italiana en Buenos Aires.
            Cada receta conserva el sabor auténtico de Calabria y el ambiente familiar
            que nos caracteriza.
        </p>
        <br>
        <p id="direccion">
            CANTINA ITALIANA CHICHILO DE BUENOS AIRES
            CAMARONES 1901 ESQUINA TERRERO 2006
            (1416) CAPITAL FEDERAL - REPUBLICA ARGENTINA
        </p>
        <br>
        
        <br>
        <a href="historia.html" class="btn green" id="btnHistoria">Leer Mas</a>
    </div>
</section>

<section id="Galeria" class="section">
    <h2 class="section-title" id="tituloGaleria">GALERÍA</h2>
    <div class="gallery">
        <img src="img/galeria/Gemini_Generated_Image_ccoen0ccoen0ccoe.png">
        <img src="img/galeria/Gemini_Generated_Image_mkvbdemkvbdemkvb.png">
        <img src="img/galeria/Gemini_Generated_Image_x4mpn6x4mpn6x4mp.png">
        <img src="img/galeria/Gemini_Generated_Image_6o5gx36o5gx36o5g.png">
        <img src="img/galeria/Gemini_Generated_Image_t9yov5t9yov5t9yo.png">
        <img src="https://images.unsplash.com/photo-1585238342024-78d387f4a707">
        <img src="img/galeria/Gemini_Generated_Image_nvqpfznvqpfznvqp.png">
        <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092">
    </div>
</section>

<section id="ubicacion" class="section">
    <h2 class="section-title" id="tituloUbicacion">UBICACIÓN</h2>

    <div class="mapa-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!3m2!1ses-419!2smx!4v1773903382645!5m2!1ses-419!2smx!6m8!1m7!1s27eDYnCyEkRxVmKhrGN8SQ!2m2!1d-34.60609193475045!2d-58.46810866804712!3f278.91820222515764!4f3.0142318464487374!5f0.7820865974627469"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</section>

<style>
/* Footer styles (minimal, adapt in styles.css if desired) */
.site-footer{background:#1c1c1c;color:#fff;padding:40px 0;margin-top:40px}
.footer-container{width:90%;max-width:1200px;margin:0 auto;display:flex;gap:30px;flex-wrap:wrap}
.footer-info,.footer-form{flex:1;min-width:250px}
.footer-info h3{font-family:'Playfair Display',serif;margin-bottom:10px;color:#fff}
.footer-info p,.footer-info a{color:#ddd;line-height:1.6;text-decoration:none}
.footer-form form input,.footer-form form textarea{width:100%;padding:10px;margin-bottom:10px;border-radius:5px;border:1px solid #ddd}
.footer-form .btn-enviar{background:#ffb300;color:#111;padding:10px 15px;border-radius:5px;border:none;cursor:pointer}
.field-error{color:#f44336;font-size:13px;margin-bottom:6px}
.footer-bottom{text-align:center;color:#ccc;margin-top:20px;font-size:13px}
</style>

<footer class="site-footer" id="contacto">
    <div class="footer-container">
        <div class="footer-info">
            <h3 id="tituloContacto">CANTINA CHICHILO DE BUENOS AIRES</h3>
            <p id="informacion_contacto"><strong>Informacion de Contacto</strong></p>
            <p id="direccion_footer">
            CANTINA ITALIANA CHICHILO DE BUENOS AIRES<br>
            CAMARONES 1901 ESQUINA TERRERO 2006<br>
            (1416) CAPITAL FEDERAL - REPUBLICA ARGENTINA<br>
            TELEFONO:011-*4581-1984**4584-1263<br>
            E-MAIL: chichilo3554@hotmail.com<br>
            Visite nuestro album de fotos<br>
            RESERVAS AL TELEFONO: 011-4581-1984 ** 011-4584-1263<br>
            ABIERTO DE JUEVES  A SABADOS DE NOCHE - SABADOS Y DOMINGOS ALMUERZOS .
            </p>
        </div>
        <div class="footer-form">
            <h3 id="tituloContactoForm">Contacto</h3>
            <form method="POST" action="menu.php" id="contact-form">
                <label for="nombre_contacto" id="nombrePlaceholder">Nombre</label>
                <input type="text" id="nombre_contacto" name="nombre_contacto" placeholder="Nombre" required>
                <div class="field-error" id="error-nombre"></div>

                <label for="correo_contacto" id="emailPlaceholder">Correo</label>
                <input type="email" id="correo_contacto" name="correo_contacto" placeholder="Correo" required>
                <div class="field-error" id="error-correo"></div>

                <label for="mensaje_contacto" id="mensajePlaceholder">Mensaje</label>
                <textarea id="mensaje_contacto" name="mensaje_contacto" placeholder="Mensaje" required></textarea>
                <div class="field-error" id="error-mensaje"></div>

                <div id="contact-feedback" role="status" aria-live="polite"></div>

                <button type="submit" name="contacto" class="btn-enviar" id="btnEnviar">Enviar Mensaje</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom" id="footerBottom">© Cantina Chichilo</div>
</footer>

<footer>
    <div class="bottom-bar"></div>
    <div class="footer-content" id="footerContent">
        © 2026 Cantina Chichilo <b>cantinachichilo@cantinachichilo.com.ar</b>- Cocina Italiana Calabresa
        
    </div>
</footer>

<script>
const textBtn = document.getElementById("textToggle");

if(localStorage.getItem("texto") === "grande"){
    document.body.classList.add("texto-grande");
    textBtn.textContent = "A-";
}

textBtn.addEventListener("click", () => {

    document.body.classList.toggle("texto-grande");

    if(document.body.classList.contains("texto-grande")){
        localStorage.setItem("texto","grande");
        textBtn.textContent = "A-";
    } else {
        localStorage.setItem("texto","normal");
        textBtn.textContent = "A+";
    }

});
</script>

<script src="js/index.js"></script>
<script src="js/contact.js"></script>
<script src="js/idioma.js"></script>
<script src="js/carrito.js"></script>
</body>
</html>