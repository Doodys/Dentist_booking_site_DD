<?php
    mb_internal_encoding("UTF-8");
    $con = mysqli_connect('127.0.0.1', 'root', 'dudysdobrozomb');

    include 'checkExistance.php';
    include 'updateClient.php';

    if(!$con) {
        echo 'Not connected to server!';
    }

    if(!mysqli_select_db($con, 'dentist_prod')) {
        echo 'Database not selected!';
    }

    $EMAIL = $_POST['mail'];
    $IMIE = $_POST['imie'];
    $NAZWISKO = $_POST['nazwisko'];
    $NR_TELEFONU = $_POST['phone'];
    $ID_LEKARZA = $_POST['dent_list'];
    $CZY_PIERWSZA = $_POST['first_list'];
    $ID_KLIENTA = $_POST['id_klienta'];
    $USLUGA = $_POST['job_list'];

    if ($CZY_PIERWSZA == "TAK") {
        if(checkMail($con, $EMAIL) > 0) {
            echo 'Podany e-mail jest już zarejestrowany!';
        }
        else if (checkPhone($con, $NR_TELEFONU) > 0) {
            echo 'Podany numer telefonu jest już zarejestrowany!';
        }
        else {
            $sql = "INSERT INTO KLIENCI_T (EMAIL,IMIE,NAZWISKO,NR_TELEFONU) VALUES('$EMAIL','$IMIE','$NAZWISKO','$NR_TELEFONU')";
            if(!mysqli_query($con,$sql)) {
                echo 'Not inserted :(';
            }
            else {
                echo '<div class="dodano_klienta">';
                echo 'Dodano klienta!  ';
                echo '</div>';
            }
        }
    } else {
        $sql = updateClient($con, $EMAIL, $IMIE, $NAZWISKO, $NR_TELEFONU, $ID_KLIENTA);
        if(!mysqli_query($con,$sql)) {
            echo 'Błędne ID klienta! :(';
        }
        else {
            echo '<div class="dodano_klienta">';
            echo 'Dodano klienta!  ';
            echo '</div>';
        }
    }

    header("refresh:2; url=../../index.html");
?>