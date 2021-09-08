<?php 
class distribusi{
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
		$data = mysqli_query($this->koneksi,"SELECT * FROM distribusi 
											JOIN barang ON barang.id_barang = distribusi.id_barang 
											ORDER BY distribusi.tanggal DESC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
	
	function tambah_data($id_barang,$jumlah,$tanggal)
	{
		mysqli_query($this->koneksi,"insert into distribusi values ('','$id_barang','$jumlah','$tanggal')");
	}
	
	function showSupplier()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM supplier ORDER BY nama ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
	function showBarang()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM barang WHERE stok_brg<>0 ORDER BY nama_brg  ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
}
?>