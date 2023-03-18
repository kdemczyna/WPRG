<FORM NAME="Formularz kontaktowy" ACTION="Zad1.php" METHOD="POST">
    <TABLE>
        <TR>
            <TD>Imię i nazwisko:</TD>
            <TD><INPUT name="imie i nazwisko" maxlength=25></TD>
        </TR>
        <TR>
            <TD>Adres email:</TD>
            <TD><INPUT name="email" maxlength=25></TD>
        </TR>
        <TR>
            <TD>Telefon komórkowy:</TD>
            <TD><INPUT name="telefon"></TD>
        </TR>
        <TR>
            <TD>Wybierz temat:</TD>
            <TD><SELECT NAME="temat">
                    <OPTION>Wykonanie strony internetowej</OPTION>
                    <OPTION>Zrobienie bazy danych dla przychodni</OPTION>
            </TD>
        </TR>
        <TR>
            <TD>Treść wiadomości</TD>
            <TD><TEXTAREA ROWS=5></TEXTAREA></TD>
        </TR>
        <TR>
            <TD>Preferowana forma kontaktu</TD>
        </TR>
        <TD><INPUT TYPE=CHECKBOX> E-mail</TD>
        <TR>
            <TD><INPUT TYPE=CHECKBOX> Telefon</TD>
        </TR>
        <TR>
            <TD>Czy Posiadasz juz strone www?</TD>
        <TR>
            <TD><INPUT TYPE=RADIO NAME="CHOICE">Tak</TD>
        </TR>
        </TR>
        <TR>
            <TD><INPUT TYPE=RADIO NAME="CHOICE">Nie</TD>
        </TR>
        <TR>
            <TD>Załączniki</TD>
        </TR>
        <TR>
            <TD>
                <INPUT TYPE=BUTTON VALUE="Wybierz plik">
            </TD>
        </TR>
        <TR>
            <TD><INPUT TYPE=SUBMIT VALUE="Wyślij formularz"></TD>
        </TR>

    </TABLE>
</FORM>

<?php
$keys = array_keys($_POST);
foreach ($keys as $key) {
    echo "\$_POST['$key'] == {$_POST[$key]}<BR>";
}
?>