<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script>
    // Mostrar la resolución al cargar la página
    window.addEventListener('DOMContentLoaded', function() {
      const width = window.innerWidth;
      const height = window.innerHeight;
      console.log(`Initial Resolution: ${width}x${height}`);
    });

    // Mostrar la resolución cada vez que se redimensiona la ventana
    window.addEventListener('resize', function() {
      const width = window.innerWidth;
      const height = window.innerHeight;
      console.log(`Resolution: ${width}x${height}`);
    });

    //Actualizar el año del footer de forma automatica
    document.getElementById("current-year").textContent = new Date().getFullYear();
</script>
