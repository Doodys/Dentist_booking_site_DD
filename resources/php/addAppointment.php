<?php
    function getMaxId ($con) {
        $query = "SELECT MAX(ID_KLIENTA) FROM klienci_t";
        $result = $con->query($query);
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        return $row[0];
    }
?>