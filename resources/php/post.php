<?php
    $con = mysqli_connect('127.0.0.1', 'root', 'dudysdobrozomb');

    include 'checkExistance.php';
    include 'updateClient.php';
    include 'addAppointment.php';
    include 'imSexy&IKnowIt.php';
    include 'imNotSexy.php';

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
    $USLUGA = $_POST['job_list'];
    $DATA = $_POST['app_date'];
    $GODZINA = $_POST['app_time'];

    if ($CZY_PIERWSZA == "TAK") {

        if(checkMail($con, $EMAIL) > 0) {
            $string = 'Podany e-mail jest już zarejestrowany!';
            notSexy($string);
        }
        else if (checkPhone($con, $NR_TELEFONU) > 0) {
            $string = 'Podany numer telefonu jest już zarejestrowany!';
            notSexy($string);
        }
        else {
            $sql = "INSERT INTO KLIENCI_T (EMAIL,IMIE,NAZWISKO,NR_TELEFONU) VALUES('$EMAIL','$IMIE','$NAZWISKO','$NR_TELEFONU')";
            if(!mysqli_query($con,$sql)) {
                echo 'Coś poszło nie tak :(';
                notSexy($string);
            }
            else {
                $ID_KLIENTA = getMaxId($con);
                $sql = "INSERT INTO WIZYTY_T (CZY_PIERWSZA, DATA, GODZINA, ID_KLIENTA, ID_LEKARZA, USLUGA) VALUES ('$CZY_PIERWSZA','$DATA','$GODZINA','$ID_KLIENTA','$ID_LEKARZA','$USLUGA')";

                if(!mysqli_query($con,$sql)) {
                    echo 'Coś poszło nie tak :(';
                    notSexy($string);
                } else {
                    $string = 'Dodano klienta!';
                    sexyView($string);
                }
            }
        }
    } else {
        $ID_KLIENTA = $_POST['id_klienta'];

        $sql = updateClient($con, $EMAIL, $IMIE, $NAZWISKO, $NR_TELEFONU, $ID_KLIENTA);
        if(!mysqli_query($con,$sql)) {
            $string = 'Błędne ID klienta!';
            notSexy($string);
        }
        else {
            $sql = "INSERT INTO WIZYTY_T (CZY_PIERWSZA, DATA, GODZINA, ID_KLIENTA, ID_LEKARZA, USLUGA) VALUES ('$CZY_PIERWSZA','$DATA','$GODZINA','$ID_KLIENTA','$ID_LEKARZA','$USLUGA')";
            $string = 'Dodano klienta!';
            sexyView($string);
        }
    }

    header("refresh:2; url=../../index.html");
?>