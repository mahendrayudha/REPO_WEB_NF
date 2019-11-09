<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Penjualan Kecap </h1>
    <form action="" method="POST">
        <h2>
            Nilai Awal
        </h2>
        <input type="text" name="awal">

        <h2>
            Banyak Data
        </h2>
        <input type="text" name="data" min="1" max="6">

        <h2>
            Beda Data
        </h2>
        <input type="text" name="beda">

        <input type="submit" value="Submit" name="submit">
    </form>

    <?php
    //a = waktu
    //qhp = y
    //x.y = x.y
    //pow = x2
    error_reporting(0);
    $a = $_POST["awal"];
    $qhp = $_POST["data"];
    $jum = $_POST["beda"];
    $jumlah = 
    $data_ramal['data_bulan'];
    $aa = ($jum['qhp']*$jum['a']);
    $ab = $jumlah*$jum['a'];
    $ac = ($jum['a']*$jum['a']);

    $ba = $jum['xy']*$jumlah;
    $bb = $jum['a']*$jumlah;
    $bc = $jum['pow']*$jumlah;

    $aaa = $aa-$ba;
    $bbb = $ab-$bb;
    $ccc = $ac-$bc;

    $b = ($aaa/$ccc);
    $a = ($jum['qhp'] - ($b*$jum['a']))/$jumlah;
    
    $y = $a + ($b*$jumlah);

    echo "Penjualan di bulan:", ($b);
    echo "<br>";
    ?>

</body>

</html>