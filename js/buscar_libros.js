function buscarLibros() {
    var input = document.getElementById('titulo1').value.trim();
    var sugerencias = document.getElementById('sugerencias');

    if (input.length > 0) {
        // Realizar la búsqueda y mostrar las sugerencias si hay resultados
        // Puedes usar AJAX u otro método para obtener los resultados de búsqueda
        // Luego, actualiza el contenido de 'sugerencias' con los resultados obtenidos
        sugerencias.innerHTML = '<p>Cargando sugerencias...</p>'; // Muestra un mensaje de carga mientras se realizan las sugerencias

        // Ejemplo de solicitud AJAX utilizando jQuery:
        $.ajax({
            type: 'POST',
            url: 'buscar_libros.php',
            data: { query: input },
            success: function(response) {
                sugerencias.innerHTML = response; // Mostrar las sugerencias obtenidas
                sugerencias.style.display = 'block'; // Mostrar el contenedor de sugerencias
            }
        });
    } else {
        // Si el campo de entrada está vacío, oculta el contenedor de sugerencias
        sugerencias.innerHTML = ''; // Borra cualquier contenido existente
        sugerencias.style.display = 'none'; // Oculta el contenedor de sugerencias
    }
}



// Definir la función seleccionarSugerencia para manejar la selección de sugerencias
function seleccionarSugerencia(sugerencia) {
    // Asignar el valor de la sugerencia al campo de entrada de título del libro
    document.getElementById('titulo1').value = sugerencia;
    
    // Limpiar las sugerencias
    document.getElementById('sugerencias').innerHTML = '';
}

