<?php require_once 'includes/functions.php' ?>
<?php require_once 'includes/config_session.php' ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Gminna Biblioteka Publiczna w Baboszewie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleMain.css">
	<link rel="stylesheet" href="styleAllBooksLDisplay.css">
	<link rel="icon" type="image/x-icon" href="images/libraryIcon.png">
</head>

<body>
<div class="navbar">
	<div class="logoNavbarFull">
		<img class="logoNavbar" src="images/libraryImage.png" alt="Błąd wczytywania obrazka" />
		<div id="navbarLogoButton" onclick="location.href='UserHomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
		<div id="navbarButtons" onclick="location.href='UserHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='UserAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='UserInstitution.php';">Placówka</div>
		<div id="navbarButtons" onclick="location.href='UserContacts.php';">Kontakt</div>
		<div id="navbarButtons" onclick="location.href='UserMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver2">
    <div class="page">
    <div class="left">
		<div id="filterTextHeader4-AllBooksDisplay">Sortuj wyniki↓</div><!--Sortowanie wyników pod względem jednego zaznaczonego kryterium-->
		<ul class="listFilter-AllBooksDisplay">
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="wyczyscSortowanie" name="sorting" id="wyczyscSortowanie">Wyczyść sortowanie</label>
			</li>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="tytul_ksiazki" name="sorting" id="tytul_ksiazki">Alfabetycznie po tytule książki</label>
			</li>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="imie_nazwisko_autora" name="sorting" id="imie_nazwisko_autora">Alfabetycznie po autorze książki</label>
			</li>
			<div id="filterTextHeader3-AllBooksDisplay">Rok wydania książki</div>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="rok_wydania_ksiazkiDESC" name="sorting" id="rok_wydania_ksiazkiDESC">Od Najnowszej</label>
			</li>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="rok_wydania_ksiazkiASC" name="sorting" id="rok_wydania_ksiazkiASC">Od Najstarszej</label>
			</li>
			<div id="filterTextHeader3-AllBooksDisplay">Ilość stron książki</div>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="ilosc_stron_ksiazkiDESC" name="sorting" id="ilosc_stron_ksiazkiDESC">Od Najdłuższej</label>
			</li>
			<li class="listFilterItem-AllBooksDisplay">
				<label class="formCheckLabel-AllBooksDisplay">
					<input type="radio" class="formCheckInput-AllBooksDisplay product_check" 
					value="ilosc_stron_ksiazkiASC" name="sorting" id="ilosc_stron_ksiazkiASC">Od Najkrótszej</label>
			</li>
		</ul>
	</div>
        <?php
            if(isset($_POST['submitSearchField']))
            {
                $pdo = connect();
                $search = $_POST['searchField']; //Przypisanie wprowadzonego ciągu znaków przez użytkownik do zmiennej
                $length = strlen($search); //Sprawdzenie długości zmiennej

                if($length > 1) //Przypisanie odpowiedniej funkcji do tablicy 'ksiazki' na podstawie długości zmiennej
                {
					$ksiazki = getSearchResultLongL($search);
					$query = getSearchResultLongLQuery($search);
					$_SESSION["search_query"] = $query;
                }
                else
                {
                    $ksiazki = getSearchResultShortL($search);
					$query = getSearchResultShortLQuery($search);
					$_SESSION["search_query"] = $query;
                }

                if(is_array($ksiazki)) //Sprawdzenie czy wynik jest tablicą
                {
                ?>
				<div class="right">
                    <h1 id="headerDisplayBooks-AllBooksDisplay">Wyniki wyszukiwania</h1>
                    <div id="textUnderDisplayHeader-AllBooksDisplay">Kliknij wybraną książkę, aby zobaczyć szczegółowe informacje na jej temat.</div>
					<div class="product-wrapper" id="result">
				<?php
                    foreach ($ksiazki as $ksiazka) //Wyświetlanie wyników wyszukiwania
                    {
                    ?>
                        <div class="product" onclick="details_connection_User_L(<?php echo $ksiazka['id_ksiazki'] ?>)">
                            <div class="left2">
                                <img id="bookCovers" src="<?php echo $ksiazka['okladka'] ?>" alt="brak">
                            </div>
                            <div class="right2">
                                <p class="title"><?php echo $ksiazka['tytul_ksiazki'] ?></p>
                                <p class="author"><?php echo $ksiazka['imie_nazwisko_autora'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
					</div>
                    <div id="returnButton_style5" onclick="location.href='UserAllBooksLDisplay.php';">Wróć do przeglądania</div>
                <?php
                }
                else //Jeśli nie ma wyników (wynik nie jest tablicą), wyświetlana jest wiadomość o ich braku
                {
                ?>  
				<div class="right5">
                    <h1 id="headerDisplayBooks-AllBooksDisplay">Nie znaleziono wyników</h1>
                    <div id="textUnderDisplayHeader-AllBooksDisplay">Niestety nie znaleziono wyników pasujących do kryterium wyszukiwania. Spróbuj ponownie.</div>
                    <div id="returnButton_style5" onclick="location.href='UserAllBooksLDisplay.php';">Wróć do przeglądania</div>
				</div>
				<?php
                }
            }
        ?>
		</div>
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="details_connection.js"></script>
<script src="jquery.js"></script>
<script>
	$(document).ready(function() //Funkcja nasłuchująca zmian w filtrach poprzez zaznaczenie i przesyłająca wyniki do pliku modyfikującego zapytanie SQL
	{
		$(".product_check").click(function()
		{
			var action = 'data';
			var tytul_ksiazki = get_filter_text('tytul_ksiazki');
			var imie_nazwisko_autora = get_filter_text('imie_nazwisko_autora');
			var rok_wydania_ksiazkiDESC = get_filter_text('rok_wydania_ksiazkiDESC');
			var rok_wydania_ksiazkiASC = get_filter_text('rok_wydania_ksiazkiASC');
			var ilosc_stron_ksiazkiDESC = get_filter_text('ilosc_stron_ksiazkiDESC');
			var ilosc_stron_ksiazkiASC = get_filter_text('ilosc_stron_ksiazkiASC');
			
			$.ajax(
			{
				url:'includes/filter_sorting_User_L_Search.php',
				method: 'POST',
				data:{action:action,rok_wydania_ksiazkiDESC:rok_wydania_ksiazkiDESC,
					rok_wydania_ksiazkiASC:rok_wydania_ksiazkiASC,ilosc_stron_ksiazkiDESC:ilosc_stron_ksiazkiDESC,
					ilosc_stron_ksiazkiASC:ilosc_stron_ksiazkiASC,tytul_ksiazki:tytul_ksiazki,
					imie_nazwisko_autora:imie_nazwisko_autora},
				success:function(response)
				{
					$("#result").html(response);
				}
			});	
		});

		function get_filter_text(text_id)
		{
			var filterData = [];
			$('#' + text_id + ':checked').each(function()
			{
				filterData.push($(this).val());
			});
			return filterData;
		}
	});
</script>
</body>
</html>