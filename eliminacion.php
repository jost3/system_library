<?php
include("conex_prest.php");

if (isset($_GET["id"])) {
    $idToDelete = $_GET["id"];
    
    // Utiliza una consulta preparada para eliminar el registro
    $deleteQuery = "DELETE FROM prestamo WHERE id_prest = ?";
    
    $stmt = mysqli_prepare($conex1, $deleteQuery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idToDelete);
        $success = mysqli_stmt_execute($stmt);
        
        if ($success) {
            header("Location: prestamo.php"); // Redirige a prestamo.php después de eliminar
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