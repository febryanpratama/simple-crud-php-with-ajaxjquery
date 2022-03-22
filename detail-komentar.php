<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>

<?php
require 'koneksi.php';


$id_artikel = $_GET['id'];

$sql = $koneksi->query("select * from tb_artikel where id='$id_artikel'");

$tampil = $sql->fetch_assoc();

// var_dump($tampil);

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Lihat Komentar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- <form method="POST" action="proses.php"> -->
                                    <input type="hidden" name="id_artikel" value="<?php echo $tampil['id']; ?>">
                                    <div class="form-group">
                                        <label>Judul Artikel</label>
                                        <input type="text"  class="form-control" value="<?php echo $tampil['judul_artikel']; ?>" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea  id="" cols="30" rows="10" class="form-control" readonly><?php echo $tampil['isi_artikel']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Penulis Artikel</label>
                                        <input type="text"  class="form-control" value="<?php echo $tampil['penulis_artikel']; ?>"  readonly/>
                                    </div>

                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h5 class="text-center">DETAIL KOMENTAR</h5 class="text-center">
                            <table class="table table-responsive table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Judul Artikel</th>
                                        <th>Nama Komentator</th>
                                        <th>Komentar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                    $no_urut= 0;
                                    $id_artikel = $_GET['id'];

                                    $q = $koneksi->query("SELECT * FROM tb_komentar tk JOIN tb_artikel ta ON ta.id=tk.id_artikel WHERE id_artikel='$id_artikel'");
                                    if ($q->num_rows>0) {
                                        while ($data = $q->fetch_assoc()) {
                                            $no_urut++;
                                            extract($data);
                                    ?>
                                    <tr>
                                        <td><?= $judul_artikel ?></td>
                                        <td><?= $nama_komentator ?></td>
                                        <td><?= $komentar ?></td>
                                    </tr>
                                <?php } } ?>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>


</html>