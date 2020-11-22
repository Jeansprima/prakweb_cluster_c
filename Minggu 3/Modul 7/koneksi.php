<?php

function koneksi()
{
    return mysqli_connect("localhost", "root", "", "phpmyadmin");
}

function gambar()
{
    $namafile = $_FILES['foto']['name'];
    $typefile = $_FILES['foto']['type'];
    $sizefile = $_FILES['foto']['size'];
    $tmpnama = $_FILES['foto']['tmp_name'];

    $ekstensi = ['jpeg', 'jpg', 'png'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));

    if (!in_array($ekstensifile, $ekstensi)) {
        echo "<script>
            alert('Pilih file gambar!');
            </script>";
        return false;
    }

    if ($typefile != 'image/jpeg' && $typefile != 'image/png') {
        echo "<script>
            alert('Pilih file gambar!');
            </script>";
        return false;
    }

    if ($sizefile > 5000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }
    $file = uniqid();
    $file .= '.';
    $file .= $ekstensifile;
    move_uploaded_file($tmpnama, 'foto/' . $file);

    return $file;
}

function tambahdata()
{
    $db = koneksi();
	if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
	echo "Koneksi berhasil";
	mysqli_close($db);
	$nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $prodi = $_POST['prodi'];
    $foto = gambar();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$foto', '$prodi');";
    mysqli_query($db, $query) or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}

function deletedata($nim)
{
    $db = koneksi();
    $query = "DELETE FROM mahasiswa WHERE nim = $nim";
    mysqli_query($db, $query) or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}

function caridata($nama)
{
    $db = koneksi();
    $query = "SELECT mahasiswa.nim as nim, mahasiswa.nama as mhsnama, mahasiswa.foto as foto, jurusan.nama as jrsnama FROM mahasiswa LEFT JOIN jurusan ON mahasiswa.id_jur = jurusan.id WHERE mahasiswa.nama LIKE '%$nama%'";
    $hasil = mysqli_query($db, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $data[] = $row;
    }
    return $data;
}