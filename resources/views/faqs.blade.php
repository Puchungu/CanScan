@extends('layouts.menu')
@section('title', 'Preguntas Frecuentes (FAQs)')
@section('content')
<div class="accordion" id="faqAccordion">
    <div class="text-center mb-4">
        <h2>Preguntas Frecuentes</h2>
        <p class="text-muted">Encuentra la solucion por ti solo</p>
    </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
        ¿Cómo funciona el escáner de productos?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        <strong>¡Es muy fácil!</strong> Simplemente presiona el botón central con el ícono de escáner en el menú inferior. Apunta la cámara de tu teléfono al código de barras del producto y espera un momento a que la aplicación lo detecte. Para mejores resultados, asegúrate de tener buena iluminación y que el código de barras no esté dañado.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
        ¿Qué hago si el escáner no detecta un código de barras?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        Si el escáner no funciona, puedes escribir el número del código de barras manualmente en el campo de texto y presionar "Buscar". A veces, los reflejos de la luz o un empaque dañado pueden dificultar la lectura automática.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
        ¿Qué pasa si un producto no se encuentra en la base de datos?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        ¡Puedes ayudarnos a crecer! Si un producto no se encuentra, te aparecerá la opción de **"Sugerir Producto"**. Al usarla, podrás enviarnos el nombre y la marca para que nuestro equipo lo revise y lo agregue a la base de datos de CanScan.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
        ¿De dónde obtienen la información de los productos?
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        Nuestra información proviene de dos fuentes principales: la base de datos pública **FoodData Central del Departamento de Agricultura de EE. UU. (USDA)** y los productos agregados por nuestra comunidad de usuarios y verificados por nuestro equipo.
      </div>
    </div>
  </div>
    
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
        ¿Para qué sirve la función de "Comparar"?
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        La función de "Comparar" te permite seleccionar hasta 4 productos y ver sus componentes nutricionales lado a lado. Es una herramienta muy útil para tomar decisiones informadas sobre qué producto es más saludable o se adapta mejor a tu dieta.
      </div>
    </div>
  </div>
    
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
        ¿Es necesario registrarse para usar la aplicación?
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        Sí, para escanear productos y usar funciones como "Comparar" o "Sugerir Producto" necesitas una cuenta. El registro es rápido, gratuito y nos permite ofrecerte una experiencia personalizada.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
        No recibí mi correo de verificación, ¿qué hago?
      </button>
    </h2>
    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        Primero, revisa tu carpeta de correo no deseado o "Spam". Si después de unos minutos no lo has recibido, intenta iniciar sesión y te aparecerá una opción para **"Reenviar correo de verificación"**. Si el problema persiste, por favor, contáctanos a través de la sección "Reportar Error".
      </div>
    </div>
  </div>
    
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
        ¿Mis datos personales están seguros?
      </button>
    </h2>
    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
      <div class="accordion-body">
        <strong>Absolutamente.</strong> La seguridad de tus datos es nuestra prioridad. Tu contraseña se almacena de forma encriptada (usando hashing) y nunca en texto plano. Toda la comunicación con nuestros servidores está protegida.
      </div>
    </div>
  </div>

</div>
@endsection
