<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/functions.php'; ?>

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
		<div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver1">
<div class="main-block-DocTemplate">
    <div class="text-RegisterLoginChange">Generowanie szablonów dokumentów</div>
    <form action="includes/generate_pdf_month.php" target="_blank" method="post">
        <select class="selectBracket-RentReturn" name="miesiac" id="choseBracket-DocTemplate">
			<option value="">--Wybierz miesiąc bieżącego roku--</option>
			<option value="01">Styczeń</option>
			<option value="02">Luty</option>
			<option value="03">Marzec</option>
			<option value="04">Kwiecień</option>
			<option value="05">Maj</option>
			<option value="06">Czerwiec</option>
			<option value="07">Lipiec</option>
			<option value="08">Sierpień</option>
			<option value="09">Wrzesień</option>
			<option value="10">Październik</option>
			<option value="11">Listopad</option>
			<option value="12">Grudzień</option>
		</select>
        <input type="submit" name="submit" value="Generuj zestawienie miesięczne" class="submitButton-form" id="submitButton-DocTemplate">
    </form>
    <br>
    <form action="includes/generate_pdf_year.php" target="_blank" method="post">
        <?php  
            $biezacy_rok = new DateTime('Y');
            $rok_wstecz = new DateTime('Y');
            $rok_wstecz->modify('-1 year');
            $biezacy_rok1 = $biezacy_rok->format('Y');
            $rok_wstecz1 = $rok_wstecz->format('Y');
        ?>
        <select class="selectBracket-RentReturn" name="rok" id="choseBracket-DocTemplate">
			<option value="">--Wybierz rok--</option>
			<option value="<?php echo $biezacy_rok1?>"><?php echo $biezacy_rok1?></option>
			<option value="<?php echo $rok_wstecz1 ?>"><?php echo $rok_wstecz1 ?></option>
		</select>
        <input type="submit" name="submit" value="Generuj zestawienie roczne" class="submitButton-form" id="submitButton-DocTemplate">
    </form>
    <br>
    <div class="submitButton-form" id="cancelButton-RentReturn" onclick="location.href='AdminHomePage.php';">Anuluj i wróć do Strony Głównej</div>
</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>