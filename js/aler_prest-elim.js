var idEliminar1; // Variable para almacenar el ID a eliminar

        function mostrarModal(id_prest) {
            idEliminar1 = id_prest; // Almacena el ID a eliminar
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        function cerrarModal1() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function eliminarLibro1() {
            window.location.href = "eliminacion.php?id=" + idEliminar1;
        }