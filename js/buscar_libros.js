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



// Función para manejar la selección de sugerencias
function seleccionarSugerencia(titulo, descripcion,autor) {
    // Asignar el valor de la sugerencia al campo de entrada del título del libro
    document.getElementById('inputFloatingLabelTitulo').value = titulo;
    
    // Asignar el valor de la descripción al campo de entrada de la descripción del libro
    document.getElementById('inputFloatingLabelDescripcion').value = descripcion;
    if (autor) {
        document.getElementById('inputFloatingLabelSeccion').value = autor;
    }
    
    // Limpiar las sugerencias
    $('#sugerencias').html('');
    $('#sugerencias').hide();
}

// Variable para almacenar el temporizador del debouncing
var timeoutId;

// Función para buscar libros con debouncing
function buscarLibros() {
    // Limpiar el temporizador existente (si existe)
    clearTimeout(timeoutId);

    // Obtener el valor del campo de búsqueda
    var query = document.getElementById('inputFloatingLabelTitulo').value;

    // Establecer un temporizador para ejecutar la búsqueda después de un breve retraso (por ejemplo, 300 milisegundos)
    timeoutId = setTimeout(function() {
        // Realizar la búsqueda solo después del tiempo de espera
        $.ajax({
            url: 'buscar_libros.php',
            method: 'POST',
            data: { query: query },
            success: function(data) {
                // Mostrar los resultados de la búsqueda en el contenedor de sugerencias
                $('#sugerencias').html(data);
                $('#sugerencias').show();
            }
        });
    }, 300); // Tiempo de espera en milisegundos
}


