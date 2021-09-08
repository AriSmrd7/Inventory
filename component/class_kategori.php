<?php 
class kategori{
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
		$data = mysqli_query($this->koneksi,"SELECT * FROM kategori ORDER BY nama ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
	
	
	
	function tambah_data($nama,$status)
	{
		mysqli_query($this->koneksi,"insert into kategori values ('', '$nama','$status')");
	}

	function get_by_id($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"select * from kategori where id_kategori='$id_kategori'");
		return $query->fetch_array();
	}

	function update_data($nama,$status,$id_kategori)
	{
		$query = mysqli_query($this->koneksi,"UPDATE kategori SET 
												nama='$nama',
												status='$status'
											  WHERE id_kategori='$id_kategori'");
	}

	function delete_data($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"delete from kategori where id_kategori='$id_kategori'");
	}
	
	
	function showKategori()
	{
		$data = mysqli_query($this->koneksi,"SELECT status FROM kategori");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
}
?>