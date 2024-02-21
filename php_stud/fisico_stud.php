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
?>

<?php 
include '../bd/conex_prest.php';
//consula
$consul_stud= "SELECT * FROM libro";
$guarda= $conex1->query($consul_stud);
?>
    <?php
        $busc1 = isset($_GET['busc1']) ? $_GET['busc1'] : '';
        if ($busc1) {
            $consulta = "SELECT * FROM libro WHERE 
                titulo LIKE '%$busc1%'";
        } else {
            $consulta = "SELECT * FROM libro";
        }
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Libros Fisicos</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/princ_stud.css">
    <link rel="stylesheet" href="../css1/azzara.min.css">
    
   
</head>
<style>
      #tm a {
        font-size: 15px; /* Puedes ajustar el valor según tus preferencias */
        }
       
    #navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000; /* Ajusta el valor de z-index según tus necesidades */

        }
        #navbar .form-control {
        width: 220px; /* Ajusta el ancho según tus preferencias */
        }
        .filtro{
            display: none;
            }
        .navbar-scroll {
        background-color: rgba(255, 255, 255, 0.9) !important; /* Ajusta el último valor (0.9) para controlar la opacidad */
        transition: background-color 0.3s ease; /* Agrega una transición suave */
        }
</style>
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
                    <h1 class="display-4 fw-bolder">LIBROS ACTUALES</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Explora entre difrentes secciones y temas que tenemos para ti </p>
                </div>
            </div>
        </header>
        <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row">
							<h4 class="card-title">Libros</h4>
								<div class="card-tools">
									<?php if (isset($_GET['busc1'])) { ?>
										<a href="?" class=" btn btn-info btn-border btn-round btn-sm mr-2">
											<span class="btn-label">
												<i class="fa fa-pencil"></i>
											</span>
											Mostrar
										</a>
										<?php } ?>
									</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover">
								<thead>
										<tr>
											
											<th>TITULO</th>
											<th>AUTOR</th>
											<th>EDICION</th>
											<th>SECCION</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>TITULO</th>
											<th>AUTOR</th>
											<th>EDICION</th>
											<th>SECCION</th>
										</tr>
									</tfoot>
									<tbody>
									<?php  
										$resultado= mysqli_query($conex1, $consulta);
										while($row=mysqli_fetch_assoc($resultado)) {
									?>
										<tr>
											<td><?php  echo $row["titulo"];?></td>
											<td><?php  echo $row["autor"];?></td>
											<td><?php  echo $row["edicion"];?></td>
											<td><?php  echo $row["descripcion"];?></td>
										</tr>
									<?php } ?>
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>
            
<!-- jQuery desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/adm/ready.js"></script>
<script src="../js/adm/table_function.js"></script>
<script src="../js/deslis.js"></script>

</body>
</html>