import './bootstrap';
import Quagga from 'quagga';

let cameraActive = false;

const toggleButton = document.getElementById('toggle-camera');
const imgOn = document.getElementById('img-on');
const imgOff = document.getElementById('img-off');
const barcodeInput = document.getElementById('barcode-input');


function startCamera() {
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: document.querySelector('#camara')
        },
        decoder : {
            readers : ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "upc_reader", "upc_e_reader"]
        }
    }, function(err) {
        if (err) {
            console.log(err);
            return;
        }
        Quagga.start();
        cameraActive = true;
        toggleButton.textContent = "Apagar cámara";
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
            barcodeInput.style.color = "#222"; // Muestra el texto cuando se escanea
        }
    });


function stopCamera() {
    Quagga.stop();
    cameraActive = false;
    toggleButton.textContent = "Encender cámara";
    if (imgOn && imgOff) {
        imgOn.style.display = "none";
        imgOff.style.display = "inline";
    }
    if (barcodeInput) {
        barcodeInput.style.color = "transparent"; // Vuelve a ocultar el texto si quieres
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