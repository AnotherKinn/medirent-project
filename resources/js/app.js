import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// =======================
//  LEAFLET SETUP
// =======================
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

// Fix path icon leaflet (wajib)
delete L.Icon.Default.prototype._getIconUrl;

L.Icon.Default.mergeOptions({
    iconRetinaUrl: '/images/marker-icon-2x.png',
    iconUrl: '/images/marker-icon.png',
    shadowUrl: '/images/marker-shadow.png',
});

// Bikin fungsi global untuk inisialisasi map
window.initLeafletMap = function (lat, lng, popupText = "Puskesmas Gunung Putri") {
    const map = L.map('map').setView([lat, lng], 15);

    // Load tile OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Add marker
    L.marker([lat, lng]).addTo(map)
        .bindPopup(popupText)
        .openPopup();
};
