<?php require_once 'includes/getUserInfo_contr.php'; ?>

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
		<div id="navbarButtons" onclick="location.href='UserHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='UserAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='UserInstitution.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='UserContacts.php';">Kontakt</div>
		<div id="currentNavbarButton">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
	<div class="main-block-MyAccount">
        <img id="zakladkaImage-MyAccount" src="images/zakladkaKsiazka.png" alt="Nie udało się wczytać zdjęcia">
        <div class="middle-block-MyAccount">
            <div class="userNameField-MyAccount">
                <div id="userNameText-MyAccount"><?php echo $imieUzytkownika ?></div>
                <div id="userNameText-MyAccount"><?php echo $nazwiskoUzytkownika ?></div>
            </div>
            <div id="userInfoTextFirst-MyAccount">Informacje o profilu</div>
            <div id="userInfoText-MyAccount">Nazwa Użytkownika: <span><?php echo $nazwaUzytkownika ?></span></div>
            <div id="userInfoText-MyAccount">Adres E-mail: <span><?php echo $adresEmailUzytkownika ?></span></div>
            <div id="userInfoText-MyAccount">Data urodzenia: <span><?php echo $dataUrodzeniaUzytkownika ?></span></div>
            <div id="userInfoText-MyAccount">PESEL: <span><?php echo $PESELUzytkownika ?></span></div>
            <div id="userInfoText-MyAccount">Adres: <span><?php echo $adresUzytkownika ?></span></div>
            <div id="userInfoText-MyAccount">Numer Telefonu: <span><?php echo $nrTelefonuUzytkownika ?><span></div>
        </div>
        <div class="right-block-MyAccount">
            <div id="settingsButtons-MyAccount" onclick="location.href='UserMyBooks.php';">Wypożyczone książki</div>
            <div id="settingsButtons-MyAccount" onclick="location.href='UserFavouriteDisplay.php';">Lista ulubionych</div>
            <div id="settingsButtons-MyAccount" onclick="location.href='UserChangeAccountInfo.php';">Zmień informacje o profilu</div>
            <div id="settingsButtons-MyAccount" onclick="location.href='UserChangePassword.php';">Zmień hasło</div>
            <button id="settingsButtonsLogOut-MyAccount" onclick="logoutFunction()">Wyloguj się</button>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>  
<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logoutFunction() 
    {
        Swal.fire({
            title: "Czy na pewno chcesz się wylogować?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3EC562",
            cancelButtonColor: "#C53831",
            confirmButtonText: "Wyloguj",
            cancelButtonText: "Anuluj"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="includes/logout.php";
            }
        });
    }
</script>   
</body>
</html>