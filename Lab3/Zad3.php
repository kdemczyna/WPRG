<?php
function checkVar()
{
    return isset($_POST['rok']);
}

function checkNumeric()
{
    return is_numeric($_POST['rok']);
}

$rok = '';
if (checkVar()) {
    $rok = $_POST['rok'];
}

?>
<form method="POST" action="Zad3.php" name="wielkanoc">
    <span>Obliczanie daty Wielkanocy</span>
    <table>
        <tr>
            <td>Podaj Rok</td>
            <td><input name="rok" value='<?php echo $rok ?>'></td>
            <td><input type="submit" value="oblicz"></td>
        </tr>
    </table>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (checkNumeric()) {
        $a = $rok % 19;
        $b = $rok % 4;
        $c = $rok % 7;
        $x=0;
        $y=0;
        if ($rok < 1583) {
            $x = 15;
            $y = 6;
        } else if ($rok <= 1583 && $rok < 1700) {
            $x = 22;
            $y = 2;
        } else if ($rok >= 1700 && $rok < 1800) {
            $x = 23;
            $y = 3;
        } else if ($rok >= 1800 && $rok < 1900) {
            $x = 23;
            $y = 4;
        } else if ($rok >= 1900 && $rok < 2100) {
            $x = 24;
            $y = 5;
        } else if ($rok >= 2100 && $rok < 2200) {
            $x = 24;
            $y = 6;
        }
        $d = (19 * $a + $x) % 30;
        $f = (2 * $b + 4 * $c + 6 * $d + $y) % 7;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['rok'])) {
        if (checkNumeric()) {
            if ($rok < 1 || $rok > 2199) {
                echo "Podano niepoprawną datę";
            } else if ($f == 6 && $d == 29) {
                echo "Wielkanoc wypada 26 Kwietnia";
            } elseif ($f == 6 && $d == 28 && ((11 * $x + 11) % 30) < 19) {
                echo "Wielkanoc wypada 18 Kwietnia";
            } elseif ($d + $f < 10) {
                echo "Wielkanoc wypada " . (22 + $d + $f) . " Marca";
            } elseif ($d + $f > 9) {
                echo "Wielkanoc wypada " . ($d + $f - 9) . " Kwietnia";
            }

        } else echo "Podano niepoprawny typ danych";
    }
    else echo "Brak danych";
}
?>

