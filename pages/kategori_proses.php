<?php 
include('../component/class_kategori.php');
$koneksi = new kategori();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['nama'],$_POST['status']);
	header('location:kategori.php');
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['nama'],$_POST['status'],$_POST['id_kategori']);
	header('location:kategori.php');
}


?>