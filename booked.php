<!DOCTYPE html>
<html lang='pl'>

<head>
    <meta charset="utf-8" />
    <title>Dobro & Dudys - gabinet stomatologiczny</title>
    <link rel='stylesheet' type='text/css' href='resources/fontello/css/fontello.css'>
    <link rel='stylesheet' type='text/css' href='vendors/css/normalize.css'>
    <link rel='stylesheet' type='text/css' href='resources/css/style.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet" type="text/css">
    <meta meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Michał Dudys, Natalia Dobrowolska">
    <script src='resources/js/enableClientID.js'></script>
    <script src='resources/js/minDate.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .fixed_header {
        margin-top: 20px;
        width: 400px;
        table-layout: fixed;
        border-collapse: collapse;
        }

        .fixed_header tbody {
            display: block;
            width: 100%;
            overflow: auto;
            height: 480px;
        }

        .fixed_header thead tr {
            display: block;
        }

        .fixed_header thead {
            background: black;
            color: #fff;
        }

        .fixed_header th,
        .fixed_header td {
            padding: 5px;
            text-align: center;
            width: 200px;

        }
        .for2 {
            padding: 10px 20px;
            margin-top: 10px;
            max-width: 500px;
            height: 550px;
            background-color: #fff;
            box-shadow: 0 0 20px 2px #333;
            border-radius: 30px;
            font-size: 18px;
            color: black;
            font-weight: normal;
        }
        .testowy_formularz {
            margin-top:-25vh;
            box-sizing: border-box;
            font-weight: bold;
            display: flex;
            color: #fff;
            font: bolder;
            font-size: 30px;
        }
        .table-form {
            padding: 0 20vw 0 20vw;
        }

    </style>
</head>

<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'dudysdobrozomb', 'dentist_prod');

    if(!$con) {
        echo 'Not connected to server!';
    }

    if(!mysqli_select_db($con, 'dentist_prod')) {
        echo 'Database not selected!';
    }

    $query = "SELECT * FROM wizyty_t WHERE 1 = 1 ORDER BY DATA";
    $result = $con->query($query);
    ?>
        <nav>
            <div class='row1'>
                <ul class='main-nav'>
                    <li><a href='index.html#o_nas'>O nas</a></li>
                    <div class='dropdown'>
                        <li><a>Usługi</a></li>
                        <div class='dropdown-content'>
                            <ul>
                                <li><a href="korona.html">Korony</a></li>
                                <li><a href="Stomatologia%20kosmetyczna.html">Stomatologia kosmetyczna</a></li>
                                <li><a href="Protezy.html">Protezy</a></li>
                                <li><a href="Odbudowa%20jamy%20ustnej.html">Odbudowa jamy ustnej</a></li>
                                <li><a href="Implantologia%20stomatologiczna.html">Implantologia stomatologiczna</a></li>
                                <li><a href="Leczenie%20kana%C5%82owe.html">Leczenie kanałowe</a></li>
                                <li><a href="Lic%C3%B3wki%20porcelanowe.html">Licówki porcelanowe</a></li>
                                <li><a href="Sedacja%20wziewna.html">Sedacja wziewna</a></li>
                            </ul>
                        </div>
                    </div>
                    <li><a href='index.html#pracownicy'>Pracownicy</a></li>
                    <li><a href='formularz.html'>Zamów wizytę</a></li>
                    <li><a href='index.html#kontakt'>Kontakt</a></li>
                </ul>
            </div>
        </nav>


        <section class="fom">
        <div class='table-form'>
        <table>
        <tr>
            <section id='zapisz'>
            <td>
            <fieldset  class='testowy_formularz' style="border:none;">
                <legend>Formularz kontaktowy</legend>
                <div class="for1">
                    <form action='resources/php/post.php' method='POST'>
                        <div class='for'>
                            Pierwszy raz u nas? <select id='dropdown' name='first_list' onchange="di_en()" onchange='di_en_form()'>
                                <option value='TAK'>TAK</option>
                                <option value='NIE'>NIE</option>
                            </select>
                            <br><br><label id='id_input_text' style='visibility: hidden;'>Podaj swoje unikalne ID pracjenta: </label><input type='number' name='id_klienta' id='id_input' style='visibility: hidden;'>
                        </div>
                        <div id='full_form' style='visibility: visible;'>
                            <div class='for'>
                                Imię: <input type='text' name='imie' id='form_part' pattern='[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ\]+'>
                            </div>
                            <div class='for'>
                                Nazwisko: <input type='text' name='nazwisko' id='form_part' pattern='[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ\-]+'>
                            </div>
                            <div class='for'>
                                E-mail: <input type='email' name='mail' id='form_part'>
                            </div>
                            <div class='for'>
                                Numer telefonu: <input type='text' name='phone' id='txt' pattern='[0-9]{3}-[0-9]{3}-[0-9]{3}' maxlength="11" placeholder='123-456-789'>
                            </div>
                        </div>
                        <div class='for'>
                            Wybór lekarza: <select name='dent_list'>
                                <option value='1'>Michał Dudys</option>
                                <option value='2'>Natalia Dobrowolska</option>
                            </select>
                        </div>
                        <div class='for'>
                            Wybór usługi: <select name='job_list'>
                                <option value='Wizyta kontrolna'>Wizyta kontrolna</option>
                                <option value='Korony'>Korony</option>
                                <option value='Stomatologia kosmetyczna'>Stomatologia kosmetyczna</option>
                                <option value='Protezy'>Protezy</option>
                                <option value='Odbudowa jamy ustnej'>Odbudowa jamy ustnej</option>
                                <option value='Implantologia stomatologiczna'>Implantologia stomatologiczna</option>
                                <option value='Leczenie kanałowe'>Leczenie kanałowe</option>
                                <option value='Licówki porcelanowe'>Licówki porcelanowe</option>
                            </select>
                        </div>
                        <div class='for'>
                            Data: <input type='date' id='datefield' name='app_date' min='1899-01-01' max='2030-12-31' onmouseover="minDate() " required>
                        </div>
                        <div class='for'>
                            Godzina:
                            <select name='app_time'>
                                <option value="08:00 ">08:00</option>
                                <option value="08:30 ">08:30</option>
                                <option value="09:00 ">09:00</option>
                                <option value="09:30 ">09:30</option>
                                <option value="10:00 ">10:00</option>
                                <option value="10:30 ">10:30</option>
                                <option value="11:00 ">11:00</option>
                                <option value="11:30 ">11:30</option>
                                <option value="12:00 ">12:00</option>
                                <option value="12:30 ">12:30</option>
                                <option value="13:00 ">13:00</option>
                                <option value="13:30 ">13:30</option>
                                <option value="14:00 ">14:00</option>
                                <option value="14:30 ">14:30</option>
                                <option value="15:00 ">15:00</option>
                                <option value="15:30 ">15:30</option>
                                <option value="16:00 ">16:00</option>
                                <option value="16:30 ">16:30</option>
                                <option value="17:00 ">17:00</option>
                                <option value="17:30 ">17:30</option>
                                <option value="18:00 ">18:00</option>
                                <option value="18:30 ">18:30</option>
                                <option value="19:00 ">19:00</option>
                                <option value="19:30 ">19:30</option>
                                <option value="20:00 ">20:00</option>
                                <option value="20:30 ">20:30</option>
                            </select>
                        </div>
                        <div class='for'>
                            <input type='submit' value='Zatwierdź wybór'>
                        </div>
                    </form>
                </div>
            </fieldset>
            </td>
        </section>


            <section id='zapisz'>
            <td>
                <fieldset class='testowy_formularz' style="border:none;">
                    <legend>Zajęte wizyty</legend>
                    <div class="for2">
                    <table class='fixed_header' border='1'>
                        <tbody>
                            <tr>
                                <th><b>Data</b></th>
                                <th><b>Godzina</b></th>
                                <th><b>Lekarz</b></th>
                            </tr>
                            <?php
                                date_default_timezone_set('Europe/Warsaw');
                                while($row = mysqli_fetch_array($result))
                                {
                                    if($row['ID_LEKARZA'] == 1) { $string = 'Michał Dudys'; }
                                    else { $string = 'Natalia Dobrowolska'; }

                                    if($row['DATA'] >= date("Y-m-d")){
                                        $origDate = $row['DATA'];
                                        $newDate = date("d-m-Y", strtotime($origDate));

                                        $origTime = $row['GODZINA'];
                                        $newTime = date("H:i", strtotime($origTime));

                                        echo "<tr'>";
                                        echo "<td><p>" . $newDate . "</p></td><td><p>" . $newTime . "</p></td><td><p>" . $string . "</p></td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </fieldset>
            </td>
            </section>
            </tr>
            </table>
            <div>
        </section>

        <section class="social ">
            <div class="socialdivs ">
                <a href='https://www.facebook.com/DentistMemes/' target="_blank ">
                    <div class="fb "><i class="icon-facebook-official "></i></div>
                </a>
                <a href='https://www.youtube.com/watch?v=zwDQEMbAra8&fbclid=IwAR14_I5qx0BDXAxgrRo8F9qEr7sIXLqQpMKc7CCFeZKVTDTwLMXz-QJ3bjs' target="_blank ">
                    <div class="yt "><i class="icon-youtube "></i></div>
                </a>
                <a href='https://sayingimages.com/wp-content/uploads/and-then-dentist-meme.jpg' target=='_blank'>
                    <div class="gp "><i class="icon-gplus "></i></div>
                </a>
                <a href='https://twitter.com/IsmaelKherGar/status/1123529682593488901' target="_blank ">
                    <div class="tw "><i class="icon-twitter "></i></div>
                </a>
                <div style="clear:both "></div>
            </div>
        </section>

        <section class="footer ">
            Dobro & Dudys &copy; 2019 All puns intended.
        </section>
</body>

</html>