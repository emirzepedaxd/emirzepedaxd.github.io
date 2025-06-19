<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Sucursales</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 40px;
        }

        h2 {
            color: #003366;
            text-align: center;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
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

        table, th, td {
            border: 1px solid #ddd;
        }

        .btn-menu {
            display: block;
            width: fit-content;
            margin: 30px auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
        }

        .btn-menu:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Reporte de Sucursales</h2>

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

<a class="btn-menu" href="index.php">⬅ Regresar al Menú</a>

</body>
</html>
