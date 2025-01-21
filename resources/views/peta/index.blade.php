<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <link rel="stylesheet" href="{{ asset('css/filament/styles.css') }}">
    <style>
        #map { height: 600px; }
    </style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost:8000/peta">Provinsi</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/regencies">Kabupaten/Kota</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/populasi">Data Non-Spasial</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="text-align: center">
            <h1>Data Provinsi di Indonesia</h1>
        </div>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let provinces = @json($list_provinsi);
            console.log(provinces);

            provinces.forEach(function(province){
                L.marker([province.latitude, province.longitude]).addTo(map).bindPopup(province.name);
            })
        </script>
    </body>
</html>