<?php require_once 'includes/getUserInfo_contr.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/check_late_return.php'; ?>

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
		<div id="navbarButtons" onclick="location.href='UserAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='UserInstitution.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='UserContacts.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='UserMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
	<?php 
		if(!isset($_SESSION['visited']))
		{
			$_SESSION['visited'] = true;
			check_late_return($idUzytkownika);
		}
	?>
	<div class="picture-HomePage">
		<img id="bookcasePicture-HomePage" src="images/libraryBookcase2.jpg" alt="Nie udało się wczytać zdjęcia">
		<div class="pictureMiddleText-HomePage">
			<div id="middleText-HomePage">Witaj <span><?php echo $imieUzytkownika ?></span>!</div>
			<div id="middleTextQuote-HomePage">„Kocham książkę dlatego, że wprowadza mnie w mój własny świat, że odkrywa we mnie bogactwa, których nie przeczuwałem.”</div>
			<div id="middleTextItalic-HomePage">- Jarosław Iwaszkiewicz</div>
		</div>
		<div id="arrow-HomePage">↓</div>
	</div>
	<div class="main-block-HomePage">
		<div class="buttonOne-HomePage" onclick="location.href='UserMyBooks.php';"> <!--Przejście do wypożyczonych książek użytkownika-->
			<img class="buttonOnePicture-HomePage" src="images/button3(2)HomePageMyBooks.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton1-HomePage">Moje wypożyczone książki</h1>
			<div id="textButton1-HomePage">W tej zakładce znajdziesz wypożyczone przez Ciebie książki. Śledź na bieżąco jakie pozycje są aktualnie przypisane do Twojej karty bibliotecznej oraz jaki jest termin ich oddania.</div>
		</div>
		<div class="buttonTwo-HomePage" onclick="location.href='UserAllBooksDisplay.php';"> <!--Przejście do katalogu on-line-->
			<img class="buttonTwoPicture-HomePage" src="images/button1HomePageBooks.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton2-HomePage">Wyświetl katalog on-line biblioteki</h1>
			<div id="textButton2-HomePage">Katalog on-line zawiera książki, które są możliwe do wypożyczenia w bibliotece. Wyszukaj pozycję, która Cię interesuje lub przeszukuj dowolnie katalog w celu znalezienia idealnej książki!</div>
		</div>
		<div class="buttonThree-HomePage" onclick="location.href='UserAllBooksLDisplay.php';"> <!--Przejście do wszystkich lektur biblioteki-->
			<img class="buttonThreePicture-HomePage" src="images/button2HomePageLektury.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton3-HomePage">Zobacz dostępne lektury</h1>
			<div id="textButton3-HomePage">Wyświetl lektury, które są możliwe do wypożyczenia w bibliotece. Wyszukaj pozycję lub przeszukuj dowolnie katalog w celu znalezienia odpowiedniej lektury szkolnej.</div>
		</div>
		<div class="buttonFour-HomePage" onclick="location.href='UserHowTo.php';"> <!--Przejście do strony informacyjnej-->
			<img class="buttonFourPicture-HomePage" src="images/button4HomePageHowTo.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton4-HomePage">Dowiedz się, jak wygląda proces wypożyczania książek</h1>
			<div id="textButton4-HomePage">Tutaj znajdziesz szczegółowe informacje na temat tego, jak działa strona internetowa, co oferuje oraz jak wygląda dokładny proces wypożyczenia książki w bibliotece.</div>
		</div>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>    
</body>
</html>