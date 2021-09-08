<?php 
include('../component/class_distribusi.php');
$koneksi = new distribusi();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['barang'],$_POST['jumlah'],$_POST['tanggal']);
	header('location:distribusi.php');
}



?>