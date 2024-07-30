<?php

require_once 'getUserInfo_contr.php';
$pdo = connect();

if(isset($_POST['input']))
{
    $input = $_POST['input'];

    $query = "SELECT ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, ksiazka.id_ksiazki,
            ksiazka.okladka, wypozyczenia.termin_wypozyczenia, wypozyczenia.faktyczny_termin_oddania FROM wypozyczenia
            JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
            JOIN autor ON ksiazka.id_autora=autor.id_autora 
            WHERE ksiazka.tytul_ksiazki LIKE '$input%'
            AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL
            AND wypozyczenia.id_uzytkownika=$idUzytkownika
            OR autor.imie_nazwisko_autora LIKE '$input%'
            AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL
            AND wypozyczenia.id_uzytkownika=$idUzytkownika
            ORDER BY ksiazka.id_ksiazki;";

    $result2 = "SELECT COUNT(*) FROM wypozyczenia
            JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
            JOIN autor ON ksiazka.id_autora=autor.id_autora 
            WHERE ksiazka.tytul_ksiazki LIKE '$input%'
            AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL
            AND wypozyczenia.id_uzytkownika=$idUzytkownika
            OR autor.imie_nazwisko_autora LIKE '$input%'
            AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL
            AND wypozyczenia.id_uzytkownika=$idUzytkownika
            ORDER BY ksiazka.id_ksiazki;";

    $result = $pdo->query($query);
    $resultCheck = $pdo->query($result2);
	$count = $resultCheck->fetchColumn();

	if($count > 0)
	{
    ?>
		<h1 id="headerDisplayBooks-FavouriteModify2">Historia wypożyczonych przez Ciebie książek</h1>
        <div id="textUnderDisplayHeader-FavouriteModify">Tutaj możesz sprawdzić historię swoich wypożyczych książek.</div>
        <div id="text2UnderDisplayHeader-FavouriteModify">Jeśli chcesz zobaczyć szczegóły książki, przejdź do Katalogu On-Line i wyszukaj wybraną pozycję.</div>
        <table class="contentTable-FavouriteModify">
            <tr class="tableColumnNames-FavouriteModify">
                <th class="tableColumn-FavouriteModify" id="column10-Modify">Podgląd</th>
                <th class="tableColumn-FavouriteModify" id="column11-Modify">Tytuł Książki</th>
                <th class="tableColumn-FavouriteModify" id="column12-Modify">Autor</th>
                <th class="tableColumn-FavouriteModify" id="column13-Modify">Data Wypożyczenia</th>
                <th class="tableColumn-FavouriteModify" id="column14-Modify">Data Oddania</th>
            </tr>
            <?php
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $okladka = $row['okladka'];
                $tytul_ksiazki = $row['tytul_ksiazki'];
                $imie_nazwisko_autora = $row['imie_nazwisko_autora'];
                $termin_wypozyczenia = $row['termin_wypozyczenia'];
                $faktyczny_termin_oddania = $row['faktyczny_termin_oddania'];
            ?>
                <tr>
                    <td id="tableRowCover-FavouriteModify"><img id="bookCovers-FavouriteModify" src="<?php echo $okladka ?>" alt="brak"></td>
                    <td id="tableRow-FavouriteModify"><?php echo $tytul_ksiazki ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $imie_nazwisko_autora ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $termin_wypozyczenia ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $faktyczny_termin_oddania ?></td>
                </tr>
            <?php
            }
            ?>
            </table>
            <div id="returnButton-FavouriteModify" onclick="location.href='UserMyBooks.php';">Powrót do Wypożyczonych Książek</div>
    <?php
	}
    else
    {
        echo "<div class='noDataFound-Text'>Nie znaleziono wyników pasujących do kryterium wyszukiwania!</div>";
    }
}

?>