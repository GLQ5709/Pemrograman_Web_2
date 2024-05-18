<?php
    $string = "This is nice today";
    echo strlen($string)."<br>";
    echo substr_count($string,"nice")."<br>";
    echo substr_count($string,"is",2)."<br>";
    echo substr_count($string,"is",3)."<br>";
    echo substr_count($string,"is",3,3)."<br>";
?>