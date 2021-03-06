<?php
    $con = mysqli_connect('localhost', 'root', 'dudysdobrozomb', 'dentist_prod');

    include 'checkExistance.php';
    include 'updateClient.php';
    include 'addAppointment.php';
    include 'imSexy&IKnowIt.php';
    include 'imNotSexy.php';
    include 'email.php';

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

        if($ID_LEKARZA == 1) { $lekarz2 = 'Michała Dudys'; } else { $lekarz2 = 'Natalii Dobrowolskiej'; }

        if(checkMail($con, $EMAIL) > 0) {
            $string = 'Podany e-mail jest już zarejestrowany!';
            notSexy($string);
        }
        else if (checkPhone($con, $NR_TELEFONU) > 0) {
            $string = 'Podany numer telefonu jest już zarejestrowany!';
            notSexy($string);
        }
        else if (checkyDate($con, $DATA, $GODZINA, $ID_LEKARZA) > 0) {
            $string = 'Godzina ' . $GODZINA . ' dnia ' . $DATA . ' u ' . $lekarz2 . ' jest już zarezerwowana!';
            notSexy($string);
        }
        else {
            $sql = "INSERT INTO klienci_t (EMAIL,IMIE,NAZWISKO,NR_TELEFONU) VALUES('$EMAIL','$IMIE','$NAZWISKO','$NR_TELEFONU')";
            if(!mysqli_query($con,$sql)) {
                $string = 'Coś poszło nie tak :(';
                notSexy($string);
                mysqli_error($con);
            }
            else {
                $ID_KLIENTA = getMaxId($con);
                $sql = "INSERT INTO wizyty_t (CZY_PIERWSZA, DATA, GODZINA, ID_KLIENTA, ID_LEKARZA, USLUGA) VALUES ('$CZY_PIERWSZA','$DATA','$GODZINA','$ID_KLIENTA','$ID_LEKARZA','$USLUGA')";

                if(!mysqli_query($con,$sql)) {
                    $string = 'Coś poszło nie tak :(';
                    notSexy($string);
                } else {                                                                                           
                    $string = 'Dodano wizytę!';
                    sexyView($string);
                    sendMail($con, $EMAIL, $IMIE, $NAZWISKO, $ID_LEKARZA, $DATA, $GODZINA);
                }
            }
        }
    } else {
        $ID_KLIENTA = $_POST['id_klienta'];

        if($ID_LEKARZA == 1) { $lekarz2 = 'Michała Dudys'; } else { $lekarz2 = 'Natalii Dobrowolskiej'; }
        
        $result = $con->query("SELECT * FROM klienci_t WHERE ID_KLIENTA = $ID_KLIENTA");
        
        while($row = mysqli_fetch_array($result))
        {
            $NEW_ID =  $row['ID_KLIENTA'];
        }

        if($ID_KLIENTA != $NEW_ID) {
            $string = 'Błędne ID klienta!';
            notSexy($string);
        }
        else if(checkyDate($con, $DATA, $GODZINA, $ID_LEKARZA) > 0){
            $string = 'Godzina ' . $GODZINA . ' dnia ' . $DATA . ' u ' . $lekarz2 . ' jest już zarezerwowana!';
            notSexy($string);
        }
        else {
            $sql = "INSERT INTO wizyty_t (CZY_PIERWSZA, DATA, GODZINA, ID_KLIENTA, ID_LEKARZA, USLUGA) VALUES ('$CZY_PIERWSZA','$DATA','$GODZINA','$ID_KLIENTA','$ID_LEKARZA','$USLUGA')";

            if(!mysqli_query($con,$sql)) {
            $string = 'Coś poszło nie tak :(';
            notSexy($string);
            }
            else{                                            
                $string = 'Dodano wizytę!';
                sexyView($string);
                
                $result = $con->query("SELECT * FROM klienci_t WHERE ID_KLIENTA = '$ID_KLIENTA'");
                
                while($row = mysqli_fetch_array($result))
                {
                    $EMAIL =  $row['EMAIL'];
                    $IMIE =  $row['IMIE'];
                    $NAZWISKO =  $row['NAZWISKO'];
                }
                
                sendMail($con, $EMAIL, $IMIE, $NAZWISKO, $ID_LEKARZA, $DATA, $GODZINA);
                }
            }
        }

    header("refresh:3; url=../../index.html");
?>