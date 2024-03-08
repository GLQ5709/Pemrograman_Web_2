<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Static Variable</title>
</head>
<body><h1>Variable Static</h1>
    <?php
    function dicoba(){
        Static $A = 0;
        echo "Nilai A = ";
        echo $A;
        echo "<br>";
        $A++;
    } dicoba(); dicoba(); dicoba(); dicoba();
    ?>
</body>
</html>