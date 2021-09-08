<?php 
include('../component/class_supplier.php');
$koneksi = new supplier();

//hapus data
$id_supplier = $_GET['del'];
if(! is_null($id_supplier))
{
	$hps = $koneksi->delete_data($id_supplier);
	echo "<script>window.alert('Data berhasil dihapus');
				  window.location.href=('supplier.php')
		</script>";
}
else
{
	echo "<script>window.alert('Data GAGAL dihapus');
				  window.location.href=('supplier.php')
		</script>";
}
?>