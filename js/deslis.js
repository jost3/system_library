    // Selecciona la barra de navegación por su ID
    var navbar = document.getElementById('navbar');

    // Añade un evento de desplazamiento (scroll) a la ventana
    window.onscroll = function () {
        // Si el desplazamiento vertical es mayor que 100px, aplica una clase que hace transparente la barra de navegación
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.classList.add("navbar-scroll");
        } else {
            // Si no, quita la clase para volver a la apariencia normal
            navbar.classList.remove("navbar-scroll");
        }
    };