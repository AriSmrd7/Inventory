<?php  
session_start(); // ini adalah kode untuk memulai session
        $host = "localhost";
        $username = "root";
        $password = "";
        
        try{
            $conn = new PDO("mysql:host=$host; dbname=db_inventory", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e){
            echo "ERROR : " .$e->getMessage();
        }

?>