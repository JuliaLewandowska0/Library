<?php
require_once 'includes/config_session.php';
require_once 'includes/login_view.php';
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
<div class="main-content-ver1">
	<div class="main-block-RegisterLoginChange">
		<form class="registerForm" action="includes/login.php" method="post">
            <div class="text-RegisterLoginChange">Logowanie</div>
            <input type="text" name="nazwa_uzytkownika" id="inputBracket" placeholder="Nazwa użytkownika">
            <input type="password" name="haslo_uzytkownika" id="inputBracket" placeholder="Hasło">
            <input type="submit" name="submit" value="Zaloguj się" class="submitButton-form">
            <div class="submitButton-form" id="cancelButton-form" onclick="location.href='HomePage.php';">Anuluj</div>
            <div class="textInsideForm-registerForm">Nie masz konta?</div>
            <div class="loginText-RegisterForm" onclick="location.href='RegisterPage.php';">Zarejestruj się!</div>
        </form>
        <?php
        check_login_errors();
        ?>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>