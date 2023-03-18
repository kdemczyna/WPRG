<?php
function checkVar1()
{
    return isset($_POST['liczba1']) && isset($_POST['liczba2']);
}

function checkVar2()
{
    return isset($_POST['liczba3']);
}

function checkNumeric()
{
    return (is_numeric($_POST['liczba1']) && is_numeric($_POST['liczba2']));;
}

$liczba1 = '';
$liczba2 = '';
if (checkVar1()) {
    $liczba1 = $_POST['liczba1'];
    $liczba2 = $_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];
}

?>
    <FORM name="prosty" action="Zad2.php" method="POST">
        <SPAN>KALKULATOR PROSTY</SPAN>
        <TABLE>
            <TR>
                <TD>Pierwsza liczba:</TD>
                <TD><INPUT name="liczba1" value='<?php echo $liczba1 ?>'></TD>
                <TD><SELECT NAME="dzialanie" value='<?php echo $dzialanie ?>'>
                        <OPTION>Dodawanie</OPTION>
                        <OPTION>Odejmowanie</OPTION>
                        <OPTION>Mnożenie</OPTION>
                        <OPTION>Dzielenie</OPTION></TD>
            </TR>
            <TR>
                <TD>Druga liczba:</TD>
                <TD><INPUT name="liczba2" value='<?php echo $liczba2 ?>'></TD>
            </TR>
            <TR>
                <TD>&nbsp;</TD>
                <TD><INPUT type="submit" value="Oblicz"></TD>
            </TR>
        </TABLE>
    </FORM>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (checkVar1()) {
        if (checkNumeric()) {
            echo "W formularzu podano liczby {$_POST['liczba1']} oraz {$_POST['liczba2']}.<BR>";
            echo "Wyniki działań:<BR>";
            switch ($dzialanie) {
                case "Dodawanie":
                    echo "{$_POST['liczba1']} + {$_POST['liczba2']} = ";
                    echo $_POST['liczba1'] + $_POST['liczba2'];
                    echo "<BR>";
                    break;
                case "Odejmowanie":
                    echo "{$_POST['liczba1']} - {$_POST['liczba2']} = ";
                    echo $_POST['liczba1'] - $_POST['liczba2'];
                    echo "<BR>";
                    break;
                case "Mnożenie":
                    echo "{$_POST['liczba1']} * {$_POST['liczba2']} = ";
                    echo $_POST['liczba1'] * $_POST['liczba2'];
                    echo "<BR>";
                    break;
                case "Dzielenie":
                    echo "{$_POST['liczba1']} / {$_POST['liczba2']} = ";
                    echo $_POST['liczba1'] / $_POST['liczba2'];
                    echo "<BR>";
                    break;
            }
        } else {
            echo "Błędne dane! Jedna lub obie liczby są niepoprawne!<BR>";
        }
    } else {
        echo "Brak danych! Jedna lub obie liczby nie zostały podane!<BR>";
    }
}


$liczba3 = '';
if (checkVar2()) {
    $liczba3 = $_POST['liczba3'];
    $dzialanie2 = $_POST['dzialanie2'];
}
?>
    <FORM method="POST" action="Zad2.php" name="zaawansowany">
        <SPAN>KALKULATOR ZAAWANSOWANY</SPAN>
        <TABLE>
            <TR>
                <TD><INPUT name="liczba3" value='<?php echo $liczba3 ?>'></TD>
                <TD><SELECT NAME="dzialanie2" value='<?php echo $dzialanie2 ?>'>
                        <OPTION value="1">Sinus</OPTION>
                        <OPTION value="2">Cosinus</OPTION>
                        <OPTION value="3">Tangens</OPTION>
                        <OPTION value="4">Binarne na dziesiętne</OPTION>
                        <OPTION value="5">Dziesiętne na binarne</OPTION>
                        <OPTION value="6">Dziesiętne na szesnastkowe</OPTION>
                        <OPTION value="7">Szesnastkowe na dziesiętne</OPTION>
                        <OPTION value="8">Stopnie na radiany</OPTION>
                        <OPTION value="9">Radiany na stopnie</OPTION>
                    </SELECT>
                </TD>
            </TR>
            <TR>
                <TD>&nbsp;</TD>
                <TD><INPUT type="submit" value="Oblicz"></TD>
            </TR>
        </TABLE>

    </FORM>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (checkVar2()&&!empty($_POST['liczba3'])) {
        if (is_numeric($liczba3)) {
            echo "W formularzu podano liczbe $liczba3" . "<BR>";
            echo "Wynik działań:<BR>";
            switch ($dzialanie2) {
                case 1:
                    echo "Sinus $liczba3 = ";
                    echo sin($liczba3);
                    echo "<BR>";
                    break;
                case 2:
                    echo "Cosinus $liczba3 =";
                    echo cos($liczba3);
                    echo "<BR>";
                    break;
                case 3:
                    echo "Tangens $liczba3 = ";
                    echo tan($liczba3);
                    echo "<BR>";
                    break;
                case 4:
                    echo "$liczba3 dziesietnie to: ";
                    echo bindec($liczba3);
                    echo "<BR>";
                    break;
                case 5:
                    echo "$liczba3 binarnie to: ";
                    echo decbin($liczba3);
                    echo "<BR>";
                    break;
                case 6:
                    echo "$liczba3 szestanstkowo to: ";
                    echo dechex($liczba3);
                    echo "<BR>";
                    break;
                case 8:
                    echo "$liczba3 stopni w radianach to: ";
                    echo deg2rad($liczba3);
                    echo "<BR>";
                    break;
                case 9:
                    echo "$liczba3 radianow w stopniach:: ";
                    echo rad2deg($liczba3);
                    echo "<BR>";
                    break;
            }
        } else if ($dzialanie2 == 7) {
            echo "$liczba3 dziesietnie to: ";
            echo hexdec($liczba3);
            echo "<BR>";
        } else {
            echo "Błędne dane!<BR>";
        }

    }
    else {
        echo "Brak danych!<BR>";
    }
}
    ?>