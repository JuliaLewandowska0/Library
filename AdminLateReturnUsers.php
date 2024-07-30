<?php require_once 'includes/functions.php'; ?>

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
        <div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver2">
<?php 
    $data = date('Y-m-d');
    $ksiazki = displayLateReturnAdmin($data);
    if(is_array($ksiazki))
    {
?>
        <h1 id="headerDisplayBooks-FavouriteModify">Zaległe zwroty</h1>
        <div id="text2UnderDisplayHeader-FavouriteModify">Poniższe zestawienie zawiera adres e-mail użytkowników w razie konieczności kontaktu.</div>
        <div id="product-wrapper">
            <table class="contentTable-FavouriteModify">
                <tr class="tableColumnNames-FavouriteModify">
                    <th class="tableColumn-FavouriteModify">Tytuł</th>
                    <th class="tableColumn-FavouriteModify">Autor</th>
                    <th class="tableColumn-FavouriteModify">Imie użytkownika</th>
                    <th class="tableColumn-FavouriteModify">Nazwisko użytkownika</th>
                    <th class="tableColumn-FavouriteModify">Adres e-mail</th>
                    <th class="tableColumn-FavouriteModify">Termin wypożyczenia</th>
                    <th class="tableColumn-FavouriteModify">Termin oddania</th>
                </tr>
            <?php
            foreach ($ksiazki as $ksiazka)
            {
            ?>
                <tr>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['tytul_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_nazwisko_autora'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_uzytkownika'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['nazwisko_uzytkownika'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['adres_email_uzytkownika'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['termin_wypozyczenia'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['termin_oddania'] ?></td>
                </tr>
            <?php
            }
            ?>
            </table> 
            <div id="returnButton-FavouriteModify" onclick="location.href='AdminPanel.php';">Wróć do panelu administratora</div>
        </div>
    <?php 
    }
    else
    {
    ?>
        <h1 id="headerDisplayBooks-FavouriteModify">Brak zaległych zwrotów.</h1>
        <div id="text2UnderDisplayHeader-FavouriteModify">Brak zaległych zwrotów ☻</div>
        <div id="returnButton-FavouriteModify" onclick="location.href='AdminPanel.php';">Wróć do panelu administratora</div>
    <?php
    }
    ?>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>   
</body>
</html>