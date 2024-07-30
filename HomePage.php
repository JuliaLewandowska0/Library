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
		<div id="navbarLogoButton">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="currentNavbarButton">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='InstitutionPage.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='ContactsPage.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='LoginPage.php';">Zaloguj się</div>
	</div>
</div>
	
<div class="main-content-ver3">
	<div class="picture-HomePage">
		<img id="bookcasePicture-HomePage" src="images/libraryBookcase2.jpg" alt="Nie udało się wczytać zdjęcia">
		<div class="pictureMiddleText-HomePage">
			<div id="middleText-HomePage">Zacznij czytać już dziś!</div>
			<div id="middleTextQuote-HomePage">„Kocham książkę dlatego, że wprowadza mnie w mój własny świat, że odkrywa we mnie bogactwa, których nie przeczuwałem.”</div>
			<div id="middleTextItalic-HomePage">- Jarosław Iwaszkiewicz</div>
		</div>
		<div id="arrow-HomePage">↓</div>
	</div>
	<div class="main-block-HomePage">
		<div class="buttonOne-HomePage" onclick="location.href='AllBooksDisplay.php';">
			<img class="buttonOnePicture-HomePage" src="images/button1HomePageBooks.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton1-HomePage">Wyświetl katalog on-line biblioteki</h1>
			<div id="textButton1-HomePage">Katalog on-line zawiera książki, które są możliwe do wypożyczenia w bibliotece. Wyszukaj pozycję, która Cię interesuje lub przeszukuj dowolnie katalog w celu znalezienia idealnej książki!</div>
		</div>
		<div class="buttonTwo-HomePage" onclick="location.href='AllBooksLDisplay.php';">
			<img class="buttonTwoPicture-HomePage" src="images/button2HomePageLektury.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton2-HomePage">Zobacz dostępne lektury</h1>
			<div id="textButton2-HomePage">Wyświetl lektury, które są możliwe do wypożyczenia w bibliotece. Wyszukaj pozycję lub przeszukuj dowolnie katalog w celu znalezienia odpowiedniej lektury szkolnej.</div>
		</div>
		<div class="buttonThree-HomePage" onclick="location.href='RegisterPage.php';">
			<img class="buttonThreePicture-HomePage" src="images/button3HomePageRegister.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton3-HomePage">Nie masz konta? Zarejestruj się!</h1>
			<div id="textButton3-HomePage">Rejestracja jest darmowa, a posiadanie konta odpowiada posiadniu karty bibliotecznej. Założenie konta oferuje dodatkowe funkcje i ułatwienie wypożyczania książek!</div>
		</div>
		<div class="buttonFour-HomePage" onclick="location.href='HowToPage.php';">
			<img class="buttonFourPicture-HomePage" src="images/button4HomePageHowTo.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton4-HomePage">Dowiedz się, jak wygląda proces wypożyczania książek</h1>
			<div id="textButton4-HomePage">Tutaj znajdziesz szczegółowe informacje na temat tego, jak działa strona internetowa, co oferuje oraz jak wygląda dokładny proces wypożyczenia książki w bibliotece.</div>
		</div>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>