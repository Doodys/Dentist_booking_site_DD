<?php
    function checkMail($con, $EMAIL) {
        $result = $con->query("SELECT K.EMAIL FROM klienci_t K WHERE K.EMAIL = '$EMAIL'");
        $rowcount = $result->num_rows;
        return $rowcount;
    }

    function checkPhone($con, $NR_TELEFONU) {
        $result = $con->query("SELECT K.NR_TELEFONU FROM klienci_t K WHERE K.EMAIL = '$NR_TELEFONU'");
        $rowcount = $result->num_rows;
        return $rowcount;
    }

    function checkyDate($con, $DATA, $GODZINA, $ID_LEKARZA) {
        $result = $con->query("SELECT * FROM wizyty_t WHERE GODZINA = '$GODZINA' AND DATA = STR_TO_DATE('$DATA', '%Y-%m-%d') AND ID_LEKARZA = '$ID_LEKARZA'");
        $rowcount = $result->num_rows;
        return $rowcount;
    }
?>		