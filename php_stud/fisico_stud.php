<?php 
include '../conex_prest.php';
//consula
$consul_stud= "SELECT * FROM libro";
$guarda= $conex1->query($consul_stud);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/princ_stud.css">
</head>
<body>
    <div class="conatiner">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center"> Libros de la Bilioteca</h3>
            <div class="table-responsive table-hover" id="TablaConsulta">
                <table class="table">
                    <thead class="text-muted">
                        <th class="text-center">Libro</th>
                        <th class="text-center">Autor</th>
                        <th class="text-center">Categoria</th>
                    </thead>
                    <tbody>
                        <?php while($row=$guarda->fetch_assoc()){?>
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
</body>
</html>