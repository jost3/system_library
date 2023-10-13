<?php 
include '../conex_prest.php';
//consula
$consul_stud= "SELECT * FROM libro";
$guarda= $conex1->query($consul_stud);
?>
    <?php if (isset($_GET['busc1'])) { ?>
        <a class="restablecimiento" href="?"><button class="oculto">Mostrar todos</button></a>
    <?php } ?>

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
    <link rel="stylesheet" href="../css/fisico.css">
</head>
<style>
</style>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="inicio_stud.php"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="../php_stud/reserva.php">RESERVAR</a></li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar" name="busc1">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    <div class="conatiner">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive table-hover" id="TablaConsulta">
                <table class="table">
                    <thead class="text-muted">
                        <th class="text-center" id="cmb">Libro</th>
                        <th class="text-center" id="cmb">Autor</th>
                        <th class="text-center" id="cmb">Categoria</th>
                    </thead>
                    <tbody>
                    <?php  
                        $resultado= mysqli_query($conex1, $consulta);
                        while($row=mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td> <?php echo $row['titulo']; ?></td>
                            <td> <?php echo $row['autor']; ?></td>
                            <td> <?php echo $row['descripcion']; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>