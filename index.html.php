<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Sistema de Abarrotes - CETis 64</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        body {
            display: flex;
            min-height: 100vh;
        }

        /* Menú lateral */
        nav.sidebar {
            width: 250px;
            background-color: #003366;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            position: fixed;
            height: 100vh;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        nav.sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-left: 4px solid transparent;
            transition: background 0.3s, border-left 0.3s;
            font-size: 16px;
        }

        nav.sidebar a:hover,
        nav.sidebar a.active {
            background-color: #002244;
            border-left: 4px solid #28a745;
        }

        nav.sidebar a i {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        /* Contenido principal */
        main.content {
            margin-left: 250px;
            padding: 40px 30px;
            flex: 1;
            width: 100%;
        }

        header {
            background-color: #003366;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 250px;
        }

        header img {
            height: 60px;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Carousel styles */
        .carousel {
            position: relative;
            max-width: 1000px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .carousel img {
            width: 100%;
            display: none;
            object-fit: cover;
            height: 400px;
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

        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 15px;
            margin-left: 250px;
            margin-top: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav.sidebar {
                position: fixed;
                transform: translateX(-100%);
                width: 200px;
                height: 100vh;
                top: 0;
                left: 0;
                transition: transform 0.3s ease;
            }
            nav.sidebar.active {
                transform: translateX(0);
            }

            header, footer {
                margin-left: 0;
            }

            main.content {
                margin-left: 0;
                padding: 20px 15px;
            }

            header {
                flex-direction: column;
                text-align: center;
            }

            header img {
                height: 50px;
                margin-bottom: 10px;
            }

            header h1 {
                font-size: 20px;
            }

            .carousel img {
                height: 250px;
            }

            /* Botón menú hamburguesa */
            #menuToggle {
                position: fixed;
                top: 10px;
                left: 10px;
                background-color: #003366;
                color: white;
                border: none;
                padding: 10px 15px;
                font-size: 20px;
                cursor: pointer;
                z-index: 1100;
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>

<button id="menuToggle" aria-label="Toggle menu" title="Menú">&#9776;</button>

<nav class="sidebar" id="sidebarMenu" role="navigation" aria-label="Menú principal">
    <a href="index.php" class="active"><i class="fas fa-home"></i> Inicio</a>
    <a href="sucursal.php"><i class="fas fa-building"></i> Sucursales</a>
    <a href="producto.php"><i class="fas fa-box-open"></i> Productos</a>
    <a href="entrega.php"><i class="fas fa-truck"></i> Entregas</a>
    <a href="detalle_entrega.php"><i class="fas fa-list"></i> Detalle Entrega</a>
    <a href="reporte_sucursales.php"><i class="fas fa-chart-bar"></i> Reporte Sucursales</a>
    <a href="reporte_entregados.php"><i class="fas fa-check-circle"></i> Reporte Entregados</a>
    <a href="reporte_pendientes.php"><i class="fas fa-hourglass-half"></i> Reporte Pendientes</a>
    <a href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a>
</nav>

<div style="flex:1; display:flex; flex-direction: column; min-height: 100vh;">
<header>
    <img src="https://cetis-64.edu.mx/images/logocetis64.png" alt="CETis 64 Logo" />
    <h1>Sistema de Distribución de Abarrotes - CETis 64</h1>
</header>

<main class="content">
    <h2>Bienvenido al sistema de distribución de abarrotes</h2>
    <p>Selecciona una opción del menú para comenzar.</p>

    <div class="carousel">
        <img src="https://picsum.photos/id/1018/1000/400" class="active" alt="Imagen 1" />
        <img src="https://picsum.photos/id/1023/1000/400" alt="Imagen 2" />
        <img src="https://picsum.photos/id/1035/1000/400" alt="Imagen 3" />
        <button class="prev" onclick="cambiarSlide(-1)" aria-label="Anterior">&#10094;</button>
        <button class="next" onclick="cambiarSlide(1)" aria-label="Siguiente">&#10095;</button>
    </div>
</main>

<footer>
    &copy; 2025 CETis 64 - Todos los derechos reservados
</footer>
</div>

<script>
    // Control menú lateral en móvil
    const menuToggle = document.getElementById('menuToggle');
    const sidebarMenu = document.getElementById('sidebarMenu');

    menuToggle.addEventListener('click', () => {
        sidebarMenu.classList.toggle('active');
    });

    // Carousel
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
</script>

</body>
</html>
