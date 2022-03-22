<?php

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css" integrity="sha512-888I2nScRzrb/WNZ3qsa5kiZNmaEsvz8HEVQZRGokIEOj/sMnUlLClqP7itKJYDhXWsmp+1usxoCidSEfW2rWw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js" integrity="sha512-0wCoO9w07Mu4MnC918HEsFyXhVJVoxeq+RD4XXYukmLswUHMCRbBomZE+NjxBtv88QTU/fImTY+PclhlMpJ4JA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

</head>

<?php
require 'koneksi.php'
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Data Master Artikel</h1>

                <div class="mb-5 justify-content-center item-center mt-auto">
                    <a href="create.php" class="btn btn-primary text-center">Tambah Artikel</a>
                    <!-- <a href="penjualan.php" class="btn btn-primary float-left">Tambah Transaksi</a> -->
                </div>
                <div>
                    <table class="table table-responsive table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Judul Artikel</th>
                                <th>Isi Artikel</th>
                                <th>Penulis Artikel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no = 1;

                            $sql = $koneksi->query("SELECT * FROM tb_artikel");

                            while ($data = $sql->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?php echo $data['judul_artikel']; ?></td>
                                    <td><?php echo $data['isi_artikel']; ?></td>
                                    <td><?php echo $data['penulis_artikel']; ?></td>
                                    <td>
                                        <a class="btn btn-secondary mt-1" href="detail-komentar.php?id=<?php echo $data['id'] ?>"> Lihat Komentar</a>

                                        <a class="btn btn-warning mt-1" href="ubah.php?id=<?php echo $data['id'] ?>">Ubah Artikel</a>
                                        <a class="btn btn-primary mt-1" href="komentar.php?id=<?php echo $data['id'] ?>">Tambah Komentar</a>
                                        <a class="btn btn-danger mt-1" href="hapus.php?id=<?php echo $data['id'] ?>">Hapus</a>
                                    </td>
                                </tr>
                            </div>
                            <?php  } ?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>

    </div>

</body>

</html>