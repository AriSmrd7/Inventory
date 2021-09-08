<?php 
include('../component/class_barang.php');
$koneksi = new barang();

//hapus data
$id_barang = $_GET['del'];
if(! is_null($id_barang))
{
	$hps = $koneksi->delete_data($id_barang);
	echo "<script>window.alert('Data berhasil dihapus');
				  window.location.href=('barang.php')
		</script>";
}
else
{
	echo "<script>window.alert('Data GAGAL dihapus');
				  window.location.href=('barang.php')
		</script>";
}
?>