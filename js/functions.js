const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

document.getElementById('form_qr').onsubmit = function (event) {
	event.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

	// Obtener la pestaña activa
	const activeTab = document.querySelector('#myTabs .nav-link.active');
	const activeTabId = activeTab.getAttribute('aria-controls'); // Obtiene el ID del contenido de la pestaña activa

	let formData = new FormData(this); // Serializa los datos del formulario
	formData.append('activeTab', activeTabId); // Agrega la pestaña activa al FormData

	fetch('includes/genera_qr.php', {
		method: 'POST',
		body: formData,
		cache: 'no-cache'
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok ' + response.statusText);
			}
			return response.text(); // o response.json() si esperas una respuesta JSON
		})
		.then(data => {
			document.getElementById('img-qr').src = data;
		})
		.catch(error => {
			// Manejar errores
			document.getElementById('alert_placeholder').innerHTML = `
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <span class="error-response">${error.message}</span>
            </div>`;
		});
};

document.getElementById('descargar').addEventListener('click', function () {
	var img = document.getElementById('img-qr');

	var link = document.createElement('a');
	link.href = img.src;
	link.download = 'qr-cdp.png';

	// Simular el clic en el enlace para iniciar la descarga
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
});
