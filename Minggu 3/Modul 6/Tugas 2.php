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
        }

        body,
        div,
        form,
        input,
        select,
        textarea,
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

        .hasil {
            width: 60%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 30px 0 #a37547;
        }

        form {
            width: 60%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 30px 0 #a37547;
        }

        .banner {
            position: relative;
            height: 230px;
            background-image: url("/uploads/media/default/0001/02/3dd647f39593e88f45f61aaac6ff3027dce15506.jpeg");
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
            width: calc(100% - 10px);
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
            background: #6b4724;
            font-size: 16px;
            color: #fff;
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
        <form method="POST">
            <div class="banner">
                <h1>Modul 6 Tugas 2 Praktikum Pemrograman Web</h1>
            </div>
            <div class="item">
                <p>Nama</p>
                <input type="text" name="nama" required />
            </div>
            <div class="item">
                <p>Pilih Warna Bet</p>
                <select name="warna">
                    <option value="red" selected="selected">Pilih Warna</option>
                    <option value="red">Hitam</option>
                    <option value="black">Kuning</option>
                    <option value="yellow">Merah</option>
                    <option value="blue">Hijau</option>
                    <option value="green">Ungu</option>
                </select>
            </div>
            <div class="btn-block">
                <button type="submit" name="hitung">Hitung Biaya</button>
            </div>
        </form>
        <?php
        $harga = 0;
        $nama = '';
        $warna = 'red';
        if (isset($_POST['hitung'])) {
            $nama = $_POST['nama'];
            $warna = $_POST['warna'];
            hitung($nama, $warna, $harga);
        }
        function hitung($nama, $warna = "red", &$harga)
        {
            if (strlen($nama) <= 10) {
                $harga = strlen($nama) * 300;
            } else if (strlen($nama) <= 20 && strlen($nama) > 10) {
                $harga = strlen($nama) * 500;
            } else {
                $harga = strlen($nama) * 700;
            }
        }
        ?>
    </div>
    <div class="testbox">
        <div class="hasil">
            <p style="color: black; font-size: 12pt;">Nama Bet :</p>
            <p class="nama-bet" style="color: <?php echo $warna ?>;"><?php echo $nama ?></p>
            <p style="color: black; font-size: 12pt; padding: 3px;">Biaya : Rp. <?php echo $harga ?></p>
        </div>
    </div>
</body>

</html>