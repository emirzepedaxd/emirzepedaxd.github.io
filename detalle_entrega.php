<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Entrega</title>
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
            max-width: 800px;
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

        form label, form select, form input[type="number"] {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        select, input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #002244;
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
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
        }

        .btn-menu:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="contenedor">
    <h2>Detalle de Entrega</h2>

    <!-- BOTONES -->
    <button class="btn-toggle" onclick="togglePanel('panel-form')">➕ Registrar Detalle de Entrega</button>
    <button class="btn-toggle" onclick="togglePanel('panel-tabla')">📋 Ver Lista de Detalles</button>

    <!-- PANEL FORMULARIO -->
    <div class="panel" id="panel-form">
        <form method="POST">
            <label>Entrega:</label>
            <select name="id_entrega" required>
                <?php
                $res = $conn->query("SELECT * FROM entrega");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_entrega']}'>Entrega {$row['id_entrega']}</option>";
                }
                ?>
            </select>

            <label>Producto:</label>
            <select name="id_producto" required>
                <?php
                $res = $conn->query("SELECT * FROM producto");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_producto']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <label>Cantidad:</label>
            <input type="number" name="cantidad" required>

            <input type="submit" name="guardar" value="Guardar">
        </form>

        <?php
        if (isset($_POST['guardar'])) {
            $sql = "INSERT INTO detalle_entrega (id_entrega, id_producto, cantidad)
                    VALUES ({$_POST['id_entrega']}, {$_POST['id_producto']}, {$_POST['cantidad']})";
            $conn->query($sql);
            echo "<div class='mensaje'>Detalle registrado correctamente.</div>";
        }
        ?>
    </div>

    <!-- PANEL TABLA -->
    <div class="panel" id="panel-tabla">
        <?php
        $result = $conn->query("SELECT d.id_detalle, p.nombre AS producto, d.cantidad, d.id_entrega
                                FROM detalle_entrega d
                                JOIN producto p ON d.id_producto = p.id_producto");
        ?>
        <h3>Detalles de Entrega</h3>
        <table>
            <tr><th>ID</th><th>Entrega</th><th>Producto</th><th>Cantidad</th></tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_detalle']}</td>
                    <td>{$row['id_entrega']}</td>
                    <td>{$row['producto']}</td>
                    <td>{$row['cantidad']}</td>
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

        // Mostrar/ocultar el panel seleccionado
        const panel = document.getElementById(id);
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
</script>
</body>
</html>
