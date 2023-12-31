<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #00008B;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/limpiezaCL/limpiezaBDCL/app/vistas/menu.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'productos') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/productos.php">Inventario Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'revision') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/revision.php">Revisión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'faltantes') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/faltantes.php">Faltantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'descontinuados') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/descontinuados.php">Baja Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'reestructura') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/reestructura.php">Reestructura</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage === 'conteo') echo 'active'; ?>" href="/limpiezaCL/limpiezaBDCL/app/vistas/conteoInventarios.php">Conteo Físico</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-buscar btn-outline-light" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>

<style>
    .btn-buscar {
        background-color: #007BDF;
        /* Color azul Construrama */
        color: #FFFFFF;
        /* Texto blanco */
    }

    .nav-link {
        color: #FFFFFF;
    }

    .btn-buscar:hover {
        background-color: #FF4500;
        /* Color naranja Pantone al hacer hover */
    }

    .navbar-brand:hover,
    .navbar-brand:focus {
        color: white;
    }

    .navbar {
        color: #FFFFFF;
    }

    .navbar-brand {
        color: #FFFFFF;
    }

    .navbar-nav .nav-link.active {
        color: #FF4500;

    }

    .nav-link {
        color: #FFFFFF;
    }

    .bg-light-gray {
        --prymary: 200;
        /* Valor personalizado para el nivel de gris (0-255) */
        --bg-opacity: 1;
        background-color: rgba(var(--gray), var(--gray), var(--gray), var(--bg-opacity)) !important;
    }
</style>