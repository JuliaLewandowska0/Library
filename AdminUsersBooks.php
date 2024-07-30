<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php
$ID_User_To_Rent = $_SESSION["ID_User_To_Rent"];
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
<h1 id="headerDisplayBooks-FavouriteModify">Książki użytkownika: <span><?php echo $_SESSION["Name_User_To_Rent"]; echo " "; echo $_SESSION["Surname_User_To_Rent"]; ?></span></h1>
<?php 
    $ksiazki = displayUsersBooksAdmin($ID_User_To_Rent);
    if(is_array($ksiazki))
    {
?>
        <div id="text2UnderDisplayHeader-FavouriteModify">Kliknij przycisk "Zwrot" aby dokonać zwrotu wybranej książki.</div>
        <div id="product-wrapper">
            <table class="contentTable-FavouriteModify">
                <tr class="tableColumnNames-FavouriteModify">
                    <th class="tableColumn-FavouriteModify" id="column1-Modify">Podgląd</th>
                    <th class="tableColumn-FavouriteModify" id="column2-Modify">Tytuł</th>
                    <th class="tableColumn-FavouriteModify" id="column3-Modify">Autor</th>
                    <th class="tableColumn-FavouriteModify" id="column4-Modify">Termin wypożyczenia</th>
                    <th class="tableColumn-FavouriteModify" id="column5-Modify">Termin oddania</th>
                    <th class="tableColumn-FavouriteModify" id="column6-Modify">Zwrot</th>
                </tr>
            <?php
            foreach ($ksiazki as $ksiazka)
            {
            ?>
                <tr>
                <td id="tableRowCover-FavouriteModify"><img id="bookCovers-FavouriteModify" src="<?php echo $ksiazka['okladka'] ?>" alt="brak"></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['tytul_ksiazki'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['imie_nazwisko_autora'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['termin_wypozyczenia'] ?></td>
                    <td id="tableRow-FavouriteModify"><?php echo $ksiazka['termin_oddania'] ?></td>
                    <td id="tableRow-FavouriteModify"><button class="tableButton-FavouriteModify" id="tableButton4-FavouriteModify" onclick="returnFunctionContr(<?php echo $ksiazka['id_ksiazki'] ?>)">Zwrot</button></td>
                </tr>
            <?php
            }
            ?>
            </table> 
            <div id="returnButton-FavouriteModify" onclick="location.href='AdminAccountsDetails.php';">Wróć do profilu użytkownika</div>
        </div>
    <?php 
    }
    else
    {
    ?>
        <div id="textUnderDisplayHeader-FavouriteModify">Brak wyników.</div>
        <div id="text2UnderDisplayHeader-FavouriteModify">Podany użytkownik nie ma jeszcze żadnych aktualnie wypożczonych książek.</div>
        <div id="returnButton-FavouriteModify" onclick="location.href='AdminAccountsDetails.php';">Wróć do profilu użytkownika</div>
    <?php
    }
    ?>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script>
    function returnFunctionContr(idbook) 
    {
        Swal.fire({
            title: "Czy na pewno chcesz dokonać zwrotu wybranej książki?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3EC562",
            cancelButtonColor: "#C53831",
            confirmButtonText: "Zwróć",
            cancelButtonText: "Anuluj"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="includes/return_from_user.php?idbook=" + idbook;
            }
        });
    }
</script>
</body>
</html>