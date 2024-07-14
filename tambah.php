<?php
include 'konek.php';

if (isset($_POST['btnTambah'])) {
    $latlng = $_POST['latlng'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $kategori = $_POST['kategori'];
    $marker = $_POST['marker'];



    $gambar = $_FILES['gambar']['name'];
    $dir = 'gambar/';
    $dirFile = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($dirFile, $dir . $gambar)) {
        $query = mysqli_query($konek, "INSERT INTO tb_lokasi (latlng, nama_lokasi, kategori, marker, gambar) VALUES ('$latlng', '$nama_lokasi', '$kategori', '$marker', '$gambar')");

        if ($query) {
            header('Location: index.php');
        } else {
            echo "Error: " . mysqli_error($konek);
        }
    } else {
        echo "Failed to upload image.";
    }
}
