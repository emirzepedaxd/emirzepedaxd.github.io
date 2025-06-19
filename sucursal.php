<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Sucursales</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 40px;
            text-align: center;
        }

        .contenedor {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2, h3 {
            color: #003366;
            margin-bottom: 20px;
        }

        .btn {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 6px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #002244;
            transform: scale(1.05);
        }

        .acordeon {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s ease, padding 0.6s ease;
        }

        .acordeon.mostrar {
            max-height: 800px; /* ajusta según el contenido */
            padding: 20px 0;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .mensaje {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #0059b3;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0ebff;
        }

        .volver-menu {
            margin-top: 30px;
        }

        .volver-menu a {
            background-color: #28a745;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .volver-menu a:hover {
            background-color: #1e7e34;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>

    <script>
        function toggleAcordeon(id) {
            var seccion = document.getElementById(id);
            seccion.classList.toggle('mostrar');
        }
    </script>
</head>
<body>

<div class="contenedor">

    <h2>Conoce Nuestras Sucursales</h2>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.526249608621!2d-99.6731112851016!3d19.48890548686673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d273f4ad7ac4e1%3A0x9cc88570544c6b9a!2sCentro%20de%20Estudios%20Tecnol%C3%B3gicos%20Industriales%20y%20de%20Servicios%20No.%2064!5e0!3m2!1ses!2smx!4v1718822267816!5m2!1ses!2smx"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <button class="btn" onclick="toggleAcordeon('formulario')">Agregar Nueva Sucursal</button>
    <button class="btn" onclick="toggleAcordeon('tabla')">Ver/ocultar Lista de Sucursales</button>

    <div id="formulario" class="acordeon">
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Dirección:</label>
            <input type="text" name="direccion" required>

            <label>Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required>

            <input type="submit" name="guardar" value="Guardar">
        </form>

        <?php
        if (isset($_POST['guardar'])) {
            $sql = "INSERT INTO sucursal (nombre, direccion, ciudad, telefono)
                    VALUES ('{$_POST['nombre']}', '{$_POST['direccion']}', '{$_POST['ciudad']}', '{$_POST['telefono']}')";
            if ($conn->query($sql)) {
                echo "<p class='mensaje'>✅ Sucursal registrada correctamente.</p>";
            } else {
                echo "<p class='mensaje' style='color: red;'>❌ Error al registrar la sucursal.</p>";
            }
        }
        ?>
    </div>

    <div id="tabla" class="acordeon">
        <h3>Lista de Sucursales</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM sucursal");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_sucursal']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['direccion']}</td>
                    <td>{$row['ciudad']}</td>
                    <td>{$row['telefono']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <div class="volver-menu">
        <a href="index.php">⬅ Volver al Menú Principal</a>
    </div>

</div>

</body>
</html>
