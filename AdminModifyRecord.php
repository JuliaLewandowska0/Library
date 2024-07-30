<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/modify_record_functions.php'; ?>
<?php 
    $idbook = $_GET['idbook'];
    $tytul_ksiazki_modify = getTitle($idbook);
    $ISBN_modify = getISBN($idbook);
    $autor_ksiazki_modify = getAuthor($idbook);
    $rok_wydania_ksiazki_modify = getYear($idbook);
    $wydawnictwo_ksiazki_modify = getPublisher($idbook);
    $jezyk_org_ksiazki_modify = getOrgLanguage($idbook);
    $tlumacz_ksiazki_modify = getTranslator($idbook);
    $ilosc_stron_ksiazki_modify = getPageQuantity($idbook);
    $nazwa_gatunku_modify = getGenre($idbook);
    $opis_ksiazki_modify = getDescription($idbook);
    $okladka_modify = getCover($idbook);
    $czy_jest_lektura_modify = czyKsiazkaJestLektura($idbook);
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
	<div class="main-block-RegisterLoginChange" id="main-block-ChangeInfo">
        <div class="userInfo-ChangeInfo">
            <div class="text-RegisterLoginChange">Informacje o książce:</div>
            <div id="userInfoText2-ChangeInfo">Tytuł książki: <span><?php echo $tytul_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Autor książki: <span><?php echo $autor_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">ISBN: <span><?php echo $ISBN_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Rok wydania: <span><?php echo $rok_wydania_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Wydawnictwo: <span><?php echo $wydawnictwo_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Język oryginału: <span><?php echo $jezyk_org_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Tłumacz książki: <span><?php echo $tlumacz_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Ilość stron: <span><?php echo $ilosc_stron_ksiazki_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Nazwa gatunku: <span><?php echo $nazwa_gatunku_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Czy książka jest lekturą: <span><?php echo $czy_jest_lektura_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Ścieżka do okładki: <span><?php echo $okladka_modify ?></span></div>
            <div id="userInfoText2-ChangeInfo">Opis książki: <span><?php echo $opis_ksiazki_modify ?></span></div>
        </div>
        <form class="registerForm" action=<?php echo "includes/modify_record.php?idbook=$idbook" ?> method="post">
            <div class="text-RegisterLoginChange">Zmiana informacji o książce</div>
            <div class="textUnderHeader-ChangeInfo">Możesz zmienić dowolną liczbę informacji, nie jest konieczne wypełnianie wszystkich pól</div>
            <input type="text" name="nowy_tytul" id="inputBracket3-AddBook" placeholder="Zmień Tytuł">
            <input type="text" name="nowy_ISBN" id="inputBracket3-AddBook" placeholder="Zmień ISBN">
            <input type="text" name="nowy_autor" id="inputBracket3-AddBook" placeholder="Zmień Autora">
            <input type="text" name="nowy_rok_wydania" id="inputBracket3-AddBook" placeholder="Zmień Rok Wydania">
            <input type="text" name="nowe_wydawnictwo" id="inputBracket3-AddBook" placeholder="Zmień Wydawnictwo">
            <input type="text" name="nowy_jezyk_oryginalu" id="inputBracket3-AddBook" placeholder="Zmień Język Oryginału">
            <input type="text" name="nowy_tlumacz" id="inputBracket3-AddBook" placeholder="Zmień Tłumacza Książki">
            <input type="text" name="nowa_ilosc_stron" id="inputBracket3-AddBook" placeholder="Zmień Ilość Stron">
            <label id="textInsideForm2-AddBook">Zmień Gatunek Książki: </label>
            <select class="filterBar" name="nowa_nazwa_gatunku" id="choseBracket-AddBook">
			    <option value="">--Wybierz--</option>
			    <option value="Fantasy">Fantasy</option>
			    <option value="Science-Fiction">Science-Fiction</option>
			    <option value="Romans">Romans</option>
			    <option value="Historyczny">Historyczny</option>
			    <option value="Horror">Horror</option>
			    <option value="Kryminał">Kryminał</option>
			    <option value="Thriller">Thriller</option>
			    <option value="Biografia">Biografia</option>
			    <option value="Reportaż">Reportaż</option>
			    <option value="Dla młodzieży">Dla młodzieży</option>
			    <option value="Dla dzieci">Dla dzieci</option>
			    <option value="Kucharska">Kucharska</option>
			    <option value="Poradnik">Poradnik</option>
			    <option value="Psychologiczny">Psychologiczny</option>
			    <option value="Dramat">Dramat</option>
		    </select>
            <label id="textInsideForm2-AddBook">Czy Książka Jest Lekturą?</label>
            <select class="filterBar" name="nowe_czy_lektura" id="choseBracket-AddBook">
			    <option value="">--Wybierz--</option>
			    <option value="1">Tak</option>
			    <option value="0">Nie</option>
		    </select>
            <input type="text" name="nowa_sciezka_do_okladki" id="inputBracket3-AddBook" placeholder="Zmień Ścieżkę do Okładki">
            <label id="textInsideForm2-AddBook">Zmień Opis Książki: </label>
		    <textarea id="inputBracket2-AddBook" name="nowy_opis_ksiazki" rows="14" cols="50" placeholder="Wprowadź opis książki..."></textarea>
            <input type="submit" name="submit" value="Potwierdź" class="submitButton-form">
            <div class="submitButton-form" id="cancelButton2-form" onclick="location.href='AdminModifyDatabase.php';">Anuluj</div>
        </form>
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>