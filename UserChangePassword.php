<?php require_once 'includes/change_password_view.php'; ?>
<?php require_once 'includes/config_session.php'; ?>

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
<div class="main-content-ver1">
	<div class="main-block-RegisterLoginChange">
		<form class="registerForm" action="includes/change_password.php" method="post">
            <div class="text-RegisterLoginChange">Zmiana hasła</div>
            <input type="password" name="stare_haslo_uzytkownika" id="inputBracket" placeholder="Bieżące hasło">
            <input type="password" name="nowe_haslo_uzytkownika" id="inputBracket" placeholder="Nowe hasło">
            <input type="password" name="nowe_haslo_powtorzenie" id="inputBracket" placeholder="Powtórz hasło">
            <input type="submit" name="submit" value="Potwierdź" class="submitButton-form">
            <div class="submitButton-form" id="cancelButton-form" onclick="location.href='UserMyAccount.php';">Anuluj</div>
        </form>
        <?php
        check_password_change_errors()
        ?>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>