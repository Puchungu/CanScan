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
    // Quitar SVG antes de iniciar cámara
    if (camaraDiv) {
        camaraDiv.innerHTML = '';
    }
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: camaraDiv,
            constraints: {
            facingMode: "environment"},
            area: { 
                width: { min: 1280 },
                height: { min: 720 }
    }
        },
        decoder : {
            readers : ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "upc_reader", "upc_e_reader"]
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

// Escuchar el resultado del escaneo
Quagga.onDetected(function(result) {
    if (barcodeInput && result && result.codeResult && result.codeResult.code) {
        barcodeInput.value = result.codeResult.code;
    }
});
function stopCamera() {
    Quagga.stop();
    cameraActive = false;
    toggleButton.textContent = "Encender cámara";
    toggleButton.classList.remove('btn-rojo');
    toggleButton.classList.add('btn-outline-success');
    if (imgOn && imgOff) {
    }
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
