<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos Entregados por Sucursal</title>
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
            border: 1px solid #ddd;
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

<h2>Reporte de Productos Entregados por Sucursal</h2>

<table>
    <tr>
        <th>Sucursal</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Fecha Entrega</th>
    </tr>

    <?php
    $sql = "
    SELECT s.nombre AS sucursal, p.nombre AS producto, de.cantidad, e.fecha_entrega
    FROM entrega e
    JOIN sucursal s ON e.id_sucursal = s.id_sucursal
    JOIN detalle_entrega de ON e.id_entrega = de.id_entrega
    JOIN producto p ON de.id_producto = p.id_producto
    WHERE e.estado_entrega = 'Entregado'
    ORDER BY s.nombre, e.fecha_entrega
    ";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['sucursal']}</td>
            <td>{$row['producto']}</td>
            <td>{$row['cantidad']}</td>
            <td>{$row['fecha_entrega']}</td>
        </tr>";
    }
    ?>
</table>

<a class="btn-menu" href="index.php">⬅ Regresar al Menú</a>

</body>
</html>
