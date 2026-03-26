<?php
session_start();
include("bd/conexion.php");

// Determinar si es admin
$modo_admin = isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';

// Manejo de acciones CRUD
$accion = isset($_GET['accion']) ? $_GET['accion'] : '';
$mensaje = '';

// ======================
// CRUD SOLO ADMIN
// ======================
if($modo_admin) {

    // CREAR PRODUCTO
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {

        $nombre = pg_escape_string($conn, $_POST['nombre']);
        $descripcion = pg_escape_string($conn, $_POST['descripcion']);
        $precio = pg_escape_string($conn, $_POST['precio']);

        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {

            $sql = "INSERT INTO menu (nombre, descripcion, precio) 
                    VALUES ('$nombre', '$descripcion', '$precio')";

            if (pg_query($conn, $sql)) {
                $mensaje = "<div class='alerta alerta-exito'>Producto agregado correctamente</div>";
            } else {
                $mensaje = "<div class='alerta alerta-error'>Error al agregar el producto</div>";
            }

        } else {
            $mensaje = "<div class='alerta alerta-error'>Todos los campos son obligatorios</div>";
        }
    }

    // ACTUALIZAR PRODUCTO
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {

        $id = intval($_POST['id']);
        $nombre = pg_escape_string($conn, $_POST['nombre']);
        $descripcion = pg_escape_string($conn, $_POST['descripcion']);
        $precio = pg_escape_string($conn, $_POST['precio']);

        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {

            $sql = "UPDATE menu 
                    SET nombre='$nombre', descripcion='$descripcion', precio='$precio' 
                    WHERE idmenu=$id";

            if (pg_query($conn, $sql)) {
                $mensaje = "<div class='alerta alerta-exito'>Producto actualizado correctamente</div>";
                $accion = '';
            } else {
                $mensaje = "<div class='alerta alerta-error'>Error al actualizar el producto</div>";
            }

        } else {
            $mensaje = "<div class='alerta alerta-error'>Todos los campos son obligatorios</div>";
        }
    }

    // ELIMINAR PRODUCTO
    if (isset($_GET['eliminar'])) {

        $id = intval($_GET['eliminar']);
        $sql = "DELETE FROM menu WHERE idmenu=$id";

        if (pg_query($conn, $sql)) {
            $mensaje = "<div class='alerta alerta-exito'>Producto eliminado correctamente</div>";
        } else {
            $mensaje = "<div class='alerta alerta-error'>Error al eliminar el producto</div>";
        }
    }

    // OBTENER PRODUCTO PARA EDITAR
    $producto_editar = null;

    if ($accion == 'editar' && isset($_GET['id'])) {

        $id = intval($_GET['id']);
        $sql = "SELECT * FROM menu WHERE idmenu=$id";
        $resultado_editar = pg_query($conn, $sql);

        if ($resultado_editar) {
            $producto_editar = pg_fetch_assoc($resultado_editar);
        }
    }
}

// ======================
// OBTENER PRODUCTOS
// ======================
$sql = "SELECT * FROM menu ORDER BY idmenu DESC";
$resultado = pg_query($conn, $sql);

// ======================
// CONTACTO
// ======================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contacto'])) {

    $nombre = pg_escape_string($conn, $_POST['nombre_contacto']);
    $correo = pg_escape_string($conn, $_POST['correo_contacto']);
    $mensaje_contacto = pg_escape_string($conn, $_POST['mensaje_contacto']);

    if (!empty($nombre) && !empty($correo) && !empty($mensaje_contacto)) {

        $sql = "INSERT INTO mensajes (nombre, correo, mensaje)
                VALUES ('$nombre','$correo','$mensaje_contacto')";

        if (pg_query($conn, $sql)) {
            header("Location: index.php?mensaje=ok");
            exit();
        } else {
            header("Location: index.php?mensaje=error");
            exit();
        }

    } else {
        $mensaje = "<div class='alerta alerta-error'>Por favor complete todos los campos</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menú - Cantina Chichilo</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/menu.css">

</head>
<body>

<header class="admin-header">
    <span>GESTIONAR MENÚ - CANTINA CHICHILO</span>
    <div class="breadcrumb">
        <a href="index.php">Inicio</a> > 
        <a href="menu.php">Menú</a> > 

        <?php 
        if($accion == 'agregar'){
            echo "<span>Agregar Producto</span>";
        } elseif($accion == 'editar'){
            echo "<span>Editar Producto</span>";
        } else {
            echo "<span>Lista de Productos</span>";
        }
        ?>
    </div>
    <div class="header-actions">
        <button id="modoToggle" class="modo-btn">🌙</button>
        <?php if($modo_admin): ?><a href="logout.php" class="logout-btn">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php" class="logout-btn">Iniciar sesión</a>
        <?php endif; ?>
    </div>
</header>



<div class="container">
        
    <!-- BOTONES DE NAVEGACIÓN -->
    <div class="nav-botones">
        <?php if($modo_admin): ?>    
            <button class="btn-nav <?php echo ($accion == '' || ($accion == 'editar' && !$producto_editar)) ? '' : ''; ?>" onclick="location.href='menu.php'">Ver Productos</button>
            <button class="btn-nav" onclick="location.href='menu.php?accion=agregar'">Agregar Producto</button>
        <?php endif; ?>
        <a href="index.php" class="btn-nav" style="background: #666;">Volver al Inicio</a>
    </div>

    <!-- MENSAJES -->
    <?php echo $mensaje; ?>
    
    <?php if($modo_admin): ?>
        <!-- SECCIÓN: AGREGAR PRODUCTO -->
        <?php if ($accion == 'agregar'): ?>
        <div class="formulario-container">
            <h2>Agregar Nuevo Producto</h2>
            <form method="POST">
                <div class="form-grupo">
                    <label for="nombre">Nombre del Platillo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-grupo">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="form-grupo">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" required>
                </div>
                <div class="form-botones">
                    <button type="submit" name="crear" class="btn-enviar">Agregar Producto</button>
                    <a href="menu.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($modo_admin): ?>
        <!-- SECCIÓN: EDITAR PRODUCTO -->
        <?php if ($accion == 'editar' && $producto_editar): ?>
        <div class="formulario-container">
            <h2>Editar Producto</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $producto_editar['IdMenu']; ?>">
                <div class="form-grupo">
                    <label for="nombre">Nombre del Platillo:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto_editar['Nombre']); ?>" required>
                </div>
                <div class="form-grupo">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($producto_editar['Descripcion']); ?></textarea>
                </div>
                <div class="form-grupo">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($producto_editar['Precio']); ?>" required>
                </div>
                <div class="form-botones">
                    <button type="submit" name="actualizar" class="btn-enviar">Actualizar Producto</button>
                    <a href="menu.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <div id="toast" class="toast"></div>

    <!-- SECCIÓN: MOSTRAR PRODUCTOS -->
    <div class="tabla-container">
        <div class="header-tabla">
            <h2>Lista de Productos</h2>
            <input type="text" id="buscador" placeholder="🔍 Buscar producto..." onkeyup="buscarProducto()">
        </div>
        <br>
        <?php 
        if ($resultado && $resultado->num_rows > 0):
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Platillo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <?php if(!$modo_admin): ?><th>Comprar</th><?php endif; ?>
                    <?php if($modo_admin): ?><th>Acciones</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <tr class="producto">
                        <td><?php echo $fila['IdMenu']; ?></td>
                        <td class="nombre"><?php echo htmlspecialchars($fila['Nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['Descripcion']); ?></td>
                        <td class="price">$<?php echo number_format($fila['Precio'], 2); ?></td>
                        <?php if(!$modo_admin): ?><td>
                            <button class="btn-carrito"
                                onclick="agregarCarrito('<?php echo htmlspecialchars($fila['Nombre']); ?>', <?php echo $fila['Precio']; ?>)">
                                🛒 Agregar
                            </button>
                        </td><?php endif; ?>
                        <?php if($modo_admin): ?><td>
                            <a href="menu.php?accion=editar&id=<?php echo $fila['IdMenu']; ?>" class="btn-accion btn-editar">Editar</a>
                            <a href="menu.php?eliminar=<?php echo $fila['IdMenu']; ?>" class="btn-accion btn-eliminar" onclick="return confirm('¿Está seguro que desea eliminar este producto?');">Eliminar</a>
                        </td><?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php 
        else:
        ?>
        <div class="vacio">
            <p>No hay productos registrados. <a href="menu.php?accion=agregar">Agregar uno ahora</a></p>
        </div>
        <?php 
        endif;
        ?>
    </div>

<script>


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

function buscarProducto(){
    let input = document.getElementById("buscador").value.toLowerCase();
    let filas = document.querySelectorAll("tbody .producto");

    filas.forEach(fila => {
        let texto = fila.textContent.toLowerCase();

        if(texto.includes(input)){
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }
    });
}
</script>
<script src="js/carrito.js"></script>
</body>
</html>
