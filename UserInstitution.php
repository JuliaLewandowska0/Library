<?php require_once 'includes/config_session.php' ?>

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
		<div id="navbarLogoButton" onclick="location.href='UserHomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="navbarButtons" onclick="location.href='UserHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='UserAllBooksDisplay.php';">Katalog On-line</div>
		<div id="currentNavbarButton">Placówka</div>
		<div id="navbarButtons" onclick="location.href='UserContacts.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='UserMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
<div class="main-block-Institution">
	<div class="picture-content-Institution">
		<img id="libraryPhoto-Institution" src="images/bibliotekaZdjecie.jpg" alt="Nie udało się wczytać zdjęcia">
		<div class="middle-Institution"> <!--Przenoszenie do podglądu mapy w nowej karcie-->
			<a id="linkMaps-Institution"target="_blank" href="https://www.google.com/maps/place/Gmina+Biblioteka+Publiczna+w+Baboszewie/@52.6796857,20.2504689,17z/data=!4m10!1m2!2m1!1sbiblioteka+baboszewo!3m6!1s0x471c1625b669af7b:0x1bffafe1a5fa551b!8m2!3d52.6797524!4d20.2550374!15sChRiaWJsaW90ZWthIGJhYm9zemV3b5IBDnB1YmxpY19saWJyYXJ54AEA!16s%2Fg%2F11fzf5_ldt?entry=ttu">
			<div id="buttonPhoto-Institution">Zobacz na mapie➡</div>
		</a>
		</div>
	</div>
	<div class="text-content-Institution">
		<a id="institutionText-Institution">Placówka znajduje się przy budynku Gminy Baboszewo, na pierwszym piętrze.</a><br></br>
		<a id="institutionText-Institution">Wejście od strony parku, obok Poczty Polskiej w Baboszewie.</a><br></br>
		<a id="institutionText2-Institution">Adres: ul. Brodeckich 1, 09-130 Baboszewo</a><br></br>
		<a id="institutionText2-Institution">Godziny otwarcia:</a><br>
		<a id="institutionText-Institution">Poniedziałek: 08:00 - 16:00</a><br>
		<a id="institutionText-Institution">Wtorek: 08:00 - 16:00</a><br>
		<a id="institutionText-Institution">Środa: 08:00 - 16:00</a><br>
		<a id="institutionText-Institution">Czwartek: 08:00 - 16:00</a><br>
		<a id="institutionText-Institution">Piątek: 08:00 - 16:00</a><br>
		<a id="institutionText-Institution">Sobota: Zamknięte</a><br>
		<a id="institutionText-Institution">Niedziela: Zamknięte</a><br></br>
		<a id="institutionText3-Institution">Wszelkie informacje dotyczące kontaktu znajdziesz w zakładce "Kontakt".</a><br></br>
		<a id="institutionText2-Institution">Serdecznie zapraszamy!</a><br></br>
	</div>
</div>
</div>

<?php require_once 'includes/footer.php'?>
</body>
</html>