<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .contenedor {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
            color: #003366;
        }

        .btn-toggle {
            background-color: #003366;
            color: white;
            border: none;
            padding: 12px 20px;
            margin: 10px auto;
            display: block;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            width: fit-content;
            transition: background-color 0.3s ease;
        }

        .btn-toggle:hover {
            background-color: #002244;
        }

        .panel {
            display: none;
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #003366;
            color: white;
        }

        .mensaje {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-left: 6px solid #28a745;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .btn-menu {
            display: block;
            width: fit-content;
            margin: 20px auto 0 auto;
            padding: 10px 20px;
            background-color: #0059b3;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
        }

        .btn-menu:hover {
            background-color: #004080;
        }

        /* Carrusel */
        .carousel {
            position: relative;
            max-width: 100%;
            margin: 10px auto 20px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .carousel img {
            width: 100%;
            display: none;
            object-fit: cover;
            height: 300px;
        }

        .carousel img.active {
            display: block;
            animation: fade 1s ease-in-out;
        }

        @keyframes fade {
            from {opacity: 0.4;}
            to {opacity: 1;}
        }

        .carousel .prev, .carousel .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 50%;
            font-size: 18px;
            user-select: none;
        }

        .carousel .prev {
            left: 15px;
        }

        .carousel .next {
            right: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .carousel img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
<div class="contenedor">
    <h2>Registro de Productos</h2>

    <!-- CARRUSEL DE PRODUCTOS -->
    <div class="carousel" id="carousel">
        <img src="https://picsum.photos/id/1049/900/300" class="active" alt="Producto 1">
        <img src="https://picsum.photos/id/1060/900/300" alt="Producto 2">
        <img src="https://picsum.photos/id/1057/900/300" alt="Producto 3">
        <button class="prev" onclick="cambiarSlide(-1)">❮</button>
        <button class="next" onclick="cambiarSlide(1)">❯</button>
    </div>

    <!-- BOTÓN PARA FORMULARIO -->
    <button class="btn-toggle" onclick="togglePanel('panel-form')">➕ Registrar Nuevo Producto</button>
    <div class="panel" id="panel-form">
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" required>

            <label for="unidad_medida">Unidad de Medida:</label>
            <input type="text" name="unidad_medida" required>

            <input type="submit" name="guardar" value="Guardar">
        </form>

        <?php
        if (isset($_POST['guardar'])) {
            $sql = "INSERT INTO producto (nombre, descripcion, unidad_medida)
                    VALUES ('{$_POST['nombre']}', '{$_POST['descripcion']}', '{$_POST['unidad_medida']}')";
            if ($conn->query($sql)) {
                echo "<div class='mensaje'>Producto registrado correctamente.</div>";
            } else {
                echo "<div class='mensaje' style='background:#f8d7da; color:#721c24; border-left:6px solid #dc3545;'>Error al registrar el producto.</div>";
            }
        }
        ?>
    </div>

    <!-- BOTÓN PARA MOSTRAR TABLA -->
    <button class="btn-toggle" onclick="togglePanel('panel-tabla')">📋 Ver Lista de Productos</button>
    <div class="panel" id="panel-tabla">
        <?php
        $result = $conn->query("SELECT * FROM producto");
        ?>
        <h3>Lista de Productos</h3>
        <table>
            <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Unidad</th></tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_producto']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['descripcion']}</td>
                    <td>{$row['unidad_medida']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <a class="btn-menu" href="index.php">⬅ Regresar al Menú</a>
</div>

<script>
    function togglePanel(id) {
        // Cerrar otros paneles
        const panels = document.querySelectorAll('.panel');
        panels.forEach(p => {
            if (p.id !== id) {
                p.style.display = 'none';
            }
        });

        // Ocultar carrusel si cualquier panel se abre
        const panel = document.getElementById(id);
        const carousel = document.getElementById('carousel');

        if (panel.style.display === "block") {
            panel.style.display = "none";
            carousel.style.display = "block";
        } else {
            panel.style.display = "block";
            carousel.style.display = "none";
        }
    }

    // Carrusel de productos
    let index = 0;
    const slides = document.querySelectorAll('.carousel img');

    function mostrarSlide(i) {
        slides.forEach((slide, idx) => {
            slide.classList.remove('active');
            if (idx === i) {
                slide.classList.add('active');
            }
        });
    }

    function cambiarSlide(dir) {
        index += dir;
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }
        mostrarSlide(index);
    }

    setInterval(() => {
        cambiarSlide(1);
    }, 5000);
</script>
</body>
</html>
