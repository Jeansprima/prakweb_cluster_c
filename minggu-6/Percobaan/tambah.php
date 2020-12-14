<?php
//Include file koneksi ke database
include "koneksi.php";
//menerima nilai dari kiriman form 
$nim=$_POST["nim"];
$nama=$_POST["nama"];
$prodi=$_POST["prodi"];

//Query input menginput data kedalam tabel mahasiswa
$sql="insert into mahasiswa (nim,nama,prodi) values('$nim','$nama','$prodi')";

//Mengeksekusi/menjalankan query diatas
$hasil=mysqli_query($kon,$sql);

?>

