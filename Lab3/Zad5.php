<?php
$key='';
?>
<form method="POST" action="Zad5.php" name="logowanie">
    <span>Logowanie</span>
    <table>
        <tr>
            <td>Login: <input name="login">
            </td>
        </tr>
        <td>Hasło: <input type="password" name="haslo" "></td>
        <tr>
            <td><input type="submit" value="Zaloguj"></td>
        </tr>
    </table>
</form>

<?php
$passy = [
    [
        "login" => "error",                     //array_search móglby zwórcic '0' i wtedy niżej w if($key==false) i nie zaloguje poprawnie
        "haslo" => "error"
    ],
    ["login" => "kdemczyna",
        "haslo" => "1234qwer"
    ],
    ["login" => "jankowal",
        "haslo" => "qwerty"
    ],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = array_search($_POST['login'], array_column($passy, "login"));
    if ($key != false) {
        if ($_POST['haslo'] == $passy[$key]["haslo"]) {
            echo "Zalogowano pomyslnie!";
        }
        else  echo "Podano niepoprawne hasło";
    }
    else echo "Podano niepoprawny login";
}
?>