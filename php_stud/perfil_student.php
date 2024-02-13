<?php
session_start();
if (!isset($_SESSION['student'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Perfil</title>
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
                <a class="navbar-brand" href="inicio_stud.php"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" id="tm">
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="inicio_stud.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" href="fisico_stud.php">Libros fisicos</a></li>
                        <li class="nav-item"><a class="nav-link" href="reserva.php">Reservar</a></li>
                        <li class="nav-item"><a class="nav-link" href="perfil_student.php">Perfil</a></li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar" name="busc1">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
    </nav>
	<div style="margin-top: 50px;"></div>
	<form action="perf_studUpd.php" method="post">
    <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">Datos personales</h4>
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line">
									<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active show" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Perfil</a> </li>
                                        <li class="nav-item"> 
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">Actualizar contraseña</a> 
                                        </li>
                                    </ul>
									</div>
								</div>
								<div class="card-body tab-pane olk active show" id="home">
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Nombres y Apellidos</label>
												<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $_SESSION['student']; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Correo</label>
												<input type="email" class="form-control" name="email" placeholder="Name" value="<?php echo $_SESSION['email']; ?>">
											</div>
										</div>
										
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Telefono</label>
												<input type="tel" class="form-control"  name="phone" placeholder="Phone" value="<?php echo $_SESSION['phone']; ?>">
											</div>
										</div>
										<div class="col-md-6">
										<div class="form-group form-group-default">
												<label>Dni</label>
												<input type="text" class="form-control"  name="dni" placeholder="Phone" value="<?php echo $_SESSION['dni']; ?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Carrera</label>
												<input type="text" class="form-control" name="carrera" placeholder="Name" value="<?php echo $_SESSION['carrera']; ?>">
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success" name="update">Actualizar </button>
									</div>
								</div>
								<div class="card-body tab-pane old" id="profile" style="display: none;">
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Contraseña Actual</label>
												<input type="password" class="form-control" name="current_password" placeholder="Contraseña Actual">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Nueva Contraseña</label>
												<input type="password" class="form-control" name="new_password" placeholder="Nueva Contraseña">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Confirmar Nueva Contraseña</label>
												<input type="password" class="form-control" name="confirm_password" placeholder="Confirmar Nueva Contraseña">
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success" name="update_password">Actualizar Contraseña</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-profile card-secondary">
							<div class="card-header" style="background-image: url('../img/inicio.jpeg'); background-size: cover;">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="../img/profile.jpg" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name"><?php echo $_SESSION['student']; ?></div>
										<div class="job"><?php echo $_SESSION['carrera']; ?></div>
										<div class="desc">Recuerda que tu decides tu futuro, no dejes pasar oportunidades</div>
										<div class="social-media">
											<a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
											</a>
											<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
											</a>
											<a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
											</a>
											<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
												<span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
											</a>
										</div>
										<div class="view-profile">
											<button type="submit" class="btn btn-primary btn-block" name="logout">Cerrar la Biblioteca</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</form>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/deslis.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Escuchar el evento de cambio de pestaña
    var tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            // Obtener el ID de la pestaña activa
            var activeTabId = tab.getAttribute('href').substring(1);
            
            // Ocultar todos los elementos con la clase 'tab-pane'
            var tabContents = document.querySelectorAll('.tab-pane');
            tabContents.forEach(function (content) {
                content.style.display = 'none';
            });
            
            // Mostrar el contenido de la pestaña activa
            var activeTabContent = document.getElementById(activeTabId);
            if (activeTabContent) {
                activeTabContent.style.display = 'block';
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
		document.body.classList.add('scroll-fixed');
    <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_alerta']);
    endif;
    ?>
</script>
</body>
</html>