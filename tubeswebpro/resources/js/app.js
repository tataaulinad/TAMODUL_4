document.addEventListener('DOMContentLoaded', () => {
	if (window.AOS) {
		AOS.init({
			duration: 800,
			easing: 'ease-in-out',
			once: true,
		});
	}

	initChart();
	initMap();
	prepareReportForm();
});

function initChart() {
	const chartElement = document.getElementById('floodChart');

	if (!chartElement || !window.Chart) {
		return;
	}

	const ctx = chartElement.getContext('2d');

	new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Hari 1', 'Hari 2', 'Hari 3', 'Hari 4', 'Hari 5'],
			datasets: [{
				label: 'Ketinggian Air (m)',
				data: [1.0, 1.5, 2.0, 2.5, 3.0],
				borderColor: '#ffffff',
				backgroundColor: 'rgba(255, 255, 255, 0.2)',
				fill: true,
				tension: 0.4,
			}],
		},
		options: {
			responsive: true,
			animation: {
				duration: 1400,
				easing: 'easeOutQuart',
			},
			plugins: {
				legend: {
					labels: {
						color: '#ffffff',
					},
				},
			},
			scales: {
				x: {
					ticks: { color: '#ffffff' },
					grid: { color: 'rgba(255,255,255,0.12)' },
				},
				y: {
					ticks: { color: '#ffffff' },
					grid: { color: 'rgba(255,255,255,0.12)' },
				},
			},
		},
	});
}

function initMap() {
	const mapElement = document.getElementById('map');

	if (!mapElement || !window.L) {
		if (mapElement) {
			mapElement.innerHTML = '<div class="alert alert-warning m-3">Peta belum bisa dimuat karena Leaflet tidak tersedia.</div>';
		}

		return;
	}

	const map = L.map('map').setView([-6.2, 106.816666], 10);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors',
	}).addTo(map);

	const sensors = [
		{ name: 'Sungai A', status: 'Normal', lat: -6.2, lng: 106.816666, color: 'green' },
		{ name: 'Sungai B', status: 'Siaga', lat: -6.15, lng: 106.83, color: 'orange' },
		{ name: 'Sungai C', status: 'Bahaya', lat: -6.23, lng: 106.79, color: 'red' },
	];

	sensors.forEach((sensor) => {
		const marker = L.circleMarker([sensor.lat, sensor.lng], {
			color: sensor.color,
			radius: 11,
			fillOpacity: 0.85,
		}).addTo(map);

		marker.bindTooltip(`<b>${sensor.name}</b><br>Status: ${sensor.status}`, {
			direction: 'top',
		});
	});
}

function prepareReportForm() {
	const form = document.getElementById('reportForm');

	if (!form) {
		return;
	}

	const photo = document.getElementById('photo');
	const preview = document.getElementById('photoPreview');

	if (photo && preview) {
		photo.addEventListener('change', () => {
			const file = photo.files?.[0];

			if (!file) {
				preview.innerHTML = '';
				return;
			}

			const reader = new FileReader();
			reader.onload = () => {
				preview.innerHTML = `<img src="${reader.result}" class="img-fluid rounded-4" alt="Preview foto laporan">`;
			};
			reader.readAsDataURL(file);
		});
	}
}

function captureSnapshot() {
	const video = document.getElementById('cameraStream');
	const modalBody = document.querySelector('#snapshotModal .modal-body');

	if (!video || !modalBody) {
		return;
	}

	const canvas = document.createElement('canvas');
	canvas.width = video.videoWidth || 1280;
	canvas.height = video.videoHeight || 720;
	canvas.getContext('2d').drawImage(video, 0, 0);

	const image = document.createElement('img');
	image.src = canvas.toDataURL('image/png');
	image.className = 'img-fluid rounded-4';

	modalBody.innerHTML = '';
	modalBody.appendChild(image);

	const snapshotModal = document.getElementById('snapshotModal');

	if (snapshotModal && window.bootstrap) {
		new bootstrap.Modal(snapshotModal).show();
	}
}
