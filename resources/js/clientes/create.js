document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#formCliente');

    form.addEventListener('submit', (e) => {
        const nombre = document.querySelector('#nombre').value.trim();
        const dni = document.querySelector('#dni').value.trim();

        if (nombre === '' || dni === '') {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Campos obligatorios',
                text: 'Por favor completa el nombre y DNI.',
                confirmButtonColor: '#8b5cf6'
            });
        } else if (dni.length !== 8) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'DNI inválido',
                text: 'El DNI debe tener exactamente 8 dígitos.',
                confirmButtonColor: '#8b5cf6'
            });
        }
    });
});


// Filtrar clientes
document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscadorClientes");
    const filas = document.querySelectorAll("#tablaClientes tbody tr");

    buscador.addEventListener("keyup", function () {
        const texto = buscador.value.toLowerCase();
        filas.forEach(fila => {
            const contenido = fila.textContent.toLowerCase();
            fila.style.display = contenido.includes(texto) ? "" : "none";
        });
    });

    // Confirmación de eliminación
    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            if (confirm("¿Estás seguro de eliminar este cliente?")) {
                alert("Cliente eliminado (demo)");
            }
        });
    });
});
