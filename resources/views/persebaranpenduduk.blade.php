<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta Tematik Persebaran Penduduk Sumatera Barat</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
  <style>
    #map { height: 600px; }
    .legend {
      background: white;
      padding: 10px;
      line-height: 1.5em;
      border-radius: 5px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }
    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.7;
    }
  </style>
</head>
<body>
  <div style="text-align: center">
    <h1>Peta Tematik Persebaran Penduduk di Sumatera Barat</h1>
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

    // Data Persebaran Penduduk (berdasarkan data BPS)
    var dataPersebaran = [
      { region: "Kota Padang", density: 1655, coordinates: [-0.947083, 100.417181] },
      { region: "Kota Bukittinggi", density: 4852, coordinates: [-0.305441, 100.369225] },
      { region: "Kota Pariaman", density: 1125, coordinates: [-0.625831, 100.120317] },
      { region: "Kota Padang Panjang", density: 1411, coordinates: [-0.470982, 100.408898] },
      { region: "Kota Payakumbuh", density: 1847, coordinates: [-0.229785, 100.630199] },
      { region: "Kota Solok", density: 1134, coordinates: [-0.789275, 100.659901] },
      { region: "Kota Sawahlunto", density: 293, coordinates: [-0.680041, 100.785038] },
      { region: "Kabupaten Kepulauan Mentawai", density: 20, coordinates: [-2.078711, 99.579992] },
      { region: "Kabupaten Agam", density: 280, coordinates: [-0.264190, 100.164707] },
      { region: "Kabupaten Lima Puluh Kota", density: 117, coordinates: [-0.076705, 100.559280] },
      { region: "Kabupaten Padang Pariaman", density: 299, coordinates: [-0.567975, 100.179252] },
      { region: "Kabupaten Pasaman", density: 107, coordinates: [0.125153, 99.919868] },
      { region: "Kabupaten Pasaman Barat", density: 86, coordinates: [0.226415, 99.565689] },
      { region: "Kabupaten Pesisir Selatan", density: 100, coordinates: [-1.454543, 100.767257] },
      { region: "Kabupaten Sijunjung", density: 63, coordinates: [-0.759090, 101.325768] },
      { region: "Kabupaten Tanah Datar", density: 267, coordinates: [-0.463490, 100.572269] },
      { region: "Kabupaten Solok", density: 88, coordinates: [-0.956566, 100.717361] },
      { region: "Kabupaten Dharmasraya", density: 39, coordinates: [-1.092122, 101.659279] }
    ];

    // Fungsi untuk Menentukan Warna Berdasarkan Kepadatan Penduduk
    function getColor(density) {
      return density > 3000 ? '#800026' :
             density > 1000 ? '#BD0026' :
             density > 500  ? '#E31A1C' :
             density > 200  ? '#FC4E2A' :
             density > 100  ? '#FD8D3C' :
             density > 50   ? '#FEB24C' :
             '#FFEDA0';
    }

    // Menambahkan Marker dan Gaya Warna Berdasarkan Kepadatan
    dataPersebaran.forEach(function(item) {
      L.circleMarker(item.coordinates, {
        radius: 10,
        fillColor: getColor(item.density),
        color: '#000',
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
      }).addTo(map).bindPopup(`
        <b>${item.region}</b><br>
        Kepadatan Penduduk: ${item.density} jiwa/km²
      `);
    });

    // Menambahkan Legenda
    var legend = L.control({ position: "bottomright" });

    legend.onAdd = function(map) {
      var div = L.DomUtil.create("div", "legend"),
          grades = [0, 50, 100, 200, 500, 1000, 3000],
          labels = [];

      div.innerHTML = '<b>Kepadatan Penduduk</b><br>';
      for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
          '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
          grades[i] + (grades[i + 1] ? '–' + grades[i + 1] + '<br>' : '+');
      }
      return div;
    };

    legend.addTo(map);
  </script>
</body>
</html>
