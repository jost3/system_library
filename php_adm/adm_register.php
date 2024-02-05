<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Hessen - Biblioteca</title>
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
								<input type="text" placeholder="Busca rapida de prestamos" class="form-control" name="search1">
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
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
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
									<a class="dropdown-item" href="#">Cerrar sesión</a>
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
										<a href="adm_register.php">
											<span class="sub-item ">Administrador</span>
										</a>
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
						<h4 class="page-title">Usuarios actuales</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="adm_register.php">Usuarios</a>
							</li>
							
						</ul>
					</div>
					<?php
						include("../bd/mostrar_dt.php");

						$search1 = isset($_GET['search1']) ? $_GET['search1'] : '';
						if ($search1) {
							$consulta = "SELECT * FROM usuarios WHERE 
								usuario LIKE '%$search1%'";
						} else {
							$consulta = "SELECT * FROM usuarios";
						}
					?> 
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title"> Usuarios</h4>
										<div class="card-tools">
                                        <a href="new_adm.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
											Nuevo
										</a>
									</div>
								</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive table-hover table-sales">
												<table class="table">
													<thead>
														<tr>
															<th>ID</th>
															<th>USUARIO</th>
                                                            <th>CORREO</th>
                                                            <th>ROL</th>
															<th>TELEFONO</th>
                                                            <th>FOTO</th>
															<th>ACCION</th>
														
													</thead>
													<?php 
													$result = mysqli_query($conex, $consulta);
													while($row=mysqli_fetch_assoc($result)) {?>
													<tbody>
														<tr>
															<td>
																
																<?php  echo $row["id"];?>
																
															</td>
															<td><?php  echo $row["usuario"];?></td>
                                                            <td><?php  echo $row["correo"];?></td>
                                                            <td><?php  echo $row["rol"];?></td>
															<td><?php  echo $row["telefono"];?></td>
                                                            <td>
																<img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']); ?>" alt="Foto de usuario" style="width: 50px; height: 50px;">
                                                            </td>
															<td>
																<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 modificar-usuario" data-id="<?php echo $row["id"]; ?>">
																	<span class="btn-label">
																		<i class="fa fa-pencil"></i>
																	</span>
																	Modificar
																</a>
																<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 eliminar-usuario" data-id="<?php echo $row["id"]; ?>">
																	<span class="btn-label">
																		<i class="fa fa-trash"></i>
																	</span>
																	Eliminar
																</a>
															</td>

														
														</tr>
													</tbody>
													<?php } ?>
												</table>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mapcontainer">
												<div id="map-example" class="vmap"></div>
											</div>
										</div>
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


<!--  JS -->

<script src="../js/adm/ready.js"></script>
<script src="../js/adm/table_function.js"></script>
<script>
	$(".modificar-usuario").click(function (event) {
		event.preventDefault(); // Evita que el enlace se abra directamente

		var idUsuario = $(this).data("id");

		// Redirige a la página de modificación con el ID del préstamo
		window.location.href = 'modificar_user.php?id=' + idUsuario;
	});
	$(document).ready(function () {
        // Agrega un evento de clic a los botones de eliminar
        $(".eliminar-usuario").click(function (event) {
            event.preventDefault(); // Evita que el enlace se abra directamente

            var idUsuario = $(this).data("id");

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
                    window.location.href = 'eliminar_user.php?id=' + idUsuario;
                }
            });
        });
    });
</script>
</body>
</html>