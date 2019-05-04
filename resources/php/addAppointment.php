<?php
    function getMaxId ($con) {
        $query = "SELECT MAX(ID_KLIENTA) FROM KLIENCI_T";
        $result = $con->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row[0];
    }
?>