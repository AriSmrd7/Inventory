<?php 
include('../component/class_supplier.php');
$koneksi = new supplier();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['nama'],$_POST['alamat'],$_POST['telepon']);
	header('location:supplier.php');
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['nama'],$_POST['alamat'],$_POST['telepon'],$_POST['id_supplier']);
	header('location:supplier.php');
}


?>