<?php require_once 'includes/getUserInfo_contr.php'; ?>
<?php require_once 'includes/change_acc_info_view.php'; ?>

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
	<div class="main-block-RegisterLoginChange" id="main-block-ChangeInfo">
        <div class="userInfo-ChangeInfo">
            <div class="text-RegisterLoginChange">Informacje o profilu:</div>
            <div id="userInfoText-ChangeInfo">Imie: <span><?php echo $imieUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Nazwisko: <span><?php echo $nazwiskoUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Nazwa Użytkownika: <span><?php echo $nazwaUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Adres E-mail: <span><?php echo $adresEmailUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Data urodzenia: <span><?php echo $dataUrodzeniaUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">PESEL: <span><?php echo $PESELUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Adres: <span><?php echo $adresUzytkownika ?></span></div>
            <div id="userInfoText-ChangeInfo">Numer Telefonu: <span><?php echo $nrTelefonuUzytkownika ?></span></div>
        </div>
        <form class="registerForm" action="includes/change_acc_info.php" method="post">
            <div class="text-RegisterLoginChange">Zmiana informacji o profilu</div>
            <div class="textUnderHeader-ChangeInfo">Możesz zmienić dowolną liczbę informacji, nie jest konieczne wypełnianie wszystkich pól</div>
            <input type="text" name="nowe_imie" id="inputBracket" placeholder="Nowe Imię">
            <input type="text" name="nowe_nazwisko" id="inputBracket" placeholder="Nowe Nazwisko">
            <input type="text" name="nowa_nazwa_uzytkownika" id="inputBracket" placeholder="Nowa Nazwa Użytkownika">
            <input type="text" name="nowy_adres_email" id="inputBracket" placeholder="Nowy Adres E-mail">
            <div class="textInsideForm-registerForm">Nowa Data Urodzenia:</div>
            <input type="date" name="nowa_data_urodzenia" id="inputBracket">
            <input type="text" name="nowy_PESEL" id="inputBracket" placeholder="Nowy PESEL">
            <input type="text" name="nowy_adres" id="inputBracket" placeholder="Nowy Adres">
            <input type="text" name="nowy_nr_telefonu" id="inputBracket" placeholder="Nowy Numer Telefonu">
            <input type="submit" name="submit" value="Potwierdź" class="submitButton-form">
            <div class="submitButton-form" id="cancelButton2-form" onclick="location.href='UserMyAccount.php';">Anuluj</div>
        </form>
        <?php
        check_info_change_errors();
        ?>
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>