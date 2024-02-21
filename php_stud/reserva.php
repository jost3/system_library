<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['student']) || !isset($_SESSION['token'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header("Location: index.html?alerta=incorrecto");
    exit();
}
$tiempoInactividad1 = 1800;
if (isset($_SESSION['last_action1'])) {
    $tiempoTranscurrido1 = time() - $_SESSION['last_action1'];

    if ($tiempoTranscurrido1 > $tiempoInactividad1) {
        // Ha pasado más de 10 minutos, redirige al index.html
        header("Location: ../index.html?alerta=sesion-expirada");
        exit();
    } elseif ($tiempoTranscurrido1 > 0) {
        // Si hay interacción después de los 10 minutos, regenera el token y actualiza el timestamp
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['last_action1'] = time();
    }
}
$_SESSION['last_action1'] = time();
if (isset($_POST['logout'])) {
    // Cerrar sesión
    session_destroy();
    header('Location: ../index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Reservacion</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/ventana3_prest.css">
    <link rel="stylesheet" href="../css/busqu_predictiva.css">
    <link rel="stylesheet" href="../css/princ_stud.css">
    <link rel="stylesheet" href="../css1/azzara.min.css">
    <style>
        .icono {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .contenedor-sugerencias {
            position: relative;
            width: 100%;
        }
        #tm a {
        font-size: 15px; 
        }
        #navbar {
    	
    	transition: background-color 0.3s ease; 
		}

		.fixed-nav {
			position: fixed;
			width: 100%;
			top: 0;
			z-index: 1000; 
		}
        #navbar .form-control {
        width: 220px; /
        }

        /* Ajustes para los botones de sugerencia */
        .sugerencia {
            width: 100%; 
            border: none; 
            background: none; 
            text-align: left; 
            padding: 8px 12px; 
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .sugerencia:hover {
            background-color: #f0f0f0; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" id="tm">
                        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'inicio_stud.php') ? 'active' : ''; ?>">
                            <a class="nav-link" href="inicio_stud.php">Inicio</a>
                        </li>
                        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'fisico_stud.php') ? 'active' : ''; ?>">
                            <a class="nav-link" href="fisico_stud.php">Libros físicos</a>
                        </li>
                        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reserva.php') ? 'active' : ''; ?>">
                            <a class="nav-link" href="reserva.php">Reservar</a>
                        </li>
                        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'perfil_student.php') ? 'active' : ''; ?>">
                            <a class="nav-link" href="perfil_student.php">Perfil</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
    </nav>
        <!-- Header-->
        <header class="colr py-5 mt-5" >
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">RESERVA UN LIBRO</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Recuerda acercarte a  la direccion para completar el prestamo </p>
                </div>
            </div>
        </header>
        <br><br>
        <form action="reserv_nuev.php" method="post">
			<div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registre los datos</div>
                    </div>
                    <div class="card-body">

                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelTitulo" type="text" class="form-control input-border-bottom" name="titulo1" required onkeyup="buscarLibros()" autocomplete="off">
                            <label for="inputFloatingLabelTitulo" class="placeholder">Titulo de libro</label>
                        </div>
                        <div class="contenedor-sugerencias">
                            <div id="sugerencias" style="display: none;"></div>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelDescripcion" type="text" class="form-control input-border-bottom" name="descripcion1" required autocomplete="off">
                            <label for="inputFloatingLabelDescripcion" class="placeholder">Seccion</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelSeccion" type="text" class="form-control input-border-bottom" name="autor" required autocomplete="off">
                            <label for="inputFloatingLabelSeccion" class="placeholder">Autor</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelEdicion" type="text" class="form-control input-border-bottom" name="dni_est"  pattern="[0-9]{8}" title="El DNI debe contener exactamente 8 dígitos numéricos" required autocomplete="off">
                            <label for="inputFloatingLabelEdicion" class="placeholder">Dni</label>
                        </div>
                        <div class="card-action text-center">
                            <button class="btn btn-primary" name="registro">Reservar Libro</button>
                        </div>
                    </div>
                </div>
            </div>
	    </form>

    <!-- Script para ajustar el ancho del contenedor de sugerencias -->
    <script>
        // Obtener el campo de entrada y el contenedor de sugerencias
        var inputTitulo = document.getElementById('inputFloatingLabelTitulo');
        var sugerenciasTitulo = document.getElementById('sugerencias');
        

        // Agregar un evento de entrada al campo de entrada de título del libro
        inputTitulo.addEventListener('input', function() {
            // Obtener el ancho del campo de entrada de título
            var anchoInputTitulo = inputTitulo.offsetWidth;
            // Establecer el ancho del contenedor de sugerencias de título igual al ancho del campo de entrada de título
            sugerenciasTitulo.style.width = anchoInputTitulo + 'px';
        });

    </script>
    <!-- Scripts adicionales -->
    <script src="../js/buscar_libros.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var navbar = document.getElementById('navbar');

            window.addEventListener('scroll', function () {
                // Si el usuario ha desplazado hacia abajo más allá de cierto punto, agrega la clase 'fixed-nav'
                if (window.scrollY > 100) {
                    navbar.classList.add('fixed-nav');
                } else {
                    // De lo contrario, quita la clase 'fixed-nav'
                    navbar.classList.remove('fixed-nav');
                }
            });
        });
        <?php if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_alerta'])) : ?>
            Swal.fire({
                icon: '<?php echo $_SESSION['tipo_alerta']; ?>',
                title: '<?php echo $_SESSION['mensaje']; ?>',
                showConfirmButton: false,
                timer: 1500
            });
        <?php
            unset($_SESSION['mensaje']);
            unset($_SESSION['tipo_alerta']);
        endif;
        ?>
</script>
</body>
</html>
