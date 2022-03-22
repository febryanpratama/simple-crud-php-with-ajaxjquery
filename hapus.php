<?php   
require 'koneksi.php';

if (isset($_GET['id'])) {
    var_dump($_GET);
    $id_artikel = $_GET['id'];
    // echo $id_artikel;
    $koneksi->query("DELETE from tb_artikel where id ='$id_artikel'");
    header('location:index.php');
} else {
    echo "else";
}