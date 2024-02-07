<?php
// Incluir el archivo de conexión a la base de datos
include '../bd/mostrar_dt.php';


// Obtener el valor de búsqueda del parámetro POST 'query'
$query = $_POST['query'];

// Evitar inyección SQL limpiando el valor de búsqueda
$busqueda = mysqli_real_escape_string($conex, $query);

// Construir la consulta SQL para buscar libros que coincidan con el valor de búsqueda
$consulta = "SELECT titulo, autor FROM libro WHERE titulo LIKE '%$busqueda%' LIMIT 5"; // Limita a 5 resultados

// Ejecutar la consulta
$resultado = mysqli_query($conex, $consulta);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Construir sugerencias en formato HTML
    echo '<ul>';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<li><input type="button" class="sugerencia" value="' . $fila['titulo'] . '" onclick="seleccionarSugerencia(\'' . $fila['titulo'] . '\', \'' . $fila['autor'] . '\')"></li>';
    }
    echo '</ul>';
} else {
    // Si no se encontraron resultados, devolver un mensaje indicando que no se encontraron sugerencias
    echo '<p>No se encontraron libros que coincidan con la búsqueda.</p>';
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
