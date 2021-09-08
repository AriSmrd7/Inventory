<?php 
include('../component/class_pengadaan.php');
$koneksi = new pengadaan();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['supplier'],$_POST['barang'],$_POST['jumlah'],$_POST['tanggal']);
	header('location:pengadaan.php');
}



?>