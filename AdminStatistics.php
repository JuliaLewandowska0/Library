<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/statistics_functions.php'; ?>
<?php 
    $howManyRentUsers = displayHowManyUsersRent();
    $howManyNewUsers = displayNewRegisteredUsers(); 
    $howManyNewBooks = displayHowManyBooks();
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
		<div id="navbarLogoButton">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver3">
<div class="main-block-AdminPanel">
    <div class="mainHeader_Statistics">Statystyki</div>
    <div class="mainHeaderUnder_Statistics">Tutaj znajdują się statystki dotyczące najczęściej wypożyczanych książek, historii wypożyczeń w ciągu ostatnich 20 dni oraz ilości nowych czytelników</div>
    <div class="block1_Statistics">
        <div class="header1_Statistics">TOP 10 Najczęściej wypożyczanych książek</div>
        <div class="product-wrapper">
			<?php
				$ksiazki = displayTopTen();
				foreach ($ksiazki as $ksiazka)
				{
				?>	<div class="product2">
						<div class="left3">
							<img id="bookCovers2" src="<?php echo $ksiazka['okladka'] ?>" alt="brak">
						</div>
						<div class="right2">
							<p class="title2"><?php echo $ksiazka['tytul_ksiazki'] ?></p>
							<p class="author2"><?php echo $ksiazka['imie_nazwisko_autora'] ?></p>
						</div>
					</div>
				<?php
				}
				?>
		</div>
    </div>
    <div class="block2_Statistics">
        <div class="header2_Statistics">Najrzadziej wypożyczane książki</div>
        <div class="product-wrapper">
			<?php
				$books = displayBottomFive();
				foreach ($books as $book)
				{
				?>	<div class="product3">
						<div class="left3">
							<img id="bookCovers2" src="<?php echo $book['okladka'] ?>" alt="brak">
						</div>
						<div class="right2">
							<p class="title2"><?php echo $book['tytul_ksiazki'] ?></p>
							<p class="author2"><?php echo $book['imie_nazwisko_autora'] ?></p>
						</div>
					</div>
				<?php
				}
				?>
		</div>
    </div>
    <div class="headerMain2_Statistics">Transakcje i książki</div>
    <div class="header3_Statistics">Wypożyczenia i zwroty w ciągu ostatnich 20 dni</div>
	<div id="product-wrapper">
        <?php
            $pdo = connect();
			$dzisiejsza_data = date('Y-m-d');
            $transakcje = displayLatestRentReturn($dzisiejsza_data);
        ?>
            <table class="contentTable-Statistics">
                <tr class="tableColumnNames-Statistics">
                    <th class="tableColumn-Statistics" id="column15-Modify">Data</th>
                    <th class="tableColumn-Statistics" id="column16-Modify">Ilość wypożyczeń</th>
                    <th class="tableColumn-Statistics" id="column17-Modify">Ilość zwrotów</th>
                </tr>
            <?php
            foreach ($transakcje as $transakcja) //Wyświetlanie wyników wyszukiwania
            {
            ?>
                <tr>
                    <td id="tableRow-Statistics"><?php echo $transakcja['date'] ?></td>
                    <td id="tableRow-Statistics"><?php echo $transakcja['liczba_wyp'] ?></td>
                    <td id="tableRow-Statistics"><?php echo $transakcja['liczba_zw'] ?></td>
                </tr>
            <?php
            }
            ?>
            </table>   
    </div>
    <div class="header4_Statistics">Ilość nowych książek dodanych w ciągu ostatniego miesiąca: <span><?php echo $howManyNewBooks ?></span></div>
    <div class="headerMain3_Statistics">Czytelnicy</div>
    <div class="header4_Statistics">Ilość nowo zarejestrowanych użytkowników w ciągu ostatnich 3 miesięcy: <span><?php echo $howManyNewUsers ?></span></div>
    <div class="header5_Statistics">Ilość czytelników wypożyczających książki w ciągu ostatnich 2 miesięcy: <span><?php echo $howManyRentUsers ?></span></div>
</div>
</div>

<?php require_once 'includes/footer.php' ?>
</body>
</html>