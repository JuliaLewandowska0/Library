<?php require_once 'includes/functions.php'?>

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
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>
    
<div class="main-content-ver2">
	<form class="searchBar-AllAccounts" action="AdminSearchResultAccount.php" method="POST">
		<input id="searchField-AllAccounts" type="text" name="searchField" placeholder="Wyszukaj imię lub nazwisko użytkownika">
		<button id="submitSearchFieldButton-AllAccounts" type="submit" name="submitSearchField">Szukaj</button>
	</form>
	<h2 id="headerDisplayAccounts-AllAccountsDisplay">Profile Użytkowników</h2>
	<div id="textUnderDisplayHeader-AllAccountsDisplay">Kliknij wybrany profil, aby zobaczyć szczegółowe informacje na jego temat.</div>
	<div class="profile-wrapper">
		<?php //Funkcja wyświetlająca wszystkie profile użytkowników na stronie
			$profile = getAllAccounts();
			foreach ($profile as $profil)
			{
			?>
				<div class="profile" onclick="details_connection_Admin_accounts(<?php echo $profil['id_uzytkownika'] ?>)">
					<div class="left1">
						<img id="profilePicture" src="images/user_profile_picture.png" alt="brak">
					</div>
					<div class="right1">
						<p class="surname"><?php echo $profil['nazwisko_uzytkownika'] ?></p>
						<p class="name"><?php echo $profil['imie_uzytkownika'] ?></p>
						<p class="profileName"><?php echo $profil['nazwa_uzytkownika'] ?></p>
					</div>
				</div>
			<?php
			}
			?>
	</div>
</div>

<?php require_once 'includes/footer.php'?>
<script src="details_connection.js"></script>
</body>
</html>