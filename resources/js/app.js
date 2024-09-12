import './bootstrap';

import Swal from 'sweetalert2';
import Alpine from 'alpinejs';

const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Alpine = Alpine;
window.Swal = Swal;
window.Toast = Toast;

Alpine.start();
