<?php 
class supplier{
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
		$data = mysqli_query($this->koneksi,"SELECT * FROM supplier ORDER BY nama ASC;");
		while($row = mysqli_fetch_array($data)){	
			$hasil[] = $row;
		}
		return $hasil;
	}
	
	
	
	function tambah_data($nama,$alamat,$telepon)
	{
		mysqli_query($this->koneksi,"insert into supplier values ('', '$nama','$alamat','$telepon')");
	}

	function get_by_id($id_supplier)
	{
		$query = mysqli_query($this->koneksi,"select * from supplier where id_supplier='$id_supplier'");
		return $query->fetch_array();
	}

	function update_data($nama,$alamat,$telepon,$id_supplier)
	{
		$query = mysqli_query($this->koneksi,"UPDATE supplier SET 
														nama='$nama',
														alamat='$alamat',
														telepon='$telepon'
											  WHERE id_supplier='$id_supplier'");
	}

	function delete_data($id_supplier)
	{
		$query = mysqli_query($this->koneksi,"delete from supplier where id_supplier='$id_supplier'");
	}

}
?>