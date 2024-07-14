<?php include 'lib/head.php' ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<?php include 'lib/navbar.php' ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    Maps
                </div>
                <div class="card-body ">
                    <form action="" method="post">
                        <div class="input-group no-border">
                            <input type="text" name="keyword" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button type="submit" class="btn btn-primary" name="cari"><i class="nc-icon nc-zoom-split"></i></button>
                                    <button type="reset" class="btn btn-secondary"><i class="nc-icon nc-refresh-69"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="map" class="map"></div>
                    <div class="col-12">
                        <!-- <div id="map" class="text-center"></div> -->
                        <div class="col-12">
                            <div class="Data">
                                <form action="tambah.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="latlng">Latitude, Longitude</label>
                                        <input type="text" class="form-control" id="latlng" name="latlng" required placeholder="Tekan pada peta lokasinya">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lokasi">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required placeholder="Masukkan nama sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori" required onchange="updateMarker()">
                                            <option value="" class="text-center">===Pilih Kategori===</option>
                                            <option value="Taman Kanak-Kanak">Taman Kanak-Kanak</option>
                                            <option value="Sekolah Dasar">Sekolah Dasar</option>
                                            <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                            <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                                            <option value="Pesantren">Pesantren</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="marker" name="marker" required>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                                    </div>
                                    <div class="form-group mb-3 mt-3">
                                        <button type="submit" class="btn btn-primary form-control" name="btnTambah" value="tambah">Tambah Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'lib/footer.php' ?>

<script>
    var map = L.map('map').setView([-4.832626281445726, 122.7207966678327], 14);

    // tileLayer
    var tileLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Google map layer
    var Googlemap = googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

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


    <?php
    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $tampilkan = mysqli_query($konek, "SELECT * FROM tb_lokasi WHERE nama_lokasi LIKE '%$keyword%'OR kategori LIKE '%$keyword%'");
    } else {
        $tampilkan = mysqli_query($konek, "SELECT * FROM tb_lokasi");
    }

    while ($data = mysqli_fetch_array($tampilkan)) { ?>
        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-<?= $data["marker"] ?>.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var marker = L.marker([<?php echo $data["latlng"] ?>], {
            icon: greenIcon
        }).addTo(map);
        marker.bindPopup("<b>Nama Sekolah : <?php echo $data["nama_lokasi"] ?></b><br><b>Kategori : <?php echo $data["kategori"] ?></b><br><img src='gambar/<?php echo $data['gambar'] ?>' alt='gambar' width='160px'>");

    <?php } ?>
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
</body>

</html>