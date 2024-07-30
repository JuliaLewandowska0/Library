<?php require_once 'includes/config_session.php'; ?>
<?php 
	unset($_SESSION["Book_Title_To_Rent"]); 
	unset($_SESSION["Book_ISBN_To_Rent"]);
	unset($_SESSION["Surname_User_To_Rent"]);
    unset($_SESSION["Name_User_To_Rent"]);
    unset($_SESSION["PESEL_User_To_Rent"]);
?>

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
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
	<div class="main_buttons_Admin-HomePage">
		<div class="main_button1_Admin-HomePage" onclick="location.href='AdminRentBook.php';">
			<div id="buttonRent-HomePage">Wypożyczenie Książki</div>
		</div>
		<div class="main_button2_Admin-HomePage" onclick="location.href='AdminReturnBook.php';">
			<div id="buttonReturn-HomePage">Zwrot książki</div>
		</div>
	</div>
	<div class="main-block-HomePage">
		<div class="buttonOne-HomePage" onclick="location.href='AdminAllBooksDisplay.php';">
			<img class="buttonOnePicture-HomePage" src="images/button1HomePageBooks.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton1-HomePage">Wyświetl wszystkie książki</h1>
			<div id="textButton1-HomePage">Wyświetl Katalog On-line biblioteki. Z tego miejsca możliwe jest filtrowanie wyników, wyszukanie książki oraz jej wypożyczenie po podaniu konta użytkownika.</div>
		</div>
		<div class="buttonTwo-HomePage" onclick="location.href='AdminAvailableBooksL.php';">
			<img class="buttonTwoPicture-HomePage" src="images/button2HomePageLektury.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton2-HomePage">Wyświetl dostępne lektury</h1>
			<div id="textButton2-HomePage">Podgląd dostępnych lektur w placówce. Możliwość przeszukania wyników oraz wypożyczenia danej lektury po podaniu konta użytkownika.</div>
			</div>
		<div class="buttonThree-HomePage" onclick="location.href='AdminDisplayAllAccounts.php';">
			<img class="buttonThreePicture-HomePage" src="images/accounts_picture.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton3-HomePage">Wyświetl profile użytkowników</h1>
			<div id="textButton3-HomePage">Lista kont użytkowników z możliwością przejścia do szczegółów dotyczących profilu. </div>
		</div>
		<div class="buttonFour-HomePage" onclick="location.href='AdminDocumentTemplate.php';">
			<img class="buttonFourPicture-HomePage" src="images/documents_template.jpg" alt="Błąd wczytywania obrazka" />
			<h1 id="headerButton4-HomePage">Generuj szablony dokumentów</h1>
			<div id="textButton4-HomePage">Możliwość generowania potrzebnych szablonów dokumentów - zestawień rocznych oraz zestawień miesięcznych</div>
		</div>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>