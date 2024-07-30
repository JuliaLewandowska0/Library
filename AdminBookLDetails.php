<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php

if(isset($_POST['id_ksiazki'])) 
{
    $idb = $_POST['id_ksiazki'];
    $bookTitle = getTitle($idb);
	$bookISBN = getISBN($idb);
	$_SESSION["Book_Title_To_Rent"] = $bookTitle;
	$_SESSION["Book_ISBN_To_Rent"] = $bookISBN;
	$bookAuthor = getAuthor($idb);
	$bookYear = getYear($idb);
	$bookPublisher = getPublisher($idb);
	$bookPageQuantity = getPageQuantity($idb);
	$bookGenre = getGenre($idb);
	$bookDescription = getDescription($idb);
	$bookCover = getCover($idb);
	$bookBirthDate = getBirthDate($idb);
	$bookStatus = getStatus($idb);
	$bookTranslator = getTranslator($idb);
	$bookOrgLanguage = getOrgLanguage($idb);
	
	echo json_encode([
        'title' => $bookTitle,
        'author' => $bookAuthor,
		'year' => $bookYear,
		'publisher' => $bookPublisher,
		'pages' => $bookPageQuantity,
		'genre' => $bookGenre,
		'description' => $bookDescription,
		'cover' => $bookCover,
		'birthday' => $bookBirthDate,
		'status' => $bookStatus,
		'translator' => $bookTranslator,
		'language' => $bookOrgLanguage
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
	<div class="main-block-BookDetails">
		<img id="book_cover-BookDetails" src="bookcover" alt="Błąd wczytywania obrazka" />
		<div class="right-side-BookDetails">
			<div id="book_title-BookDetails">Book Title - Loading</div>
			<div id="book_author-BookDetails">Book Author - Loading</div>
			<div id="book_birthday-BookDetails">Book Birthday - Loading</div>
			<div id="book_genre-BookDetails">Book Genre - Loading</div>
			<div id="book_publisher-BookDetails">Book Publisher - Loading</div>
			<div id="book_year-BookDetails">Book Year - Loading</div>
			<div id="book_pages-BookDetails">Book Pages - Loading</div>
			<div id="book_translator-BookDetails">Book Translator - Loading</div>
			<div id="book_orglanguage-BookDetails">Book Original Language - Loading</div>
		</div>
		<div class="description-BookDetails">
			<div id="description-text-BookDetails">Opis:</div>
			<div id="book_description-BookDetails">Book Description - Loading</div>	
		</div>
	</div>
	<div id="book_status-BookDetails">Status: </div>
	<div class="returnButton_style3" onclick="location.href='AdminAvailableBooksL.php';">Wróć do przeglądania</div>
	<div class="returnButton_style3" id="add_to_favorite_rent-BookDetails" onclick="location.href='AdminRentBook.php';">Wypożycz➥</div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>
<script>
    $(document).ready(function() 
	{
        let id_ksiazki = localStorage.getItem("idksiazki");

        $.ajax(
		{
            type: "POST",
            url: 'AdminBookLDetails.php',
			dataType: 'json',
            data: { id_ksiazki: id_ksiazki },
            success: function(response) 
			{
                $("#book_title-BookDetails").text(response.title);
				$("#book_author-BookDetails").text(response.author);
				$("#book_year-BookDetails").text("Rok wydania: " + response.year);
				$("#book_publisher-BookDetails").text("Wydawnictwo: " + response.publisher);
				$("#book_pages-BookDetails").text("Ilość stron: " + response.pages);
				$("#book_genre-BookDetails").text("Gatunek: " + response.genre);
				$("#book_translator-BookDetails").text("Tłumaczenie: " + response.translator);
				$("#book_orglanguage-BookDetails").text("Język oryginału: " + response.language);
				$("#book_description-BookDetails").text(response.description);
				$("#book_cover-BookDetails").attr("src",response.cover);
				$("#book_birthday-BookDetails").text("Data urodzenia autora: " + response.birthday);
				$("#book_status-BookDetails").text("Status: " + response.status);
            }
        });
    });
</script>
</body>
</html>