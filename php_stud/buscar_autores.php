<?php
// Incluir el archivo de conexión a la base de datos
include '../bd/mostrar_dt.php';

// Obtener el valor de búsqueda del parámetro POST 'query'
$query = $_POST['query'];

// Evitar inyección SQL limpiando el valor de búsqueda
$busqueda = mysqli_real_escape_string($conex, $query);

// Construir la consulta SQL para buscar autores que coincidan con el valor de búsqueda y el título seleccionado
$consulta = "SELECT autor FROM libro WHERE autor LIKE '%$busqueda%' AND titulo = '{$_POST['titulo']}' LIMIT 5"; // Limita a 5 resultados

// Ejecutar la consulta
$resultado = mysqli_query($conex, $consulta);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Construir sugerencias en formato HTML
    echo '<ul>';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<li><input type="button" class="sugerencia" value="' . $fila['autor'] . '" onclick="seleccionarAutor(\'' . $fila['autor'] . '\')"></li>';
    }
    echo '</ul>';
} else {
    // Si no se encontraron resultados, devolver un mensaje indicando que no se encontraron sugerencias
    echo '<p>No se encontraron autores que coincidan con la búsqueda.</p>';
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
