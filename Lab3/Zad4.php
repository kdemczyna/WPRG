<?php
function checkVar()
{
    return isset($_POST['pesel']);
}
function checkNumeric()
{
    return is_numeric($_POST['pesel']);
}
$pesel='';
if (checkVar()) {
    $pesel = $_POST['pesel'];
}
?>
<form method="POST" action="Zad4.php">
<table>
    <tr>
        <td>Podaj Pesel <input name="pesel"  value = '<?php echo $pesel ?>'></td>
    </tr>
    <tr>
        <td><input type="submit" value="Prześlij"></td>
    </tr>
</table>
</form>
<?php
function getBirthday($pesel)
{
    if (strlen($pesel) != 11) echo "Pesel powinien miec 11 cyfr";
    else {
        $year = substr($pesel, 0, 2);
        if ((int)$pesel[2] > 1) {
            $day = substr($pesel, 4, 2);
            $month = substr($pesel, 2, 2);
            $month[0] = (int)$month[0] - 2;
            echo $day . "-" . $month . "-" . "20" . $year . "r <br>";
        } else {
            $day = substr($pesel, 4, 2);
            $month = substr($pesel, 2, 2);
            echo "Twoja data urodzeniea to: ".$day . "-" . $month . "-" . "19" . $year . "r <br>";
        }
        if((int)$pesel[9]%2==0){
            echo "Jesteś kobietą";
        }
        else echo "Jesteś mężczyzną";
    }
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['pesel'])) {
        if (checkNumeric()) {
            getBirthday("$pesel");
        }
        else echo "Podano niepoprawny pesel";
    }
    else echo "Brak Danych";
}
?>