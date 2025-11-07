import Quagga from 'quagga';

let cameraActive = false;

const toggleButton = document.getElementById('toggle-camera');
const imgOn = document.getElementById('img-on');
const imgOff = document.getElementById('img-off');
const barcodeInput = document.getElementById('barcode-input');
const camaraDiv = document.getElementById('camara');

// Guarda el SVG original
const cameraSVG = `
<svg class="camera-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 64 64">
    <rect x="8" y="20" width="48" height="32" rx="6" stroke="#888"/>
    <circle cx="32" cy="36" r="10" stroke="#888"/>
    <rect x="24" y="12" width="16" height="8" rx="2" stroke="#888"/>
</svg>
`;

function startCamera() {
    isDetecting = false; // Reiniciar bloqueo de detección
   
    if (camaraDiv) {
        camaraDiv.innerHTML = '';
    }
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: camaraDiv, 
            constraints: {
                width: 640,
                height: 480,
                facingMode: "environment", 
                advanced:[{autofocusMode: "continuous"}]
    }

        },
        decoder : {
            readers : ["ean_reader", "ean_8_reader", "code_128_reader"] 
        }

    }, function(err) {
        if (err) {
            console.log(err);
            // Si hay error, volver a mostrar SVG
            if (camaraDiv) camaraDiv.innerHTML = cameraSVG;
            return;
        }
        Quagga.start();
        cameraActive = true;
        toggleButton.textContent = "Apagar cámara";
        toggleButton.classList.remove('btn-outline-success');
        toggleButton.classList.add('btn-rojo');
        if (imgOn && imgOff) {
            imgOn.style.display = "inline";
            imgOff.style.display = "none";
        }
    });
}

let isDetecting = false;
// Escuchar el resultado del escaneo
Quagga.onDetected(function(result) {
    const code = result?.codeResult?.code;

    if (code && !isDetecting) {
        isDetecting = true; // Bloquear detección adicional
        stopCamera(); // Detener cámara después de detectar un código
        
        // Rellenar el input con el código detectado
        if (barcodeInput) {
            barcodeInput.value = code;
        }
    }
});
function stopCamera() {
    Quagga.stop();
    cameraActive = false;
    toggleButton.textContent = "Encender cámara";
    toggleButton.classList.remove('btn-rojo');
    toggleButton.classList.add('btn-outline-success');
    if (camaraDiv) {
        camaraDiv.innerHTML = cameraSVG;
    }
}
if (toggleButton) {
    toggleButton.addEventListener('click', function() {
        if (cameraActive) {
            stopCamera();
        } else {
            startCamera();
        }
    });
}

//boton mostrar producto
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("barcode-input");
    const button = document.getElementById("submit-btn");

    if (input && button) {
        // estado inicial
        button.disabled = true;
        button.classList.remove("btn-primary");
        button.classList.add("btn-secondary");

        input.addEventListener("input", () => {
            if (input.value.trim() !== "") {
                button.disabled = false;
                button.classList.remove("btn-secondary");
                button.classList.add("btn-primary");
            } else {
                button.disabled = true;
                button.classList.remove("btn-primary");
                button.classList.add("btn-secondary");
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const nombre = document.getElementById('nombre');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const saveBtn = document.getElementById('save-btn');

    if (!nombre || !email || !username || !saveBtn) return;

    const initialValues = {
        nombre: nombre.value,
        email: email.value,
        username: username.value
    };

    function checkChanges() {
        if (
            nombre.value.trim() !== initialValues.nombre.trim() ||
            email.value.trim() !== initialValues.email.trim() ||
            username.value.trim() !== initialValues.username.trim()
        ) {
            saveBtn.disabled = false;
            saveBtn.classList.remove('btn-secondary');
            saveBtn.classList.add('btn-primary');
        } else {
            saveBtn.disabled = true;
            saveBtn.classList.remove('btn-primary');
            saveBtn.classList.add('btn-secondary');
        }
    }

    // Inicialmente deshabilitado y gris
    saveBtn.disabled = true;
    saveBtn.classList.remove('btn-primary');
    saveBtn.classList.add('btn-secondary');

    nombre.addEventListener('input', checkChanges);
    email.addEventListener('input', checkChanges);
    username.addEventListener('input', checkChanges);
});

document.addEventListener('DOMContentLoaded', function () {
    const currentPassword = document.getElementById('current_password');
    const newPassword = document.getElementById('new_password');
    const newPasswordConfirmation = document.getElementById('new_password_confirmation');
    const saveBtn = document.getElementById('save-btn');

    if (!currentPassword || !newPassword || !newPasswordConfirmation || !saveBtn) return;

    function checkPasswordFields() {
        if (
            currentPassword.value.trim() !== '' &&
            newPassword.value.trim() !== '' &&
            newPasswordConfirmation.value.trim() !== ''
        ) {
            saveBtn.disabled = false;
            saveBtn.classList.remove('btn-secondary');
            saveBtn.classList.add('btn-primary');
        } else {
            saveBtn.disabled = true;
            saveBtn.classList.remove('btn-primary');
            saveBtn.classList.add('btn-secondary');
        }
    }

    // Inicialmente deshabilitado y gris
    saveBtn.disabled = true;
    saveBtn.classList.remove('btn-primary');
    saveBtn.classList.add('btn-secondary');

    currentPassword.addEventListener('input', checkPasswordFields);
    newPassword.addEventListener('input', checkPasswordFields);
    newPasswordConfirmation.addEventListener('input', checkPasswordFields);
});


import Shepherd from 'shepherd.js';
import 'shepherd.js/dist/css/shepherd.css';

if (globalThis.showTutorial) {
    
    const tour = new Shepherd.Tour({
        useModalOverlay: true,
        defaultStepOptions: {
            scrollTo: true,
            classes: 'bg-light shadow-lg rounded-3'
        }
    });
    //PASO1: Página de Inicio (Botón de Inicio)
    tour.addStep({
        id: 'inicio-step',
        title: '¡Bienvenido a CanScan!',
        text: 'Este es el botón de Inicio. Úsalo para volver a la página principal cuando quieras.',
        attachTo: { element: '#nav-inicio', on: 'top' },
        buttons: [
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: () => globalThis.location.href = route('barcode') + '?tour_step=2'
            }
        ]
    });

    // PASO 2: Página de Escaneo (Botón de Cámara)
    tour.addStep({
        id: 'escanear-step',
        title: 'Aquí puedes encender la cámara',
        text: 'Usa este botón para activar o desactivar la cámara y escanear códigos de barras.',
        attachTo: { element: '#toggle-camera', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: () => globalThis.location.href = route('mostrar.Inicio')
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    // PASO 3: Página de Escaneo (Input Manual)
    tour.addStep({
        id: 'manualescanear-step',
        title: 'Aquí puedes escribir el código',
        text: 'Si no puedes usar la cámara, escribe el código de barras aquí y presiona "Mostrar producto".',
        attachTo: { element: '#barcode-input', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back 
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: () => globalThis.location.href = route('sugerir.producto') + '?tour_step=4' 
            }
        ]
    });

    // PASO 4: Página de Sugerir Producto
    tour.addStep({
        id: 'sugerir-step',
        title: 'Sugerir un Producto',
        text: 'Si un producto no está en nuestra base de datos, puedes usar esta sección para solicitar que lo agreguemos.',
        attachTo: { element: '#nav-sugerir', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: () => {
                    globalThis.location.href = route('barcode') + '?tour_step=2';
                }
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: () => {
                    globalThis.location.href = route('comparar.show') + '?tour_step=5';
                }
            }
        ]
    });

    // PASO 5: Página de Comparar Productos
    tour.addStep({
        id: 'comparar-step',
        title: 'Comparar Productos',
        text: 'Aquí puedes comparar diferentes productos y ver sus detalles.',
        attachTo: { element: '#nav-comparar', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: () => {
                    globalThis.location.href = route('sugerir.producto') + '?tour_step=4';
                }
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: () => {
                    globalThis.location.href = route('profile') + '?tour_step=6';
                }
            }
        ]
    });

    // PASO 6: Página de Perfil
    tour.addStep({
        id: 'profile-step',
        title: 'Tu Perfil',
        text: 'Con este botón puedes acceder a tu perfil y ajustar tus configuraciones.',
        attachTo: { element: '#nav-perfil', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: () => {
                    globalThis.location.href = route('comparar.show') + '?tour_step=5';
                }
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    tour.addStep({
        id: 'avatar-step',
        title: 'Avatar',
        text: 'Puedes cambiar tu avatar haciendo clic aquí.',
        attachTo: { element: '#current-avatar', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    tour.addStep({
        id: 'configuracion-step',
        title: 'Editar Perfil',
        text: 'Usa este botón para editar tu perfil y cambiar tu información personal y de seguridad.',
        attachTo: { element: '#edit', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    tour.addStep({
        id: 'soporte-step',
        title: 'Soporte',
        text: 'Si necesitas ayuda, puedes contactarnos aquí o visitar nuestras preguntas frecuentes.',
        attachTo: { element: '#soporte', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    tour.addStep({
        id: 'logout-step',
        title: 'Cerrar Sesión',
        text: 'Cuando termines, usa este botón para cerrar sesión de forma segura.',
        attachTo: { element: '#logout', on: 'top' },
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back
            },
            {
                text: 'Siguiente',
                classes: 'btn btn-primary',
                action: tour.next
            }
        ]
    });

    tour.addStep({
        id: 'end-step',
        title: '¡Eso es todo!',
        text: 'Has completado el recorrido. ¡Disfruta usando CanScan!',
        buttons: [
            {
                text: 'Atrás',
                classes: 'btn btn-secondary me-2',
                action: tour.back
            },
            {
                text: 'Finalizar',
                classes: 'btn btn-primary',
                action: () => {
                    globalThis.location.href = route('tour.completed');
                }
            }
        ]
    });

    // --- Lógica de Inicio Corregida ---

    const urlParams = new URLSearchParams(globalThis.location.search);
    const tourStepFromUrl = urlParams.get('tour_step');
    if (tourStepFromUrl) {
        if (tourStepFromUrl === '2') {
            tour.show('escanear-step');
        } else if (tourStepFromUrl === '4') { 
            tour.show('sugerir-step');
        } else if (tourStepFromUrl === '5') {
            tour.show('comparar-step');
        } else if (tourStepFromUrl === '6') {
            tour.show('profile-step');
        }
    } else {
        tour.start();
    }
}
