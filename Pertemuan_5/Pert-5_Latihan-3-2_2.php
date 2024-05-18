<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Counter</title>
</head>
<body>
<?php
    $nama_file = "counter.dat";
    if(file_exists($nama_file)){
        $berkas1 = fopen($nama_file,"r");
        $pencacah1 = (integer)trim(fgets($berkas1,255));
        $pencacah1++;
        fclose($berkas1);
    }else
        $pencacah1=1;
        //simpanpencacah1
        $berkas1 = fopen($nama_file,"w");
        fputs($berkas1,$pencacah1);
        fclose($berkas1);

    //tuliskehalamanweb
    Print("Anda pengunjung ke-$pencacah1<br>\n");
?>
</body>
</html>