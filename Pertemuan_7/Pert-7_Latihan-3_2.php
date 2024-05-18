<?php
    function repeat($text1, $num1 = 10) {
        echo "<ol>\r\n";
        for ($i = 0; $i < $num1; $i++) {
            echo "<li>$text1</li>\r\n";
        }
        echo "</ol>";
    }

    // function repeat dipanggil menggunakan 2 argumen
    repeat("I'm the best", 17);

    // function repeat dipanggil menggunakan hanya 1 argumen
    repeat("You're the man");
?>
