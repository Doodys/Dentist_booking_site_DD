<?php
    function notSexy($string){
        echo '<link href="../css/php.css" rel="stylesheet" type="text/css">';
        echo '<link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">';
        echo '<link rel="stylesheet" type="text/css" href="../css/grid.css">';

        echo '<header class="oh_no">';
        echo '<div class="o_nie">';
        echo '<img src="../img/oh_no.png" alt="Oh no!">';
        echo '</div>';
        echo '<h2>';
        echo $string;
        echo '</h2>';
        echo '</header>';
    }
?>