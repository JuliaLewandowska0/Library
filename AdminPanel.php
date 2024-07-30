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
		<div id="navbarLogoButton" onclick="location.href='AdminHomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="currentNavbarButton">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
    <div class="main-block-AdminPanel">
		<div id="first-button-AdminPanel" onclick="location.href='AdminRentBook.php';">Wypożyczenie książki</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminReturnBook.php';">Zwrot książki</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminModifyDatabase.php';">Modyfikuj bazę danych książek</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminAddBook.php';">Dodaj nową książkę do bazy danych</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminDisplayAllAccounts.php';">Wyświetl profile użytkowników</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminLateReturnUsers.php';">Wyświetl użytkowników z zaległymi zwrotami</div>
		<div id="buttons-AdminPanel" onclick="location.href='AdminStatistics.php';">Statystyki</div>
		<div id="last-button-AdminPanel" onclick="location.href='AdminDocumentTemplate.php';">Wyświetl szablony dokumentów</div>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>