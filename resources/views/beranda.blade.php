<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 800px; }
    </style>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
    <body>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let loi = {
        "type": "FeatureCollection",
        "features": [
    {
            "type": "Feature",
            "properties": {
        "nama": "Kota Depok"
        },
            "geometry": {
            "coordinates": [
                106.81456713756666,
                -6.406931128806477
        ],
        "type": "Point"
        },
            "id": 0
        },
        {
            "type": "Feature",
            "properties": {
        "nama": "Kota Jakarta"
        },
        "geometry": {
        "coordinates": [
            106.82645592437746,
            -6.174179543588949
            ],
        "type": "Point"
        },
        "id": 1
    },
    {
        "type": "Feature",
        "properties": {
        "nama": "Kota Bandung"
        },
        "geometry": {
        "coordinates": [
            107.60751986865898,
            -6.924029576254881
        ],
        "type": "Point"
        },
        "id": 2
    }
    ]
}
var geojson = L.geoJSON(loi, {
        onEachFeature: function (feature, layer) {
        layer.bindPopup(feature.properties.nama);
        }
}).addTo(map);
    
L.geoJSON(geojson).bindPopup(function(layer){
        return layer.feature.properties.nama 
}).addTo(map);
        </script>
    </body>
</html>