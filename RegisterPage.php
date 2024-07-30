<?php
require_once 'includes/config_session.php';
require_once 'includes/signup_view.php';
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
		<form action="includes/signup.php" method="post" class="registerForm">
            <div class="text-RegisterLoginChange">Rejestracja</div>
            <?php
                signupInput();
            ?>
            <input type="submit" name="submit" value="Zarejestruj się" class="submitButton-form">
            <div class="submitButton-form" id="cancelButton-form" onclick="location.href='HomePage.php';">Anuluj</div>
            <div class="textInsideForm-registerForm" id="textInsideForm2">Nazwa użytkownika będzie używana do logowania na stronie</div>
            <div class="textInsideForm-registerForm">Masz już konto?</div>
            <div class="loginText-RegisterForm" onclick="location.href='LoginPage.php';">Zaloguj się!</div>
        </form>
        <?php
            check_signup_errors();
        ?>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>