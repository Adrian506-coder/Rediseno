document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const nombre = document.getElementById('nombre_contacto');
  const correo = document.getElementById('correo_contacto');
  const mensaje = document.getElementById('mensaje_contacto');

  const errorNombre = document.getElementById('error-nombre');
  const errorCorreo = document.getElementById('error-correo');
  const errorMensaje = document.getElementById('error-mensaje');
  const feedback = document.getElementById('contact-feedback');

  function clearErrors() {
    errorNombre.textContent = '';
    errorCorreo.textContent = '';
    errorMensaje.textContent = '';
    feedback.textContent = '';
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  form.addEventListener('submit', function (e) {
    clearErrors();
    let hasError = false;

    if (!nombre.value || nombre.value.trim().length < 2) {
      errorNombre.textContent = 'Por favor ingrese su nombre (mínimo 2 caracteres).';
      hasError = true;
    }

    if (!correo.value || !validateEmail(correo.value.trim())) {
      errorCorreo.textContent = 'Ingrese un correo válido.';
      hasError = true;
    }

    if (!mensaje.value || mensaje.value.trim().length < 10) {
      errorMensaje.textContent = 'El mensaje debe tener al menos 10 caracteres.';
      hasError = true;
    }

    if (hasError) {
      feedback.textContent = 'Corrija los errores en el formulario.';
      feedback.style.color = '#f44336';
      e.preventDefault();
      return;
    }

    // Opcional: mostrar mensaje de envio y permitir submit (servidor mostrará confirmación real)
    feedback.textContent = 'Enviando mensaje...';
    feedback.style.color = '#2e7d32';
  });
});
