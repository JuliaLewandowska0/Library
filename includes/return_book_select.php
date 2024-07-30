<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
    $("#searchddl").chosen();
    $("#searchddl2").chosen();
</script>

<?php 

require_once 'functions.php';
$pdo = connect();

$ISBN = $_POST['ISBN'];

$query = "SELECT uzytkownik.PESEL_uzytkownika, uzytkownik.imie_uzytkownika, uzytkownik.nazwisko_uzytkownika
            FROM wypozyczenia JOIN uzytkownik ON wypozyczenia.id_uzytkownika=uzytkownik.id_uzytkownika
            JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
            WHERE ksiazka.id_statusu=2 AND ksiazka.ISBN=$ISBN AND wypozyczenia.faktyczny_termin_oddania IS NULL;";

$result = $pdo->query($query);

?>
<select class="selectBracket-RentReturn" id="searchddl2" name="zwrot_uzytkownik">
<?php
while($row=$result->fetch(PDO::FETCH_ASSOC))
{
    $PESEL=$row['PESEL_uzytkownika'];
    $imie=$row['imie_uzytkownika'];
    $nazwisko=$row['nazwisko_uzytkownika'];
    $nazwa_uzytkownika = $nazwisko;
    $nazwa_uzytkownika .= " ";
    $nazwa_uzytkownika .= $imie;
    $nazwa_uzytkownika .= " ";
    $nazwa_uzytkownika .= $PESEL;
    ?>
			<option value="<?php echo $PESEL?>"><?php echo $nazwa_uzytkownika ?></option>
<?php
}
?>
</select>