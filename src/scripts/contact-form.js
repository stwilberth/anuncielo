// Manejador del formulario de contacto
document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('formulario-contacto');
  
  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      // Obtener los datos del formulario
      const formData = new FormData(contactForm);
      const formDataObj = {};
      
      formData.forEach((value, key) => {
        formDataObj[key] = value;
      });
      
      // Mostrar mensaje de carga
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.textContent;
      submitBtn.textContent = 'Enviando...';
      submitBtn.disabled = true;
      
      try {
        // Simulación de envío (en producción, reemplazar con llamada real a API)
        await new Promise(resolve => setTimeout(resolve, 1500));
        
        // Mostrar mensaje de éxito
        contactForm.innerHTML = `
          <div class="form-success">
            <h3>¡Mensaje enviado con éxito!</h3>
            <p>Gracias por contactarnos. Nos pondremos en contacto contigo lo antes posible.</p>
          </div>
        `;
        
        // En producción, aquí iría el código para enviar los datos a un servidor
        console.log('Datos del formulario:', formDataObj);
      } catch (error) {
        // Mostrar mensaje de error
        console.error('Error al enviar el formulario:', error);
        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
        
        const errorMsg = document.createElement('div');
        errorMsg.className = 'form-error';
        errorMsg.textContent = 'Hubo un error al enviar el formulario. Por favor, inténtalo de nuevo.';
        
        contactForm.prepend(errorMsg);
        
        // Eliminar mensaje de error después de 5 segundos
        setTimeout(() => {
          errorMsg.remove();
        }, 5000);
      }
    });
  }
});