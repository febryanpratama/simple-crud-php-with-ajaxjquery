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
                        <h5 class="text-center">Edit Artikel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form method="POST" action="proses.php">
                                    <input type="hidden" name="id_artikel" value="<?php echo $tampil['id']; ?>">
                                    <div class="form-group">
                                        <label>Judul Artikel</label>
                                        <input type="text" name="judul_artikel" class="form-control" value="<?php echo $tampil['judul_artikel']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea name="isi_artikel" id="" cols="30" rows="10" class="form-control"><?php echo $tampil['isi_artikel']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Penulis Artikel</label>
                                        <input type="text" name="penulis_artikel" class="form-control" value="<?php echo $tampil['penulis_artikel']; ?>" />
                                    </div>
                                    <div>
                                        <div class="form-group mt-2">
                                            <input type="submit" name="ubah" value="Simpan" class="btn btn-primary form-control">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>


</html>