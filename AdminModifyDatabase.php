<?php require_once 'includes/functions.php' ?>
<?php require_once 'includes/change_acc_info_view.php' ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Gminna Biblioteka Publiczna w Baboszewie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleMain.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="icon" type="image/x-icon" href="images/libraryIcon.png">
</head>

<body>
<div class="navbar">
	<div class="logoNavbarFull">
		<img class="logoNavbar" src="images/libraryImage.png" alt="Błąd wczytywania obrazka" />
		<div id="navbarLogoButton" onclick="location.href='HomePage.php';">Gminna Biblioteka Publiczna w Baboszewie</div>
	</div>
	<div class="navbarMain">
        <div id="navbarButtons" onclick="location.href='AdminHomePage.php';">Strona Główna</div>
		<div id="navbarButtons" onclick="location.href='AdminAllBooksDisplay.php';">Katalog On-line</div>
		<div id="navbarButtons" onclick="location.href='AdminPanel.php';">Panel administratora</div>
		<div id="navbarButtons" onclick="location.href='AdminMyAccount.php';">Mój profil</div>
	</div>
</div>

<div class="main-content-ver2">
    <h1 id="headerDisplayBooks-FavouriteModify">Baza danych książek</h1>
    <div id="textUnderDisplayHeader-FavouriteModify">Kliknij przycisk "Modyfikuj" aby zmienić informacje na temat książki.</div>
    <div id="text2UnderDisplayHeader-FavouriteModify">Kliknij przycisk "Usuń" aby usunąć książkę z bazy danych.</div>
    <input id="liveSearch-ModifyDatabase" type="text" name="searchField" placeholder="Wyszukaj tytuł, autora, gatunek, rok wydania lub wydawnictwo">
    <div id="product-wrapper">
        <?php
            $pdo = connect();
            $ksiazki = getAllBooks();
        ?>
            <table class="contentTable-FavouriteModify">
                <tr class="tableColumnNames-FavouriteModify">
                    <th class="tableColumn-FavouriteModify" id="column1-Modify">ISBN</th>
                    <th class="tableColumn-FavouriteModify" id="column2-Modify">Tytuł</th>
                    <th class="tableColumn-FavouriteModify" id="column3-Modify">Autor</th>
                    <th class="tableColumn-FavouriteModify" id="column4-Modify">Gatunek</th>
                    <th class="tableColumn-FavouriteModify" id="column5-Modify">Rok wydania</th>
                    <th class="tableColumn-FavouriteModify" id="column6-Modify">Wydawnictwo</th>
                    <th class="tableColumn-FavouriteModify" id="column7-Modify">Ilość stron</th>
                    <th class="tableColumn-FavouriteModify" id="column8-Modify">Modyfikuj</th>
                    <th class="tableColumn-FavouriteModify" id="column9-Modify">Usuń</th>
                </tr>
            <?php
            foreach ($ksiazki as $ksiazka) //Wyświetlanie wyników wyszukiwania
            {
            ?>
                <tr>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['ISBN'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['tytul_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_nazwisko_autora'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['nazwa_gatunku'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['rok_wydania_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['wydawnictwo_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['ilosc_stron_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><div class="tableButton-FavouriteModify" id="tableButton2-FavouriteModify" onclick=<?php echo "location.href='AdminModifyRecord.php?idbook=$ksiazka[id_ksiazki]';" ?>>Modyfikuj</div></td>
                    <td id="tableRow-FavouriteModify"><button class="tableButton-FavouriteModify" id="tableButton3-FavouriteModify" onclick="deleteFunctionContr(<?php echo $ksiazka['id_ksiazki'] ?>)">Usuń</button></td>
                </tr>
            <?php
            }
            ?>
            </table>   
    </div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="details_connection.js"></script>
<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    $(document).ready(function()
    {
        $("#liveSearch-ModifyDatabase").keyup(function()
        {
            var input = $(this).val();

            $.ajax(
            {
                url:"includes/live_search.php",
                method:"POST",
                data:{input:input},
                success:function(data)
                {
                    $("#product-wrapper").html(data);
                }
            })
        })
    })

</script>
<script>
    function deleteFunctionContr(idbook) 
    {
        Swal.fire({
            title: "Czy na pewno chcesz usunąć ten rekord?",
            text: "Tej operacji nie da się cofnąć!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3EC562",
            cancelButtonColor: "#C53831",
            confirmButtonText: "Usuń",
            cancelButtonText: "Anuluj"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="includes/delete_book.php?idbook=" + idbook;
            }
        });
    }
</script>  
</body>
</html>