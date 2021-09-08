<?php 
include('../component/class_kategori.php');
$koneksi = new kategori();

//hapus data
$id_kategori = $_GET['del'];
if(! is_null($id_kategori))
{
	$hps = $koneksi->delete_data($id_kategori);
	echo "<script>window.alert('Data berhasil dihapus');
				  window.location.href=('kategori.php')
		</script>";
}
else
{
	echo "<script>window.alert('Data GAGAL dihapus');
				  window.location.href=('kategori.php')
		</script>";
}
?>