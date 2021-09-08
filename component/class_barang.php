<?php 
class barang{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_inventory";
	var $koneksi = "";
	
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"SELECT 
													barang.id_barang,barang.kode_brg,barang.nama_brg,barang.harga, kategori.nama,barang.stok_brg,barang.satuan_brg 
											 FROM 
													barang JOIN kategori WHERE barang.id_kategori = kategori.id_kategori 
											 ORDER BY 
													kode_brg ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
	
	
	
	function tambah_data($kode_barang,$id_kategori,$nama_barang,$harga,$satuan)
	{
		mysqli_query($this->koneksi,"insert into barang values ('', '$kode_barang','$id_kategori','$nama_barang','$harga','$satuan',0)");
	}

	function get_by_id($id_barang)
	{
		$query = mysqli_query($this->koneksi,"SELECT 
													barang.id_barang,barang.kode_brg,barang.nama_brg,barang.harga, kategori.nama,barang.stok_brg,barang.satuan_brg 
											 FROM 
													barang JOIN kategori 
											 WHERE 
													barang.id_kategori = kategori.id_kategori 
											 AND 
													barang.id_barang = '$id_barang'  ");
		return $query->fetch_array();
	}

	function update_data($kode_barang,$kategori,$nama_barang,$harga,$satuan,$id_barang)
	{
		$query = mysqli_query($this->koneksi,"UPDATE barang SET 
														kode_brg='$kode_barang',
														id_kategori='$kategori',
														nama_brg='$nama_barang',
														harga='$harga',
														satuan_brg='$satuan'
											  WHERE id_barang='$id_barang'");
	}

	function delete_data($id_barang)
	{
		$query = mysqli_query($this->koneksi,"delete from barang where id_barang='$id_barang'");
	}
	
	
	function showKategori()
	{
		$data = mysqli_query($this->koneksi,"SELECT id_kategori,nama, status FROM kategori WHERE status='Aktif' ORDER BY nama ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
}
?>