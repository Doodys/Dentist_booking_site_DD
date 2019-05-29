<?php

    function sendMail($con, $EMAIL, $IMIE, $NAZWISKO, $ID_LEKARZA, $DATA, $GODZINA){
    require("../../vendors/php/PHPMailer/class.phpmailer.php");
    
    //$con = mysqli_connect('mysql.cba.pl', 'dojdyl', '1Q0@2m9jot', 'dojdyl');
    
    $mail = new PHPMailer();
    
    $EMAIL = $_POST['mail'];
    $IMIE = $_POST['imie'];
    $NAZWISKO = $_POST['nazwisko'];
    $ID_LEKARZA = $_POST['dent_list'];
    $CZY_PIERWSZA = $_POST['first_list'];
    $DATA = $_POST['app_date'];
    $GODZINA = $_POST['app_time'];
    
    if($ID_LEKARZA == 1) { $lekarz = "Michał Dudys"; }
    else { $lekarz = "Natalia Dobrowolska"; }
    
    $mail->CharSet="utf-8";
    $mail->IsSMTP();            
    $mail->Host = "CBA.pl";
    $mail->SMTPAuth = true;
    $mail->Mailer = "mail";
    $mail->Username = "wizyty@dobrodudys.cba.pl";
    $mail->Password = "1Q0@2m9jot5w4h7y<34";
    
    $mail->From = "wizyty@dobrodudys.cba.pl";
    $mail->FromName = "Dobro&Dudys";
    $mail->AddAddress("$EMAIL");
    
    $mail->WordWrap = 50;                              
    $mail->IsHTML(true);    
    
    if($CZY_PIERWSZA == "TAK") {
    
        $result = $con->query("SELECT * FROM klienci_t LIMIT 1");
        
        while($row = mysqli_fetch_array($result))
        {
            $NEW_ID =  $row['ID_KLIENTA'];
        }
        
        $mail->Subject = "Szczegóły wizyty w gabinecie stomatologiczny Dobro & Dudys";
        $mail->Body    = "Witaj $IMIE $NAZWISKO!<br><br>Została zamówiona wizyta dnia $DATA o godzinie $GODZINA <br>Twoim lekarzem będzie $lekarz <br><br>Twoim unikalnym id klienta jest $NEW_ID<br><b>Zapisz je!</b><br>Do zobaczenia, $IMIE :)<br><br>Dobro $ Dudys - gabinet stomatologiczny";
        $mail->AltBody = "Witaj $IMIE $NAZWISKO! Została zamówiona wizyta dnia $DATA o godzinie $GODZINA.Twoim lekarzem będzie $lekarz. Twoim unikalnym id klienta jest $NEW_ID - Zapisz je! Do zobaczenia, $IMIE :) ~ Dobro $ Dudys - gabinet stomatologiczny";
    
    } else {
        
        $mail->Subject = "Szczegóły wizyty w gabinecie stomatologiczny Dobro & Dudys";
        $mail->Body    = "Witaj $IMIE $NAZWISKO!<br><br>Została zamówiona wizyta dnia $DATA o godzinie $GODZINA <br>Twoim lekarzem będzie $lekarz <br><b>Zapisz je!</b><br>Do zobaczenia, $IMIE :)<br><br>Dobro $ Dudys - gabinet stomatologiczny";
        $mail->AltBody = "Witaj $IMIE $NAZWISKO! Została zamówiona wizyta dnia $DATA o godzinie $GODZINA.Twoim lekarzem będzie $lekarz. Twoim unikalnym id klienta jest $NEW_ID - Zapisz je! Do zobaczenia, $IMIE :) ~ Dobro $ Dudys - gabinet stomatologiczny";
        
    }
    
    if(!$mail->Send())
    {
       echo "Message could not be sent. <p>";
       echo "Mailer Error: " . $mail->ErrorInfo;
       exit;
    }
    
    return;
    }

?>