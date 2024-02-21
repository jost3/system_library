<?php
session_start();
if (!isset($_SESSION['usuario']) || !isset($_SESSION['token1'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
if (!isset($_SESSION['token1']) || empty($_SESSION['token1'])) {
    header("Location: index.html?alerta=incorrecto");
    exit();
}
$tiempoInactividad = 1800; // 600 segundos = 10 minutos
if (isset($_SESSION['last_action'])) {
    $tiempoTranscurrido = time() - $_SESSION['last_action'];

    if ($tiempoTranscurrido > $tiempoInactividad) {
        // Ha pasado más de 10 minutos, redirige al index.html
        header("Location: ../index.html?alerta=sesion-expirada");
        exit();
    } elseif ($tiempoTranscurrido > 0) {
        // Si hay interacción después de los 10 minutos, regenera el token y actualiza el timestamp
        $_SESSION['token1'] = bin2hex(random_bytes(32));
        $_SESSION['last_action'] = time();
    }
}
$_SESSION['last_action'] = time();
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Estudiantes</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../img/hessen icono.png" type="image/x-icon"/>
	
	<!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="../css1/bootstrap.min.css">
	<link rel="stylesheet" href="../css1/azzara.min.css">
</head>
<style>
  .logo img {
        max-width: 70%; 
        height: auto; 
    }
</style>
<body>
	<div class="wrapper">
		
		<div class="main-header" >
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="inic.php" class="logo">
					<img src="../img/ESCUDO (1) (1).png" alt="HESSEN " class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3" method="get">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Buscar Alumnos" class="form-control" name="search">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<?php if (isset($_SESSION['fotoUsuario'])) : ?>
										<?php $base64Image = base64_encode($_SESSION['fotoUsuario']); ?>
										<img src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="imagen de perfil" class="avatar-img rounded-circle">
									<?php else : ?>
										<img src="../assets/img/default_profile.jpg" alt="imagen de perfil predeterminada" class="avatar-img rounded-circle">
									<?php endif; ?>	
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg">
											
											<?php if (isset($_SESSION['fotoUsuario'])) : ?>
												<?php $base64Image = base64_encode($_SESSION['fotoUsuario']); ?>
												<img src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="imagen de perfil" class="avatar-img rounded">
											<?php else : ?>
												<img src="../assets/img/default_profile.jpg" alt="imagen de perfil predeterminada" class="avatar-img rounded">
											<?php endif; ?>
										</div>
										<div class="u-text">
											<h4><?php echo $_SESSION['usuario']; ?></h4>
											<p class="text-muted"><?php echo $_SESSION['correoUsuario']; ?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="perfil_adm.php">Mi perfil</a>
									
									<div class="dropdown-divider"></div>
									<form method="post" action="">
										<button type="submit" name="logout" class="dropdown-item">Cerrar sesión</button>
									</form>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php if (isset($_SESSION['fotoUsuario'])) : ?>
								<?php $base64Image = base64_encode($_SESSION['fotoUsuario']); ?>
								<img src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="imagen de perfil" class="avatar-img rounded-circle">
							<?php else : ?>
								<img src="../assets/img/default_profile.jpg" alt="imagen de perfil predeterminada" class="avatar-img rounded-circle">
							<?php endif; ?>	
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['usuario']; ?>
									<span class="user-level"><?php echo $_SESSION['rolUsuario']; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="perfil_adm.php">
											<span class="link-collapse">Mi perfil</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item ">
							<a href="inic.php">
								<i class="fas fa-home"></i>
								<p>Inicio</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Acciones</h4>
						</li>
						<li class="nav-item ">
							<a href="book.php">
								<i class="fas fa-layer-group"></i>
								<p>Libro</p>
							</a>
							
						</li>
						<li class="nav-item">
							<a  href="loan.php">
								<i class="fas fa-pen-square"></i>
								<p>Prestamo</p>
							</a>
						</li>
						<li class="nav-item active">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Usuarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
                                        <a href="estudent_adm.php">
											<span class="sub-item">Estudiantes</span>
										</a>
									</li>
									<li>
									<?php if (isset($_SESSION['rolUsuario']) && strtolower($_SESSION['rolUsuario']) === 'root') : ?>
									<li>
										<a href="adm_register.php">
											<span class="sub-item">Administrador</span>
										</a>
									</li>
									<?php endif; ?>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
        <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Estudiantes actuales</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="inic.php">
									<i class="fas fa-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">lista de estudiantes</a>
							</li>
							
							
						</ul>
					</div>
					<?php
					include("../bd/conex_prest.php");
					
					$search = isset($_GET['search']) ? $_GET['search'] : '';
					if ($search) {
						$alumnos = "SELECT * FROM alumno WHERE 
								Nombre LIKE '%$search%'";
					
					} else {
						$alumnos = "SELECT * FROM alumno";
					}
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title">Estudiantes</h4>
										<div class="card-tools">
												<?php if (isset($_GET['search'])) { ?>
												<a href="?" class=" btn btn-info btn-border btn-round btn-sm mr-2">
													<span class="btn-label">
														<i class="fa fa-pencil"></i>
													</span>
													Mostrar
												</a>
												<?php } ?>
												<a href="new_estudent.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
													<span class="btn-label">
														<i class="fa fa-pencil"></i>
													</span>
													Nuevo
												</a>
											</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>DNI</th>
													<th>NOMBRE</th>
													<th>CARRERA</th>
													<th>TELEFONO</th>
													<th>CORREO</th>
													<th>ACCION</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
                                                    <th>DNI</th>
													<th>NOMBRE</th>
													<th>CARRERA</th>
													<th>TELEFONO</th>
													<th>CORREO</th>
													<th>ACCION</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													$result = mysqli_query($conex1, $alumnos);
													while($row=mysqli_fetch_assoc($result)) 
												{?>
												<tr>
													<td><?php  echo $row["id"];?></td>
													<td><?php  echo $row["dni"];?></td>
													<td><?php  echo $row["Nombre"];?></td>
													<td><?php  echo $row["carrera"];?></td>
													<td><?php  echo $row["telefono"];?></td>
													<td><?php  echo $row["correo"];?></td>
													<td style="width: 190px;">
													<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 modificar-alumnos" data-id="<?php echo $row["id"]; ?>">
														<span class="btn-label">
															<i class="fa fa-pencil"></i>
														</span>
														Modificar
													</a>
														<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 eliminar-alumnos" data-id="<?php echo $row["id"]; ?>">
															<span class="btn-label">
																<i class="fa fa-trash"></i>
															</span>
															Eliminar
														</a>
													</td>
												</tr>
											<?php } ?>
											</tbody> 
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<!-- End Custom template -->
	</div>
</div>
<!--   Core JS Files   -->

<!-- jQuery desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Popper.js desde CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

<!-- Bootstrap desde CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- jQuery UI Touch Punch -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.11.0/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sparkline/2.4.2/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- JS -->
<script>
$(".modificar-alumnos").click(function (event) {
    event.preventDefault(); // Evita que el enlace se abra directamente
    var idAlumno = $(this).data("id"); // Cambia data-id_alumno a data-id
    // Redirige a la página de modificación con el ID del alumno
    window.location.href = 'modificar_estudent.php?id=' + idAlumno;
});

$(document).ready(function () {
    // Agrega un evento de clic a los botones de eliminar
    $(".eliminar-alumnos").click(function (event) {
        event.preventDefault(); // Evita que el enlace se abra directamente
        var idAlumno = $(this).data("id"); // Obtén el ID del alumno a eliminar
        // Muestra una alerta de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, realiza la eliminación
                window.location.href = 'eliminar_alumno.php?id=' + idAlumno;
            }
        });
    });
});


</script>
<script>
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
<script src="../js/adm/ready.js"></script>
<script src="../js/adm/table_function.js"></script>

</body>
</html>