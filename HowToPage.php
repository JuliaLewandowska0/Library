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
		<div id="navbarButtons" onclick="location.href='HomePage.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='InstitutionPage.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='ContactsPage.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='LoginPage.php';">Zaloguj się</div>
	</div>
</div>
	
<div class="main-content-ver3">
	<div class="main-block-HowTo">
		<div class="firstContent-HowTo">
			<img class="firstContentPicture-HowTo" src="images/woman_book.jpg" alt="Błąd wczytywania obrazka" />
			<a id="firstContentText-HowTo">Dowiedz się więcej na temat funkcjonowania Gminnej Biblioteki Publicznej w Baboszewie! Poniżej znajdują się odpowiedzi na najważniejsze pytania dotyczące działania aplikacji internetowej oraz wypożyczania książek. W przypadku dalszych wątpliwości, skontaktuj się z placówką.</a>
		</div>
		<img class="separator-HowTo" src="images/separator_black.jpg" alt="Błąd wczytywania obrazka" />
		<div class="firstHeaderAndQuestionMark-HowTo">
			<img class="questionMarks-HowTo" src="images/question_marks.jpg" alt="Błąd wczytywania obrazka" />
			<a id="firstheaderText-HowTo">Jak działa aplikacja internetowa i co oferuje?</a>
		</div>
		<a id="text-HowTo">W tej aplikacji masz możliwość sprawdzenia jakie książki może zaoferować Gminna Biblioteka Publiczna w Baboszewie. Dodatkowo, po zalogowaniu, wyświetla się dostępność książek, które wyszukujesz co ułatwia zaplanowanie ich wypożyczenia. Książki, które Cię zainteresują możesz dodać do listy ulubionych, aby na bieżąco móc sprawdzać ich dostępność.</a>
		<a id="warning-HowTo">Uwaga! Książki znajdujące się na liście ulubionych nie są zarezerwowane! Aby wypożyczyć książkę musisz udać się do placówki bibliotecznej!</a>
		<div class="headerAndQuestionMark-HowTo">
			<img class="questionMarks-HowTo" src="images/question_marks.jpg" alt="Błąd wczytywania obrazka" />
			<a id="headerText-HowTo">Co daje stworzenie konta?</a>
		</div>
		<a id="text-HowTo">Po stworzeniu konta w aplikacji internetowej możesz sprawdzać dostępność wybranych książek, dodawać je do listy ulubionych oraz na bieżąco śledzić jakie książki są wypożyczone na Twoim koncie.</a>
		<div class="header2AndQuestionMark-HowTo">
			<img class="questionMarks-HowTo" src="images/question_marks.jpg" alt="Błąd wczytywania obrazka" />
			<a id="headerText-HowTo">Jak wypożyczać książki?</a>
		</div>
		<a id="text-HowTo">Do wypożyczania książek potrzebna jest karta biblioteczna, która jest równoważna z posiadaniem konta na stronie, na której aktualnie jesteś. Aby założyć konto przejdź do Strony Głównej i kliknij przycisk "Nie masz konta? Zarejestruj się!". Jeśli już posiadasz konto, możesz się na nie zalogować używając przycisku "Zaloguj się" w prawym górnym rogu. Konto może również zostać utworzone bezpośrednio w Gminnej Bibliotece Publicznej w Baboszewie przy wypożyczaniu książki. Aby wypożyczyć książkę, trzeba udać się do placówki Gminnej Biblioteki Publicznej w Baboszewie. Nie ma możliwości rezerwowania książek drogą Internetową.</a>
		<img class="separator-HowTo" src="images/separator_black.jpg" alt="Błąd wczytywania obrazka" />
		<a id="openHoursAndContactsText-HowTo">Wszelkie informacje dotyczące kontaktu znajdziesz w zakładce "Kontakt".</a>
		<a id="openHoursAndContactsText2-HowTo">Godziny otwarcia Biblioteki znajdziesz w zakładce "Placówka". Zapraszamy!</a>	
	</div>
</div>
	
<?php require_once 'includes/footer.php' ?>
</body>
</html>