<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {
    extract($_POST);
    // var_dump($_POST);
    $s = "INSERT INTO tb_artikel(judul_artikel, isi_artikel, penulis_artikel)VALUES('$judul_artikel','$isi_artikel','$penulis_artikel')";
    if ($qi = $koneksi->prepare($s)) {
        if ($qi->execute()) {
            $ok = 1;
            var_dump("ok");
            $msg = "Berhasil Menambah Artikel";
            header('location:index.php');
        } else {
            echo "gagal";
        }
    } else {
        echo 'gagal';
    }
}
if (isset($_POST['tambah_komentar'])) {
    extract($_POST);
    // var_dump($_POST);
    $s = "INSERT INTO tb_komentar(id_artikel, nama_komentator, komentar)VALUES('$id_artikel','$nama_komentator','$komentar')";
    if ($qi = $koneksi->prepare($s)) {
        if ($qi->execute()) {
            $ok = 1;
            $msg = "Berhasil Menambah Artikel";
            header('location:index.php');
        } else {
            echo "gagal";
        }
    } else {
        echo 'gagal';
    }
}

if (isset($_POST['ubah'])) {
    extract($_POST);
    // var_dump($_POST[]);
    $s = "UPDATE tb_artikel SET judul_artikel = ?,isi_artikel = ?,penulis_artikel = ? WHERE id = '$id_artikel'";
    if ($qi = $koneksi->prepare($s)) {
        $qi->bind_param(
            "sss",
            $judul_artikel,
            $isi_artikel,
            $penulis_artikel,
        );
        if ($qi->execute()) {
            $ok = 1;
            var_dump("ok");
            $msg = "Berhasil Menambah Buku";
            header('location:index.php');
        } else {
            echo "gagal";
        }
    } else {
        echo 'gaga';
    }
}

if (isset($_GET['param'])) {
    var_dump($_GET);
    $id_artikel = $_GET['id'];
    $koneksi->query("DELETE from tb_artikel where id_artikel ='$id_artikel'");
    header('location:index.php');
} else {
    echo "else";
}

