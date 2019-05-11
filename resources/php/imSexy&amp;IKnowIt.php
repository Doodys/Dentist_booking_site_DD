<?php
    function sexyView($string){

        echo '<link href="../css/php.css" rel="stylesheet" type="text/css">';
        echo '<link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">';

        echo '<header class="header">';
        echo '<h1>';
        echo $string;
        echo '</h1>';
        echo '</header>';
    }
?>