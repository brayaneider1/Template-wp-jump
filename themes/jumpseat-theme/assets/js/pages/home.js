
document.addEventListener('DOMContentLoaded', () => {

    const leadForm = document.getElementById('selva-lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button');
            const responseDiv = document.getElementById('form-response');

            btn.innerText = 'PROCESANDO...';
            btn.disabled = true;

            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/wp-json/selva/v1/contact', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                const result = await response.json();

                responseDiv.innerText = result.message;
                if (result.success) {
                    e.target.reset();
                    responseDiv.style.color = 'var(--color-accent)';
                } else {
                    responseDiv.style.color = '#ff4444';
                }
            } catch (error) {
                responseDiv.innerText = 'Error crítico de conexión.';
                responseDiv.style.color = '#ff4444';
            } finally {
                btn.innerText = 'ENVIAR SOLICITUD';
                btn.disabled = false;
            }
        });
    }
});
