<?php 
include 'config.php'; // panggil perintah koneksi database 

if(!isset($_SESSION['email'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header('Location: index.php');
}

if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
    $email = $_POST['email']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

    try {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password"; // buat queri select
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute(); // jalankan query

        $count = $stmt->rowCount(); // mengecek row
        if($count == 1) { // jika rownya ada 
            $_SESSION['email'] = $email;
            header("Location: ../pages/index.php");
            return;
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>