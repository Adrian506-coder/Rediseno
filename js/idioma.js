const langBtn = document.getElementById("langToggle");

let idioma = localStorage.getItem("idioma") || "es";

const textos = {
    es: {
        menu_Inicio: "Inicio",
        menu_Nosotros: "Sobre Nosotros",
        menu_Galeria: "Galería",

        carritoToggle: "Ver Carrito",
        carrito: "🛒 Carrito",
        vaciarCarrito: "Vaciar carrito",
        comprar: "Comprar",

        tituloHero: "TALLARINES AL VERDEO",
        subtituloHero: "Cocina Italiana Calabresa desde 1956",
        btnMenu: "Ver Menú",
        btnContacto: "Contacto",

        tituloPlatillos: "PLATILLOS DESTACADOS",

        tituloNosotros: "Sobre Nosotros",
        textoNosotros: "Desde 1956, Cantina Chichilo representa la tradición italiana en Buenos Aires. Cada receta conserva el sabor auténtico de Calabria y el ambiente familiar que nos caracteriza.",
        direccion: "CANTINA ITALIANA CHICHILO DE BUENOS AIRES\nCAMARONES 1901 ESQUINA TERRERO 2006\n(1416) CAPITAL FEDERAL - REPUBLICA ARGENTINA",
        btnHistoria: "Leer Mas",

        tituloGaleria: "GALERÍA",
        tituloUbicacion: "UBICACIÓN",
        tituloContacto: "CANTINA CHICHILO DE BUENOS AIRES",
        informacion_Contacto: "Informacion de Contacto",
        direccion_Footer: "CANTINA ITALIANA CHICHILO DE BUENOS AIRES\nCAMARONES 1901 ESQUINA TERRERO 2006\n(1416) CAPITAL FEDERAL - REPUBLICA ARGENTINA\nTel: 011-4771-1234\nEmail: chichilo3554@hotmail.com\nVisite nuestro album de fotos\nESERVAS AL TELEFONO: 011-4771-1234 ** 011-45841263\nABIERTO DE JUEVES  A SABADOS DE NOCHE - SABADOS Y DOMINGOS ALMUERZOS.",
        tituloContactoForm: "Contáctanos",
        nombrePlaceholder: "Nombre",
        emailPlaceholder: "Email",
        mensajePlaceholder: "Mensaje",
        btnEnviar: "Enviar Mensaje",
        footerBottom:"© Cantina Chichilo",
        footerContent:"© 2026 Cantina Chichilo <b>cantinachichilo@cantinachichilo.com.ar</b>- Cocina Italiana Calabresa"

    },
    en: {
        menu_Inicio: "Home",
        menu_Nosotros: "About Us",
        menu_Galeria: "Gallery",
        
        carritoToggle: "View Cart",
        carrito: "🛒 Cart",
        vaciarCarrito: "Clear Cart",
        comprar: "Buy",

        tituloHero: "Noodles with Green Onion",
        subtituloHero: "Calabrian Italian Cuisine since 1956",
        btnMenu: "View Menu",
        btnContacto: "Contact",

        tituloPlatillos: "FEATURED DISHES",
        tituloNosotros: "About Us",
        textoNosotros: "Since 1956, Cantina Chichilo represents the Italian tradition in Buenos Aires. Each recipe preserves the authentic flavor of Calabria and the family atmosphere that defines us.",
        direccion: "CANTINA ITALIANA CHICHILO OF BUENOS AIRES\nCAMARONES 1901 ESQUINA TERRERO 2006\n(1416) CAPITAL FEDERAL - REPUBLICA ARGENTINA",
        btnHistoria: "Read More",
        tituloGaleria: "GALLERY",
        tituloUbicacion: "LOCATION",
        tituloContacto: "CANTINA CHICHILO OF BUENOS AIRES",
        informacion_Contacto: "Contact Information",
        direccion_Footer: "CANTINA ITALIANA CHICHILO OF BUENOS AIRES\nCAMARONES 1901 ESQUINA TERRERO 2006\n(1416) CAPITAL FEDERAL - ARGENTINE REPUBLIC\nPhone: 011-4771-1234\nEmail: chichilo3554@hotmail.com\nVisit our photo album\nReservations at phone: 011-4771-1234 ** 011-4584-1263\nOPEN THURSDAYS TO SATURDAYS NIGHT - SATURDAYS AND SUNDAYS LUNCHES.",
        tituloContactoForm: "Contact Us",
        nombrePlaceholder: "Your Name",
        emailPlaceholder: "Your Email",
        mensajePlaceholder: "Your Message",
        btnEnviar: "Send Message",
        footerBottom:"© Cantina Chichilo",
        footerContent:"© 2026 Cantina Chichilo <b>cantinachichilo@cantinachichilo.com.ar</b>- Calabrian Italian Cuisine"

    }
};

function cambiarIdioma(lang){

    document.getElementById("menu_Inicio").innerText = textos[lang].menu_Inicio;
    document.getElementById("menu_Nosotros").innerText = textos[lang].menu_Nosotros;
    document.getElementById("menu_Galeria").innerText = textos[lang].menu_Galeria;

    document.getElementById("carritoToggle").innerText = textos[lang].carritoToggle;
    document.getElementById("carrito").innerText = textos[lang].carrito;
    document.getElementById("vaciarCarrito").innerText = textos[lang].vaciarCarrito;
    document.getElementById("comprar").innerText = textos[lang].comprar;

    document.getElementById("tituloHero").innerText = textos[lang].tituloHero;
    document.getElementById("subtituloHero").innerText = textos[lang].subtituloHero;
    document.getElementById("btnMenu").innerText = textos[lang].btnMenu;
    document.getElementById("btnContacto").innerText = textos[lang].btnContacto;

    document.getElementById("tituloPlatillos").innerText = textos[lang].tituloPlatillos;
    document.getElementById("tituloNosotros").innerText = textos[lang].tituloNosotros;

    document.getElementById("textoNosotros").innerText = textos[lang].textoNosotros;
    document.getElementById("direccion").innerText = textos[lang].direccion;
    document.getElementById("btnHistoria").innerText = textos[lang].btnHistoria;

    document.getElementById("tituloGaleria").innerText = textos[lang].tituloGaleria;
    document.getElementById("tituloUbicacion").innerText = textos[lang].tituloUbicacion;

    document.getElementById("tituloContacto").innerText = textos[lang].tituloContacto;
    document.getElementById("informacion_contacto").innerText = textos[lang].informacion_Contacto;

    document.getElementById("direccion_footer").innerHTML =
        textos[lang].direccion_Footer.replace(/\n/g, "<br>");

    document.getElementById("tituloContactoForm").innerText = textos[lang].tituloContactoForm;

    document.getElementById("nombre_contacto").placeholder = textos[lang].nombrePlaceholder;
    document.getElementById("correo_contacto").placeholder = textos[lang].emailPlaceholder;
    document.getElementById("mensaje_contacto").placeholder = textos[lang].mensajePlaceholder;

    document.getElementById("btnEnviar").innerText = textos[lang].btnEnviar;
    document.getElementById("footerBottom").innerText = textos[lang].footerBottom;

    document.getElementById("footerContent").innerHTML = textos[lang].footerContent;

    langBtn.textContent = lang === "es" ? "EN" : "ES";
    localStorage.setItem("idioma", lang);
}

document.addEventListener("DOMContentLoaded", () => {
    
    cambiarIdioma(idioma);

    langBtn.addEventListener("click", () => {
        idioma = idioma === "es" ? "en" : "es";
        cambiarIdioma(idioma);
    });

});