<?php require_once 'includes/getUserInfo_contr.php' ?>

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
<input id="liveSearch-BooksArchive" type="text" name="searchField" placeholder="Wyszukaj tytuł lub autora">
    <div id="product-wrapper">
        <?php
            $pdo = connect();
            $ksiazki = displayUserBooksArchive($idUzytkownika);
                
            if(is_array($ksiazki)) //Sprawdzenie czy wynik jest tablicą
            {
            ?>
                <h1 id="headerDisplayBooks-FavouriteModify2">Historia wypożyczonych przez Ciebie książek</h1>
                <div id="textUnderDisplayHeader-FavouriteModify">Tutaj możesz sprawdzić historię swoich wypożyczych książek.</div>
                <div id="text2UnderDisplayHeader-FavouriteModify">Jeśli chcesz zobaczyć szczegóły książki, przejdź do Katalogu On-Line i wyszukaj wybraną pozycję.</div>
                <table class="contentTable-FavouriteModify">
                    <tr class="tableColumnNames-FavouriteModify">
                        <th class="tableColumn-FavouriteModify" id="column10-Modify">Podgląd</th>
                        <th class="tableColumn-FavouriteModify" id="column11-Modify">Tytuł Książki</th>
                        <th class="tableColumn-FavouriteModify" id="column12-Modify">Autor</th>
                        <th class="tableColumn-FavouriteModify" id="column13-Modify">Data Wypożyczenia</th>
                        <th class="tableColumn-FavouriteModify" id="column14-Modify">Data Oddania</th>
                    </tr>
            <?php
                foreach ($ksiazki as $ksiazka) //Wyświetlanie wyników wyszukiwania
                {
                ?>
                    <tr>
                        <td id="tableRowCover-FavouriteModify"><img id="bookCovers-FavouriteModify" src="<?php echo $ksiazka['okladka'] ?>" alt="brak"></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['tytul_ksiazki'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_nazwisko_autora'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['termin_wypozyczenia'] ?></td>
                        <td id="tableRow-FavouriteModify"><?php echo $ksiazka['faktyczny_termin_oddania'] ?></td>
                    </tr>
                <?php
                }
                ?>
                </table>
                <div id="returnButton-FavouriteModify" onclick="location.href='UserMyBooks.php';">Powrót do Wypożyczonych Książek</div>
            <?php
            }
            else //Jeśli nie ma wyników (wynik nie jest tablicą), wyświetlana jest wiadomość o ich braku
            {
            ?>  
                <h1 id="headerDisplayBooks-FavouriteModify">Nie masz jeszcze książek w swojej historii!</h1>
                <div id="textUnderDisplayHeader-FavouriteModify">Tutaj pojawią się książki, które zostały przez Ciebie wypożyczone oraz oddane. Po więcej informacji, przejdź na Stronę Główną i kliknij "Dowiedz się, jak wygląda proces wypożyczania książek".</div>
                <div id="returnButton-FavouriteModify" onclick="location.href='UserMyBooks.php';">Powrót do Wypożyczonych Książek</div>
            <?php
            }
            ?>
    </div>
</div>

<?php require_once 'includes/footer.php'?>
<script src="jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function()
    {
        $("#liveSearch-BooksArchive").keyup(function()
        {
            var input = $(this).val();

            //if(input != "")
            //{
                $.ajax(
                {
                    url:"includes/live_search_user_books.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data)
                    {
                        $("#product-wrapper").html(data);
                    }
                })
            //}
        })
    })

</script>
</body>
</html>
