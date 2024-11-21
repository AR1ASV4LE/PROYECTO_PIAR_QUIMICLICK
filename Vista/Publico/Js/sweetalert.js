Swal.fire({
    title: 'Hola, ¿Quieres contactarnos?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Claro',
    cancelButtonText: 'Luego',
    customClass: {
        container: 'custom-swal', // Clase personalizada para el contenedor
        title: 'custom-title', // Clase personalizada para el título
        confirmButton: 'custom-confirm-button', // Clase personalizada para el botón de confirmación
        cancelButton: 'custom-cancel-button' // Clase personalizada para el botón de cancelación
    }
}).then((result) => {
    if (result.isConfirmed) {
        // Redirigir a la sección de "Contactarnos"
        window.location.href = 'SectionContactanos.html'; // Ajusta este enlace según la estructura de tu página
    }
});
