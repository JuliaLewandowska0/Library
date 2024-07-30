<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php

if(isset($_POST['id_uzytkownika'])) 
{
    $idb = $_POST['id_uzytkownika'];
	$_SESSION["ID_User_To_Rent"] = $idb;
    $userFirstName = getUserFirstName($idb);
	$_SESSION["Name_User_To_Rent"] = $userFirstName;
	$userLastName = getUserLastName($idb);
	$_SESSION["Surname_User_To_Rent"] = $userLastName;
	$userBirthDate = getUserBirthDate($idb);
	$userPESEL = getUserPESEL($idb);
	$_SESSION["PESEL_User_To_Rent"] = $userPESEL;
	$userEmailAddress = getUserEmailAddress($idb);
	$userUsername = getUserUsername($idb);
	$userAddress = getUserAddress($idb);
	$userPhoneNumber = getUserPhoneNumber($idb);
	
	echo json_encode([
        'name' => $userFirstName,
        'surname' => $userLastName,
		'birthday' => $userBirthDate,
		'pesel' => $userPESEL,
		'email' => $userEmailAddress,
		'username' => $userUsername,
		'address' => $userAddress,
		'phone' => $userPhoneNumber
	]);	
    exit;
}
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
		<div id="navbarLogoButton" onclick="location.href='AdminHomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
	<h1 class="information_text-AccountsDetails">Karta biblioteczna użytkownika</h1>
	<div class="main-block-AccountDetails">
		<div id="user_first_name-AccountDetails">Imię Użytkownika - Loading</div>
		<div id="user_last_name-AccountDetails">Nazwisko Użytkownika - Loading</div>
		<div id="user_birth_date-AccountDetails">Data Urodzenia - Loading</div>
		<div id="user_pesel-AccountDetails">PESEL - Loading</div>
		<div id="user_email_address-AccountDetails">Adres e-mail - Loading</div>
		<div id="user_username-AccountDetails">Nazwa Użytkownika - Loading</div>
		<div id="user_address-AccountDetails">Adres: - </div>
		<div id="user_phone_number-AccountDetails">Numer telefonu: - </div>
		<div id="change_info_button-AccountDetails" onclick="location.href='AdminUsersBooks.php';">Zobacz wypożyczone książki</div>
		<div id="return_button-AccountDetails" onclick="location.href='AdminDisplayAllAccounts.php';">Powrót do wszystkich profili</div>
		<div id="rent_button-AccountDetails" onclick="location.href='AdminRentBook.php';">Wypożycz↪</div>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>
<script>
    $(document).ready(function()
	{
        let id_uzytkownika = localStorage.getItem("idprofil");

        $.ajax(
		{
            type: "POST",
            url: 'AdminAccountsDetails.php',
			dataType: 'json',
            data: { id_uzytkownika: id_uzytkownika },
            success: function(response) 
			{
                $("#user_first_name-AccountDetails").text(response.name);
				$("#user_last_name-AccountDetails").text(response.surname);
				$("#user_birth_date-AccountDetails").text("Data urodzenia: " + response.birthday);
				$("#user_pesel-AccountDetails").text("PESEL: " + response.pesel);
				$("#user_email_address-AccountDetails").text("Adres e-mail: " + response.email);
				$("#user_username-AccountDetails").text("Nazwa użytkownika: " + response.username);
				$("#user_address-AccountDetails").text("Adres: " + response.address);
				$("#user_phone_number-AccountDetails").text("Numer telefonu: " + response.phone);
            }
        });
    });
</script>
</body>
</html>