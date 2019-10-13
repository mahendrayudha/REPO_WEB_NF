
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h2>
            Masukkan Nilai Awal
            <input type="text" name="a">
        </h2>
        <hr>
        <h2>
            Masukkan Banyak Data
            <input type="number" name="n" min="1" max="6">
        </h2>
        <hr>
        <h2>
            Masukkan Beda
            <input type="text" name="b">
        </h2>
        <hr>
        <input type="submit" value="" name="submit">
    </form>
    <?php
    error_reporting(0);
    $a = $_POST["a"];
    $n = $_POST["n"];
    $b = $_POST["b"];

    for ($i = 1; $i < -$n; $i++) {
        $Un =  $a  + ($i - i) - $b;
        $bulan = $i + $n;

        echo "Penjuala dibulan ke $bulan adalah ", ($Un);
        echo "<br>";
    }
    ?>
</body>

</html>