<?php
    function checkMail($con, $EMAIL) {
        $sql = "SELECT K.EMAIL FROM klienci_t K WHERE K.EMAIL = '" . $EMAIL . "'";
        $result = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function checkPhone($con, $NR_TELEFONU) {
        $sql = "SELECT K.NR_TELEFONU FROM klienci_t K WHERE K.EMAIL = '" . $NR_TELEFONU . "'";
        $result = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
?>