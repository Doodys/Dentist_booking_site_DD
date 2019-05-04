<?php
<<<<<<< HEAD
    function getMaxId ($con) {
        $query = "SELECT MAX(ID_KLIENTA) FROM KLIENCI_T";
        $result = $con->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row[0];
=======
    function addAppointment ($con, $ID_LEKARZA, $CZY_PIERWSZA, $DATA, $ID_KLIENTA, $USLUGA) {
        if($CZY_PIERWSZA == "TAK"){

        } else {

        }
>>>>>>> master
    }
?>