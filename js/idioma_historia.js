const langBtn = document.getElementById("langToggle");

let idioma = localStorage.getItem("idioma") || "es";

const textos = {
    es: {
        texthistoria: "Desde 1956 – Tradición Italiana en Buenos Aires",
        inicio: "Inicio",
        hisoria_breadcrumb: "Historia",

        historia: "🏛 Historia",
        fundacion: "<strong>Fundada en 1956</strong> – Desde hace más de 70 años.",
        tradicion: "Tradición italiana en el barrio de La Paternal.",
        reconocida: "Reconocida en producciones de Pol-Ka: El Sodero de mi Vida, Ilusiones y Mujeres Asesinas.",
        premios: "Premios Clarín y Martín Fierro 2005.",

        ubicacion: "📍 Ubicación y Contacto",
        direccion: "Dirección",
        textDireccion: "Camarones 1901<br>Esq. Terrero 2006 – CABA",
        telefonos: "Teléfonos",
        email: "Email",
        redes: "Redes",

        especialidad: "🍝 Especialidades",
        especialidad1: "Mondongo a la Italiana",
        especialidad2: "Riñones al vino blanco",
        especialidad3: "Tallarines al verdeo con longaniza",
        especialidad4: "Calamarettis a la escarpeta",
        especialidad5: "Fusiles al ferretto",
        especialidad6: "Ranas a la provenzal",
        especialidad7: "Caracoles a la bordalesa",
        especialidad8: "Rabas a la Calabria",
        especialidad9: "Merluza al ajillo",
        especialidad10: "Gambas al ajillo",

        postres: "🍰 Postres",
        postre1: "Tiramisú Calabrés",
        postre2: "Postre Chicholina",
        postre3: "Postre Mateo",
        postre4: "Flan casero",
        postre5: "Kinotos en almíbar",
        postre6: "Cerezas flambe con helado",

        mision:"🎯 Misión",
        misionTexto:"Brindar una experiencia gastronómica auténtica, manteniendo la tradición italiana y un ambiente familiar.",
        vision:"👁️ Visión",
        visiontexto:"Ser una de las cantinas italianas más reconocidas, destacando por calidad, tradición y servicio.",

        foda:"📊 Análisis FODA",
        fortalezas:"Fortalezas",
        fortaleza1:"Trdiciones desde 1956",
        fortaleza2:"Recetas auténticas",
        fortaleza3:"Ambiente familiar",
        fortaleza4:"Reconocimiento",
        oportunidades:"Oportunidades",
        oportunidad1:"Redes sociales",
        oportunidad2:"Turismo gastronómico",
        oportunidad3:"Reservas online",
        oportunidad4:"Expansión digital",
        debilidades:"Debilidades",
        debilidad1:"Poca presencia digital",
        debilidad2:"Espacio limitado",
        debilidad3:"Dependencia local",
        debilidad4:"Modernización baja",
        amenazas:"Amenazas",
        amenaza1:"Competencia",
        amenaza2:"Cambios en tendencias",
        amenaza3:"Situación económica",
        amenaza4:"Aumento de costos",

        lema: "“Una familia para servirlo”",
        lema2: "“Somos los verdaderos… ¡los demás nos imitan!”",
        volver: "Volver al Inicio"
    },
    en: {
        texthistoria: "Since 1956 – Italian Tradition in Buenos Aires",
        inicio: "Home",
        hisoria_breadcrumb: "History",

        historia: "🏛 History",
        fundacion: "<strong>Founded in 1956</strong> – More than 70 years ago.",
        tradicion: "Italian tradition in the neighborhood of La Paternal.",
        reconocida: "Recognized in productions of Pol-Ka: The Sodero of My Life, Illusions and Murderesses.",
        premios: "Clarín and Martín Fierro Awards 2005.",

        ubicacion: "📍 Location and Contact",
        direccion: "Address",
        textDireccion: "Camarones 1901<br>Esq. Terrero 2006 – CABA",
        telefonos: "Phone Numbers",
        email: "Email",
        redes: "Social Media", 

        especialidad: "🍝 Specialties",
        especialidad1: "Mondongo a la Italiana",
        especialidad2: "Riñones al vino blanco",
        especialidad3: "Tallarines al verdeo con longaniza",
        especialidad4: "Calamarettis a la escarpeta",
        especialidad5: "Fusiles al ferretto",
        especialidad6: "Ranas a la provenzal",
        especialidad7: "Caracoles a la bordalesa",
        especialidad8: "Rabas a la Calabria",
        especialidad9: "Merluza al ajillo",
        especialidad10: "Gambas al ajillo",

        postres: "🍰 Desserts",
        postre1: "Tiramisú Calabrés",
        postre2: "Postre Chicholina",
        postre3: "Postre Mateo",
        postre4: "Homemade Flan",
        postre5: "Kinotos in syrup",
        postre6: "Cherries flambe with ice cream",

        mision:"Mission",
        misionTexto:"Provide an authentic gastronomic experience, maintaining Italian tradition and a family atmosphere.",
        vision:"Vision",
        visiontexto:"To be one of the most recognized Italian cantinas, standing out for quality, tradition and service.",

        foda:"SWOT Analysis",
        fortalezas:"Strengths",
        fortaleza1:"Traditions since 1956",
        fortaleza2:"Authentic recipes",
        fortaleza3:"Family atmosphere",
        fortaleza4:"Recognition",
        oportunidades:"Opportunities",
        oportunidad1:"Social media",
        oportunidad2:"Gastronomic tourism",
        oportunidad3:"Online reservations",
        oportunidad4:"Digital expansion",
        debilidades:"Weaknesses",
        debilidad1:"Low digital presence",
        debilidad2:"Limited space",
        debilidad3:"Local dependency",
        debilidad4:"Low modernization",
        amenazas:"Threats",
        amenaza1:"Competition",
        amenaza2:"Changing trends",
        amenaza3:"Economic situation",
        amenaza4:"Rising costs",

        lema: "“A family to serve you”",
        lema2: "“We are the real ones... the others imitate us!”",
        volver: "Back to Home"
    }
};

function cambiarIdioma(lang){

    document.getElementById("texthistoria").innerText = textos[lang].texthistoria;
    document.getElementById("inicio").innerText = textos[lang].inicio;
    document.getElementById("historia_breadcrumb").innerText = textos[lang].hisoria_breadcrumb;

    document.getElementById("historia").innerText = textos[lang].historia;
    document.getElementById("fundacion").innerHTML = textos[lang].fundacion;
    document.getElementById("tradicion").innerHTML = textos[lang].tradicion;
    document.getElementById("reconocida").innerHTML = textos[lang].reconocida;
    document.getElementById("premios").innerHTML = textos[lang].premios;

    document.getElementById("ubicacion").innerText = textos[lang].ubicacion;
    document.getElementById("direccion").innerText = textos[lang].direccion;
    document.getElementById("telefonos").innerText = textos[lang].telefonos;
    document.getElementById("email").innerText = textos[lang].email;
    document.getElementById("redes").innerText = textos[lang].redes;

    document.getElementById("especialidad").innerText = textos[lang].especialidad;
    document.getElementById("especialidad1").innerText = textos[lang].especialidad1;
    document.getElementById("especialidad2").innerText = textos[lang].especialidad2;
    document.getElementById("especialidad3").innerText = textos[lang].especialidad3;
    document.getElementById("especialidad4").innerText = textos[lang].especialidad4;
    document.getElementById("especialidad5").innerText = textos[lang].especialidad5;
    document.getElementById("especialidad6").innerText = textos[lang].especialidad6;
    document.getElementById("especialidad7").innerText = textos[lang].especialidad7;
    document.getElementById("especialidad8").innerText = textos[lang].especialidad8;
    document.getElementById("especialidad9").innerText = textos[lang].especialidad9;
    document.getElementById("especialidad10").innerText = textos[lang].especialidad10;

    document.getElementById("postres").innerText = textos[lang].postres;
    document.getElementById("postre1").innerText = textos[lang].postre1;
    document.getElementById("postre2").innerText = textos[lang].postre2;
    document.getElementById("postre3").innerText = textos[lang].postre3;
    document.getElementById("postre4").innerText = textos[lang].postre4;
    document.getElementById("postre5").innerText = textos[lang].postre5;
    document.getElementById("postre6").innerText = textos[lang].postre6;

    document.getElementById("mision").innerText = textos[lang].mision;
    document.getElementById("misionTexto").innerText = textos[lang].misionTexto;
    document.getElementById("vision").innerText = textos[lang].vision;
    document.getElementById("visiontexto").innerText = textos[lang].visiontexto;

    document.getElementById("foda").innerText = textos[lang].foda;
    document.getElementById("fortalezas").innerText = textos[lang].fortalezas;
    document.getElementById("fortaleza1").innerText = textos[lang].fortaleza1;
    document.getElementById("fortaleza2").innerText = textos[lang].fortaleza2;
    document.getElementById("fortaleza3").innerText = textos[lang].fortaleza3;
    document.getElementById("fortaleza4").innerText = textos[lang].fortaleza4;
    document.getElementById("oportunidades").innerText = textos[lang].oportunidades;
    document.getElementById("oportunidad1").innerText = textos[lang].oportunidad1;
    document.getElementById("oportunidad2").innerText = textos[lang].oportunidad2;
    document.getElementById("oportunidad3").innerText = textos[lang].oportunidad3;
    document.getElementById("oportunidad4").innerText = textos[lang].oportunidad4;
    document.getElementById("debilidades").innerText = textos[lang].debilidades;
    document.getElementById("debilidad1").innerText = textos[lang].debilidad1;
    document.getElementById("debilidad2").innerText = textos[lang].debilidad2;
    document.getElementById("debilidad3").innerText = textos[lang].debilidad3;
    document.getElementById("debilidad4").innerText = textos[lang].debilidad4;
    document.getElementById("amenazas").innerText = textos[lang].amenazas;
    document.getElementById("amenaza1").innerText = textos[lang].amenaza1;
    document.getElementById("amenaza2").innerText = textos[lang].amenaza2;
    document.getElementById("amenaza3").innerText = textos[lang].amenaza3;
    document.getElementById("amenaza4").innerText = textos[lang].amenaza4;

    document.getElementById("lema").innerText = textos[lang].lema;
    document.getElementById("lema2").innerText = textos[lang].lema2;
    document.getElementById("Volver").innerText = textos[lang].volver;

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