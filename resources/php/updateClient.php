<?php
    // function updateClient($con, $EMAIL, $IMIE, $NAZWISKO, $NR_TELEFONU, $ID_KLIENTA) {
    //     if(checkIfExist($con, $ID_KLIENTA) > 0){
    //         $sql = "UPDATE klienci_t SET EMAIL = '" . $EMAIL . "', IMIE = '" . $IMIE . "', NAZWISKO = '" . $NAZWISKO . "', NR_TELEFONU = '" . $NR_TELEFONU . "' WHERE ID_KLIENTA = " . $ID_KLIENTA;
    //         return $sql;
    //     }
    //     else {
    //         return;
    //     }
    // }

    function checkIfExist($con, $ID_KLIENTA) {
        $sql = "SELECT ID_KLIENTA FROM klienci_t WHERE ID_KLIENTA = " . $ID_KLIENTA;
        $result = mysqli_query($con, $sql);
        //$rowcount = mysqli_num_rows($result);

        return $result;
    }
?>