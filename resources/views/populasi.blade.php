<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta Non-Spasial Sumatera Barat</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
  <link rel="stylesheet" href="{{ asset('css/filament/styles.css') }}">
  <style>
    #map { height: 600px; }

    
  </style>
</head>
<body>
          <!-- Responsive navbar-->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="http://localhost:8000/beranda">Project 2 SIG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/beranda">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/peta">Provinsi</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/regencies">Kabupaten/Kota</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost:8000/populasi">Data Non-Spasial</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <div style="text-align: center">
    <h1>Data Non-Spasial di Sumatera Barat</h1>
    <h3>Sumber Data: Badan Pusat Statistik</h3>
  </div>
  <div id="map"></div>
  <script>
    // Inisialisasi Peta
    var map = L.map('map').setView([-0.739939, 100.340576], 8); // Fokus pada Sumatera Barat
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Data Non-Spasial Seluruh Kabupaten/Kota di Sumatera Barat
    var dataNonSpasial = [
      { region: "Kota Padang", population: 909040, area: 694.96, density: (909040 / 694.96).toFixed(2), tpt: 6.5, aps: 96.7, ipm: 82.73, coordinates: [-0.947083, 100.417181] },
      { region: "Kota Bukittinggi", population: 121520, area: 25.24, density: (121520 / 25.24).toFixed(2), tpt: 5.8, aps: 97.5, ipm: 83.45, coordinates: [-0.305441, 100.369225] },
      { region: "Kota Payakumbuh", population: 136419, area: 80.43, density: (136419 / 80.43).toFixed(2), tpt: 4.7, aps: 97.0, ipm: 81.56, coordinates: [-0.234591, 100.632568] },
      { region: "Kota Solok", population: 170510, area: 57.64, density: (170510 / 57.64).toFixed(2), tpt: 5.3, aps: 96.9, ipm: 80.12, coordinates: [-0.797223, 100.651230] },
      { region: "Kota Pariaman", population: 92010, area: 73.36, density: (92010 / 73.36).toFixed(2), tpt: 6.2, aps: 96.8, ipm: 81.34, coordinates: [-0.625831, 100.120317] },
      { region: "Kota Padang Panjang", population: 52430, area: 23.00, density: (52430 / 23.00).toFixed(2), tpt: 5.0, aps: 98.2, ipm: 83.91, coordinates: [-0.458157, 100.403914] },
      { region: "Kota Sawahlunto", population: 60310, area: 273.45, density: (60310 / 273.45).toFixed(2), tpt: 6.1, aps: 95.6, ipm: 79.87, coordinates: [-0.610920, 100.785290] },
      { region: "Kabupaten Agam", population: 529138, area: 2325.86, density: (529138 / 2325.86).toFixed(2), tpt: 4.5, aps: 96.5, ipm: 79.03, coordinates: [-0.264190, 100.164707] },
      { region: "Kabupaten Lima Puluh Kota", population: 378120, area: 3354.53, density: (378120 / 3354.53).toFixed(2), tpt: 5.2, aps: 96.4, ipm: 77.21, coordinates: [-0.076705, 100.559280] },
      { region: "Kabupaten Tanah Datar", population: 362030, area: 1336.60, density: (362030 / 1336.60).toFixed(2), tpt: 4.9, aps: 96.6, ipm: 80.45, coordinates: [-0.451607, 100.572464] },
      { region: "Kabupaten Pesisir Selatan", population: 460820, area: 5749.89, density: (460820 / 5749.89).toFixed(2), tpt: 6.0, aps: 95.9, ipm: 76.90, coordinates: [-1.401260, 100.934242] },
      { region: "Kabupaten Sijunjung", population: 207400, area: 3128.10, density: (207400 / 3128.10).toFixed(2), tpt: 5.6, aps: 96.1, ipm: 76.12, coordinates: [-0.797944, 101.081388] },
      { region: "Kabupaten Dharmasraya", population: 219880, area: 2986.13, density: (219880 / 2986.13).toFixed(2), tpt: 6.2, aps: 95.7, ipm: 75.84, coordinates: [-1.018048, 101.584579] },
      { region: "Kabupaten Pasaman", population: 274810, area: 3947.63, density: (274810 / 3947.63).toFixed(2), tpt: 5.8, aps: 96.3, ipm: 76.34, coordinates: [0.132943, 99.918758] },
      { region: "Kabupaten Pasaman Barat", population: 417310, area: 3876.83, density: (417310 / 3876.83).toFixed(2), tpt: 5.7, aps: 95.5, ipm: 75.67, coordinates: [0.278141, 99.572056] },
      { region: "Kabupaten Solok Selatan", population: 181430, area: 3346.20, density: (181430 / 3346.20).toFixed(2), tpt: 6.0, aps: 95.8, ipm: 75.03, coordinates: [-1.486581, 101.237408] },
      { region: "Kabupaten Padang Pariaman", population: 430630, area: 1328.79, density: (430630 / 1328.79).toFixed(2), tpt: 5.3, aps: 96.0, ipm: 78.34, coordinates: [-0.598607, 100.220540] },
      { region: "Kabupaten Kepulauan Mentawai", population: 105280, area: 6011.35, density: (105280 / 6011.35).toFixed(2), tpt: 7.8, aps: 94.3, ipm: 65.21, coordinates: [-1.989860, 99.615502] },
      { region: "Kabupaten Solok", population: 390320, area: 3738.00, density: (390320 / 3738.00).toFixed(2), tpt: 5.4, aps: 96.2, ipm: 77.56, coordinates: [-0.926059, 100.689177] }
    ];

    // Menambahkan Marker ke Peta
    dataNonSpasial.forEach(function(item) {
      var popupContent = `
        <b>${item.region}</b><br>
        Populasi: ${item.population}<br>
        Luas Wilayah: ${item.area} km²<br>
        Kepadatan Penduduk: ${item.density} jiwa/km²<br>
        Tingkat Pengangguran Terbuka: ${item.tpt}%<br>
        Angka Partisipasi Sekolah: ${item.aps}%<br>
        Indeks Pembangunan Manusia: ${item.ipm}
      `;
      L.marker(item.coordinates).addTo(map).bindPopup(popupContent);
    });
  </script>
</body>
</html>
