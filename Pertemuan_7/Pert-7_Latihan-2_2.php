<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function UDF</title>
</head>
<body>
    <!InputBilangan>
    <form method="post">
        Masukkan Bilangan Pertama:<br>
        <input type="text" name="A1" size="10"><br>
        Masukkan Bilangan Kedua:<br>
        <input type="text" name="B1" size="10"><br>
        <input type="submit" value="Hitung">
    </form>
    <!mengirim2buahbilanganyangdiinput>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $A1 = $_POST["A1"];
        $B1 = $_POST["B1"];
        
        function jumlah1($A1, $B1) {
            $jumlahbil1 = $A1 + $B1;
            return $jumlahbil1;
        }

        function kurang1($A1, $B1) {
            $kurangbil1 = $A1 - $B1;
            return $kurangbil1;
        }

        function kali1($A1, $B1) {
            $kalibil1 = $A1 * $B1;
            return $kalibil1;
        }

        function bagi1($A1, $B1) {
            if ($B1 != 0) {
                $bagibil1 = $A1 / $B1;
                return $bagibil1;
            } else {
                return "Pembagian dengan nol tidak diperbolehkan.";
            }
        }

        echo "<br>";
        echo "Bilangan Pertama: ";
        echo $A1;
        echo "<br>";
        echo "Bilangan Kedua: ";
        echo $B1;
        echo "<br><br>";

        echo "Hasil Penjumlahan 2 buah bilangan";
        echo "<br>";
        $jumlahbil1 = jumlah1($A1, $B1);
        printf("Penjumlahan antara: %d + %d = %d", $A1, $B1, $jumlahbil1);
        echo "<br><br>";

        echo "Hasil Pengurangan 2 buah bilangan";
        echo "<br>";
        $kurangbil1 = kurang1($A1, $B1);
        printf("Pengurangan antara: %d - %d = %d", $A1, $B1, $kurangbil1);
        echo "<br><br>";

        echo "Hasil Perkalian 2 buah bilangan";
        echo "<br>";
        $kalibil1 = kali1($A1, $B1);
        printf("Perkalian antara: %d * %d = %d", $A1, $B1, $kalibil1);
        echo "<br><br>";

        echo "Hasil Pembagian 2 buah bilangan";
        echo "<br>";
        $bagibil1 = bagi1($A1, $B1);
        if (is_numeric($bagibil1)) {
            printf("Pembagian antara: %d / %d = %.2f", $A1, $B1, $bagibil1);
        } else {
            echo $bagibil1;
        }
        echo "<br><br>";
    }
    ?>
</body>
</html>
