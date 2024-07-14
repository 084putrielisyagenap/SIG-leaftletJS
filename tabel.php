<?php include 'lib/head_table.php' ?>
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Lokasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th>Latitude, Longitude</th>
                                <th>Nama Sekolah</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th class="text-right">Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                // Setup pagination
                                $limit = 5; // Number of entries to show in a page.
                                if (isset($_GET["page"])) {
                                    $page  = $_GET["page"];
                                } else {
                                    $page = 1;
                                };
                                $start_from = ($page - 1) * $limit;

                                // Fetch data with pagination
                                $query = "SELECT * FROM tb_lokasi LIMIT $start_from, $limit";
                                $tampil = mysqli_query($konek, $query);
                                $no = $start_from + 1;
                                while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['latlng']; ?></td>
                                        <td><?php echo $data['nama_lokasi']; ?></td>
                                        <td><?php echo $data['kategori']; ?></td>
                                        <td><img src="gambar/<?php echo $data['gambar']; ?>" alt="gambar" style="max-width: 100px;"></td>
                                        <td class="text-right">
                                            <a href="edit.php?id_lokasi=<?php echo $data["id_lokasi"]; ?>"><button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg></button></a>
                                            <a href="prosesHapus.php?id_lokasi=<?php echo $data["id_lokasi"]; ?>"><button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg></button></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                    // Pagination logic
                    $result_db = mysqli_query($konek, "SELECT COUNT(id_lokasi) FROM tb_lokasi");
                    $row_db = mysqli_fetch_row($result_db);
                    $total_records = $row_db[0];
                    $total_pages = ceil($total_records / $limit);
                    $pagLink = "<nav><ul class='pagination'>";
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $pagLink .= "<li class='page-item'><a class='page-link' href='tabel.php?page=" . $i . "'>" . $i . "</a></li>";
                    }
                    echo $pagLink . "</ul></nav>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'lib/footer.php' ?>
</body>

</html>