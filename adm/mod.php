<?php 
include '../bd/conex_prest.php';
//consula
$consul_stud= "SELECT * FROM alumno";
$guarda= $conex1->query($consul_stud);
?>
    <?php if (isset($_GET['busc1'])) { ?>
        <a class="restablecimiento" href="?"><button class="oculto">Mostrar todos</button></a>
    <?php } ?>

    <?php
        $busc1 = isset($_GET['busc1']) ? $_GET['busc1'] : '';
        if ($busc1) {
            $consulta = "SELECT * FROM alumno WHERE 
                nombre LIKE '%$busc1%'";
        } else {
            $consulta = "SELECT * FROM alumno";
        }
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/princ_stud.css">
</head>
<style>

.restablecimiento {
    margin-top: 1px;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    position: absolute;
    right: 0px;
    top: 140px;
}

.oculto{
    background-color: rgb(9, 73, 170);
    color: white;
    padding: 10px 20px;
    border: #fff;
    cursor: pointer;
}
.search-container-wrapper {

    margin-top: 20px;
    margin-bottom: -190px;
}

.search-container {
   
    margin-top: 150px; /* Ajusta este valor para cambiar la posición vertical del formulario */
    margin-left: 10px;
}
@media (max-width: 768px) {
    .search-container-wrapper {
        text-align: center;
    }

    .oculto {
        display: block;

        margin-top: -90px; /* Ajusta este valor según sea necesario */
        position: static;
    }

    .restablecimiento {
        top: 180px;
        right: -5px;
    }
}
</style>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="inicio_stud.php"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active " aria-current="page" href="#">Panel Administrativo</a></li>
                        <li class="nav-item "><a class="nav-link " href="../php_stud/reserva.php">Salir</a></li>
                    </ul>
                  
                </div>
            </div>
        </nav>
        <div class="search-container-wrapper">
            <div class="search-container">
                <form class="d-flex">
                    <input class=" me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar" name="busc1">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="conatiner">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive table-hover" id="TablaConsulta">
                    <table class="table">
                        <thead class="text-muted">
                            <th class="text-center" id="cmb">Id</th>
                            <th class="text-center" id="cmb">Dni</th>
                            <th class="text-center" id="cmb">Nombre</th>
                            
                        </thead>
                        <tbody>
                        <?php  
                            $resultado= mysqli_query($conex1, $consulta);
                            while($row=mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td> <?php echo $row['id']; ?></td>
                                <td> <?php echo $row['dni']; ?></td>
                                <td> <?php echo $row['Nombre']; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>