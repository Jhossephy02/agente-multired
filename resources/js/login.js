document.addEventListener("DOMContentLoaded", function() {

    if (loginMessages.success) {
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido!',
            text: loginMessages.success,
            confirmButtonColor: '#2575fc',
            timer: 2500,
            showConfirmButton: false
        });
    }

    if (loginMessages.error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: loginMessages.error,
            confirmButtonColor: '#d33'
        });
    }

});
