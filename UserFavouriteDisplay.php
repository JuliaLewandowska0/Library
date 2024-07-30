<?php require_once 'includes/getUserInfo_contr.php' ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Gminna Biblioteka Publiczna w Baboszewie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleMain.css">
	<link rel="icon" type="image/x-icon" href="images/libraryIcon.png">
</head>

<body>
<div class="navbar">
	<div class="logoNavbarFull">
		<img class="logoNavbar" src="images/libraryImage.png" alt="Błąd wczytywania obrazka" />
		<div id="navbarLogoButton" onclick="location.href='HomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
        <div id="navbarButtons" onclick="location.href='UserHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='UserAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='UserInstitution.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='UserContacts.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='UserMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver2">
    <div class="product-wrapper">
        <?php
            $pdo = connect();
            $ksiazki = displayFavourite($idUzytkownika);
                
            if(is_array($ksiazki)) //Sprawdzenie czy wynik jest tablicą
            {
            ?>
                <h1 id="headerDisplayBooks-FavouriteModify">Twoje ulubione książki</h1>
                <div id="textUnderDisplayHeader-FavouriteModify">Kliknij przycisk "Usuń" aby usunąć daną książkę z listy ulubionych.</div>
                <div id="text2UnderDisplayHeader-FavouriteModify">Jeśli chcesz zobaczyć szczegóły książki, przejdź do Katalogu On-Line i wyszukaj wybraną pozycję.</div>
                <table class="contentTable-FavouriteModify">
                    <tr class="tableColumnNames-FavouriteModify">
                        <th class="tableColumn-FavouriteModify">Podgląd</th>
                        <th class="tableColumn-FavouriteModify">Tytuł Książki</th>
                        <th class="tableColumn-FavouriteModify">Autor</th>
                        <th class="tableColumn-FavouriteModify">Gatunek</th>
                        <th id="tableColumnStatus-FavouriteModify">Status</th>
                        <th id="tableColumnButton-FavouriteModify">Usuń z ulubionych</th>
                    </tr>
            <?php
                foreach ($ksiazki as $ksiazka) //Wyświetlanie wyników wyszukiwania
                {
                ?>
                    <tr>
                        <td id="tableRowCover-FavouriteModify"><img id="bookCovers-FavouriteModify" src="<?php echo $ksiazka['okladka'] ?>" alt="brak"></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['tytul_ksiazki'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_nazwisko_autora'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['nazwa_gatunku'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['nazwa_statusu'] ?></td>
                        <td id="tableRow-FavouriteModify"><div class="tableButton-FavouriteModify" onclick=<?php echo "location.href='includes/delete_from_favourite.php?idbook=$ksiazka[id_ksiazki]';" ?>>Usuń</div></td>
                    </tr>
                <?php
                }
                ?>
                </table>
                <div id="returnButton-FavouriteModify" onclick="location.href='UserMyAccount.php';">Wróć do profilu</div>
            <?php
            }
            else //Jeśli nie ma wyników (wynik nie jest tablicą), wyświetlana jest wiadomość o ich braku
            {
            ?>  
                <h1 id="headerDisplayBooks-FavouriteModify">Nie masz jeszcze żadnych książek na swojej liście!</h1>
                <div id="textUnderDisplayHeader-FavouriteModify">Dodaj książki wchodząc w szczegóły książki z Katalogu i klikając przycisk "Dodaj do ulubionych"!</div>
                <div id="returnButton-FavouriteModify" onclick="location.href='UserMyAccount.php';">Wróć do profilu</div>
            <?php
            }
            ?>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>