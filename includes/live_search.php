<?php

require 'functions.php';
$pdo = connect();

if(isset($_POST['input']))
{
    $input = $_POST['input'];

    $query = "SELECT ksiazka.ISBN, ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, gatunek.nazwa_gatunku, 
            ksiazka.id_ksiazki, ksiazka.rok_wydania_ksiazki, ksiazka.wydawnictwo_ksiazki, 
            ksiazka.ilosc_stron_ksiazki FROM ksiazka 
            JOIN autor ON ksiazka.id_autora=autor.id_autora 
            JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku
            WHERE ksiazka.tytul_ksiazki LIKE '$input%'
            OR autor.imie_nazwisko_autora LIKE '$input%'
            OR ksiazka.ISBN LIKE '$input%'
            OR gatunek.nazwa_gatunku LIKE '$input%'
            OR ksiazka.rok_wydania_ksiazki LIKE '$input%'
            OR ksiazka.wydawnictwo_ksiazki LIKE '$input%'
            ORDER BY ksiazka.id_ksiazki;";

    $result2 = "SELECT COUNT(*) FROM ksiazka 
            JOIN autor ON ksiazka.id_autora=autor.id_autora 
            JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku
            WHERE ksiazka.tytul_ksiazki LIKE '$input%'
            OR ksiazka.ISBN LIKE '$input%'
            OR autor.imie_nazwisko_autora LIKE '$input%'
            OR gatunek.nazwa_gatunku LIKE '$input%'
            OR ksiazka.rok_wydania_ksiazki LIKE '$input%'
            OR ksiazka.wydawnictwo_ksiazki LIKE '$input%';";

    $result = $pdo->query($query);
    $resultCheck = $pdo->query($result2);
	$count = $resultCheck->fetchColumn();

	if($count > 0)
	{
    ?>
		<table class="contentTable-FavouriteModify">
                <tr class="tableColumnNames-FavouriteModify">
                    <th class="tableColumn-FavouriteModify" id="column1-Modify">ISBN</th>
                    <th class="tableColumn-FavouriteModify" id="column2-Modify">Tytuł</th>
                    <th class="tableColumn-FavouriteModify" id="column3-Modify">Autor</th>
                    <th class="tableColumn-FavouriteModify" id="column4-Modify">Gatunek</th>
                    <th class="tableColumn-FavouriteModify" id="column5-Modify">Rok wydania</th>
                    <th class="tableColumn-FavouriteModify" id="column6-Modify">Wydawnictwo</th>
                    <th class="tableColumn-FavouriteModify" id="column7-Modify">Ilość stron</th>
                    <th class="tableColumn-FavouriteModify" id="column8-Modify">Modyfikuj</th>
                    <th class="tableColumn-FavouriteModify" id="column9-Modify">Usuń</th>
                </tr>
            <?php
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $ISBN = $row['ISBN'];
                $id = $row['id_ksiazki'];
                $tytul = $row['tytul_ksiazki'];
                $autor = $row['imie_nazwisko_autora'];
                $gatunek = $row['nazwa_gatunku'];
                $wydawnictwo = $row['wydawnictwo_ksiazki'];
                $rok = $row['rok_wydania_ksiazki'];
                $strony = $row['ilosc_stron_ksiazki'];

            ?>
                <tr>
                    <td id="tableRow-FavouriteModify"><?php echo $ISBN ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $tytul ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $autor ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $gatunek ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $rok ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $wydawnictwo ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $strony ?></td>
                    <td id="tableRow-FavouriteModify"><div class="tableButton-FavouriteModify" id="tableButton2-FavouriteModify" onclick=<?php echo "location.href='AdminModifyRecord.php?idbook=$id';" ?>>Modyfikuj</div></td>
                    <td id="tableRow-FavouriteModify"><button class="tableButton-FavouriteModify" id="tableButton3-FavouriteModify" onclick="deleteFunctionContr(<?php echo $id ?>)">Usuń</div></td>
                </tr>
            <?php
            }
            ?>
            </table>
    <?php
	}
    else
    {
        echo "<div class='noDataFound-Text'>Nie znaleziono wyników pasujących do kryterium wyszukiwania!</div>";
    }
}

?>