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

    error_reporting(0);
    $a = $_POST["awal"];
    $b = $_POST["data"];
    $c = $_POST["beda"];

    for($i = 1; $i <= $b; $i++) {
        $Un = $a + ($i - 1) * $c;
        $bulan = $i;

        echo " Penjualan di bulan ke $bulan :", ($Un);
        echo "<br>";
    }
    ?>

</body>

</html>