<?php
include("conex_prest.php");

if (isset($_GET["id1"])) {
    $idToDelete = $_GET["id1"];
    
    // Utiliza una consulta preparada para eliminar el registro
    $deleteQuery = "DELETE FROM libro WHERE id = ?";
    
    $stmt = mysqli_prepare($conex1, $deleteQuery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idToDelete);
        $success = mysqli_stmt_execute($stmt);
        
        if ($success) {
            // Redirige de nuevo a la página principal o a donde desees
            header("Location: libros.php");
            exit();
        } else {
            echo "Error al eliminar el registro.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta preparada.";
    }
}

mysqli_close($conex1);
?>