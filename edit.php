<?php include 'lib/head.php'; ?>

<?php
include 'konek.php';

$id = $_GET['id_lokasi'];

$tampil = mysqli_query($konek, "SELECT * FROM tb_lokasi WHERE id_lokasi='$id'");
$hasil = mysqli_fetch_array($tampil);

$latlng = $hasil['latlng'];
$nama_lokasi = $hasil['nama_lokasi'];
$kategori = $hasil['kategori'];
$marker = $hasil['marker'];
$gambar = $hasil['gambar'];
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div id="map" class="text-center"></div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="Data">
                                <form action="prosesEdit.php" method="post" enctype="multipart/form-data">
                                    <div class="form-groub">
                                        <label for="id_lokasi"></label>
                                        <input type="hidden" class="form-control" id="id_lokasi" name="id_lokasi" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="form-groub">
                                        <label for="latlng">Latitude, Longitude</label>
                                        <input type="text" class="form-control" id="latlng" name="latlng" value="<?php echo $latlng; ?>">
                                    </div>
                                    <div class="form-groub">
                                        <label for="nama_lokasi">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="<?php echo $nama_lokasi; ?>">
                                    </div>
                                    <div class="form-groub">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori" onchange="updateMarker()">
                                            <option value="" class="text-center">===Pilih Kategori===</option>
                                            <option value="Taman Kanak-Kanak" <?php if ($kategori == "Taman Kanak-Kanak") echo "selected"; ?>>Taman Kanak-Kanak</option>
                                            <option value="Sekolah Dasar" <?php if ($kategori == "Sekolah Dasar") echo "selected"; ?>>Sekolah Dasar</option>
                                            <option value="Sekolah Menengah Pertama" <?php if ($kategori == "Sekolah Menengah Pertama") echo "selected"; ?>>Sekolah Menengah Pertama</option>
                                            <option value="Sekolah Menengah Atas" <?php if ($kategori == "Sekolah Menengah Atas") echo "selected"; ?>>Sekolah Menengah Atas</option>
                                            <option value="Pesantren" <?php if ($kategori == "Pesantren") echo "selected"; ?>>Pesantren</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="marker" name="marker">
                                    <div class="form-groub">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                    </div>
                                    <div class="form-groub mb-3 mt-3">
                                        <button type="submit" class="btn btn-primary form-control" name="btnEdit" value="edit">Edit Data</button>
                                    </div>
                                </form>
                                <div class="form-groub mb-3 mt-3">
                                    <a href="tabel.php"><button type="button" class="btn btn-primary form-control">Kembali</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    var map = L.map('map').setView([<?php echo $latlng; ?>], 18);

    // tileLayer
    var tileLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    // Google map layer
    var Googlemap = googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    // Hybrid
    var Hybrid = googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    // Terrain
    var Terrain = googleTerrain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    // Layer Control
    var baseLayers = {
        "TileLayer": tileLayer,
        "GoogleStreets": Googlemap,
        "Hybrid": Hybrid,
        "Terrain": Terrain
    };

    var overlays = {
        // "Marker": Googlemap
    };

    L.control.layers(baseLayers, overlays).addTo(map);


    var popup = L.popup();

    function onMapClick(e) {
        var latlng = e.latlng;
        var lat = latlng.lat.toFixed(6);
        var lng = latlng.lng.toFixed(6);
        var latlng_format = lat + ', ' + lng;

        console.log('Latlng: ' + latlng_format); // Add this line to debug
        document.getElementById('latlng').value = latlng_format;

        popup
            .setLatLng(e.latlng)
            .setContent("Titik Koordinat nya adalah <br> " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    var greenIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-<?= $marker ?>.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var marker = L.marker([<?php echo $latlng ?>], {
        icon: greenIcon
    }).addTo(map);
    marker.bindPopup("<b><?php echo $nama_lokasi ?></b><br><b><?php echo $kategori ?></b><br><img src='gambar/<?php echo $gambar ?>' alt='gambar' width='160px'>");
</script>
<script>
    function updateMarker() {
        var kategori = document.getElementById("kategori").value;
        var marker = document.getElementById("marker");
        var markerOptions = {
            "Taman Kanak-Kanak": "gold",
            "Sekolah Dasar": "red",
            "Sekolah Menengah Pertama": "blue",
            "Sekolah Menengah Atas": "grey",
            "Pesantren": "violet"
        };
        marker.value = markerOptions[kategori];
    }
</script>

</html>