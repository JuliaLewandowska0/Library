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
		<div id="navbarButtons" onclick="location.href='HomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='InstitutionPage.php';">Placówka</div>
		<div id="currentNavbarButton">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='LoginPage.php';">Zaloguj się</div>
	</div>
</div>

<div class="main-content-ver3">
	<div class="main-block-Contacts">
		<div id="mainContactsText-Contacts">Skontaktuj się z nami!</div>
		<div id="contactsText-Contacts">Godziny pracy biblioteki: Pn.-Pt.: 8:00 - 16:00</div>
		<div id="contactsText-Contacts">ul. Brodeckich 1, 09-130 Baboszewo</div><br>
		<img id="libraryImage-Contacts" src="images/libraryImage.png" alt="Nie udało się wczytać zdjęcia">
		<div id="imageText-Contacts">Gminna Biblioteka Publiczna w Baboszewie</div><br>
		<div id="mainContactsText-Contacts">Informacje kontaktowe:</div>
		<div id="contactsText-Contacts">Numer telefonu: 23 66 11 091  wew. 56</div>
		<div id="contactsText-Contacts">E-mail: biblioteka1-62@tlen.pl</div>
		<div id="contactsText-Contacts">Fax: 23 66 11 071</div><br>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>	
</body>
</html>