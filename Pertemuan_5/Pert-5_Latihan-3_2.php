<?php
    $file = fopen("Pert-5_Latihan-1_2.txt","r");
    while(!feof($file)){
    echo fgets($file)."<br/>";
    }
    fclose($file);
?>