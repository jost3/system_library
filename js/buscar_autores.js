// Función para buscar autores relacionados
function buscarAutores() {
    var input = document.getElementById('autor1').value.trim();
    var tituloSeleccionado = document.getElementById('titulo1').value.trim();
    var sugerencias = document.getElementById('sugerencias_autores');

    // Realizar la búsqueda y mostrar las sugerencias si hay resultados
    sugerencias.innerHTML = ''; // Limpiar sugerencias

    if (input.length > 0) {
        // Ejemplo de solicitud AJAX utilizando jQuery:
        $.ajax({
            type: 'POST',
            url: 'buscar_autores.php',
            data: { query: input, titulo: tituloSeleccionado },
            success: function(response) {
                sugerencias.innerHTML = response; // Mostrar las sugerencias obtenidas
                sugerencias.style.display = 'block'; // Mostrar el contenedor de sugerencias
            }
        });
    } else {
        // Si el campo de entrada está vacío, oculta el contenedor de sugerencias
        sugerencias.style.display = 'none'; // Oculta el contenedor de sugerencias
    }
}

// Definir la función seleccionarAutor para manejar la selección de sugerencias de autores
function seleccionarAutor(autor) {
    // Asignar el valor del autor seleccionado al campo de entrada de autor
    document.getElementById('autor1').value = autor;
    
    // Limpiar las sugerencias de autores
    document.getElementById('sugerencias_autores').innerHTML = '';
}
