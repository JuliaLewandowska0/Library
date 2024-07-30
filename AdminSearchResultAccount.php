<?php require_once 'includes/functions.php' ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Gminna Biblioteka Publiczna w Baboszewie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleMain.css">
	<link rel="stylesheet" href="styleAllBooksLDisplay.css">
    <link rel="stylesheet" href="styleAllAccountsAdmin.css">
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
    <div class="product-wrapper">
    <?php
        if(isset($_POST['submitSearchField']))
        {
            $pdo = connect();
            $search = $_POST['searchField']; //Przypisanie wprowadzonego ciągu znaków przez użytkownik do zmiennej 
            $length = strlen($search); //Sprawdzenie długości zmiennej

            if($length > 1) //Przypisanie odpowiedniej funkcji do tablicy 'profile' na podstawie długości zmiennej
            {
                $profile = getSearchResultAccountLong($search);
            }
            else
            {
                $profile = getSearchResultAccountShort($search);
            }
            
            if(is_array($profile)) //Sprawdzenie czy wynik jest tablicą
            {
            ?>
                <h1 id="headerDisplayBooks-AllBooksDisplay6">Wyniki wyszukiwania</h1>
                <div id="textUnderDisplayHeader-AllBooksDisplay6">Kliknij wybrany profil, aby zobaczyć szczegółowe informacje na jego temat.</div>
            <?php    
                foreach ($profile as $profil) //Wyświetlanie wyników wyszukiwania
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
                <div id="returnButton_style1" onclick="location.href='AdminDisplayAllAccounts.php';">Wróć do przeglądania</div>
                <?php
            }
            else //Jeśli nie ma wyników (wynik nie jest tablicą), wyświetlana jest wiadomość o ich braku
            {
            ?>  
                <div class="right6">
                <h1 id="headerDisplayBooks-AllBooksDisplay">Nie znaleziono wyników</h1>
                <div id="textUnderDisplayHeader-AllBooksDisplay">Niestety nie znaleziono wyników pasujących do kryterium wyszukiwania. Spróbuj ponownie.</div>
                <div id="returnButton_style5" onclick="location.href='AdminDisplayAllAccounts.php';">Wróć do przeglądania</div>
                </div>
            <?php
            }
        }
        ?>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="details_connection.js"></script>
</body>
</html>