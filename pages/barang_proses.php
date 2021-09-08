<?php 
include('../component/class_barang.php');
$koneksi = new barang();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['kode_barang'],$_POST['kategori'],$_POST['nama_barang'],$_POST['harga'],$_POST['satuan']);
	header('location:barang.php');
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['kode_barang'],$_POST['kategori'],$_POST['nama_barang'],$_POST['harga'],$_POST['satuan'],$_POST['id_barang']);
	header('location:barang.php');
}


?>