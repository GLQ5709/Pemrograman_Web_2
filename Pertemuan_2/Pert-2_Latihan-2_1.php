<?php 
    $C = 123;
    function Test(){
        global $C;
        echo "C pada fungsi berisi = $C \n";
    } Test();
    echo "C di luar fungsi berisi = $C \n";
?>