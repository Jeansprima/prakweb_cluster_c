<?php
require("koneksi.php");
if (isset($_POST['tambah'])) {
    if (tambahdata() > 0) {
        echo "<script>
            alert('Data berhasil ditambah');
            </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah');
            </script>";
    }
}
if (isset($_POST['cari'])) {
    $data = caridata($_POST['carinama']);
}
if (isset($_POST['hapus'])) {
    if (deletedata($_POST['carinim']) > 0) {
        echo "<script>
            alert('Data berhasil dihapus!');
            </script>";
    } else {
        echo "<script>
            alert('Data tidak ditemukan!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Praktikum Web</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: 100%;
            background-image: url("https://wallpaperset.com/w/full/9/6/a/517453.jpg");
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            position: absolute;
            margin: 0;
            line-height: 55px;
            font-size: 30px;
            color: #fff;
            z-index: 2;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 10px;
        }

        form {
            width: 40%;
            padding: 20px;
            border-radius: 6px;
            background-color: rgba(1, 4, 28, 0.8);
            box-shadow: 0 0 30px 0 white;
        }

        .table {
            width: 43%;
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.0);
            box-shadow: 0 0 30px 0 white;
            border: "1";
        }

        th {
            background-color: rgba(0, 9, 66, 0.5);
            color: white;
        }

        .td-number {
            background-color: rgba(0, 9, 66, 0.5);
            color: white;
            text-align: center;
        }

        .td-data {
            background-color: rgba(1, 4, 28, 0.8);
            color: white;
            text-align: center;
        }

        .td-foto {
            height: 80px;
            width: 80px;
            text-align: center;
            object-fit: cover;
        }

        .banner {
            position: relative;
            height: 150px;
            background-image: url("https://images.unsplash.com/photo-1506318137071-a8e063b4bec0?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        input,
        select {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 20px);
            padding: 5px;
        }

        select {
            width: 100%;
            padding: 7px 0;
            background: transparent;
        }

        .item:hover p,
        .item:hover i,
        input:hover::placeholder {
            color: #a37547;
        }

        .item input:hover,
        .item select:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 6px 0 #a37547;
            color: #a37547;
        }

        .item {
            position: relative;
            margin: 10px 0;

        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: white;
            font-size: 16px;
            color: #000;
            cursor: pointer;
        }

        button:hover {
            box-shadow: 0 0 18px 0 #3d2914;
        }

        .nama-bet {
            font-size: 25pt;
            padding: 10px 10px 20px 20px;
        }

        @media (min-width: 568px) {

            .name-item,
            .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input,
            .city-item input {
                width: calc(50% - 20px);
            }

            .city-item select {
                width: calc(50% - 8px);
            }
        }
    </style>
</head>

<body>
    <div class="testbox">
        <form method="POST" enctype="multipart/form-data">
            <div class="banner">
                <h1>Modul 7 Tugas 1 Praktikum Pemrograman Web</h1>
            </div>
            <div class="item">
                <p>NIM</p>
                <input type="text" name="nim" required autocomplete="off" />
            </div>
            <div class="item">
                <p>Nama</p>
                <input type="text" name="nama" required autocomplete="off" />
            </div>
            <div class="item">
                <p>Foto</p>
                <input type="file" name="foto" required />
            </div>
            <div class="item">
                <p>Program Studi</p>
                <select name="prodi" required>
                    <option value="1">Teknik Informatika</option>
                    <option value="2">Teknik Sipil</option>
                    <option value="3">Matematika</option>
                    <option value="4">Kedokteran</option>
                </select>
            </div>
            <div class="btn-block">
                <button type="submit" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>
    <div class="testbox">
        <form method="POST" enctype="multipart/form-data">
            <div class="item">
                <p>Nama</p>
                <input type="text" name="carinama" required autocomplete="off" />
            </div>
            <div class="btn-block">
                <button type="submit" name="cari">Cari Data</button>
            </div>
        </form>
    </div>
    <div class="testbox">
        <?php if (!empty($data)) : ?>
            <table class="table" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Nama Jurusan</th>
                </tr>
                <?php $a = 1;
                foreach ($data as $dt) : ?>
                    <tr>
                        <td class="td-number"><?php echo $a;
                                                $a++; ?></td>
                        <td class="td-data"><?php echo $dt['nim']; ?></td>
                        <td class="td-data"><?php echo $dt['mhsnama']; ?></td>
                        <td class="td-data"><img class="td-foto" src="foto/<?php echo $dt['foto']; ?>"></td>
                        <td class="td-data"><?php echo $dt['jrsnama']; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>
    <div class="testbox">
        <form method="POST" enctype="multipart/form-data">
            <div class="item">
                <p>NIM</p>
                <input type="text" name="carinim" required autocomplete="off" />
            </div>
            <div class="btn-block">
                <button type="submit" name="hapus" onclick="return confirm('hapus data dengan nim <?php $_POST['carinim'] ?>">Hapus Data</button>
            </div>
        </form>
    </div>
</body>

</html>