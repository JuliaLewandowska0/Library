<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/rent_book_view.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Gminna Biblioteka Publiczna w Baboszewie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleMain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
	<link rel="icon" type="image/x-icon" href="images/libraryIcon.png">
</head>

<body>
<div class="main-content-ver1">
	<div class="main-block-RentReturn">
    <br>
	<div class="text-RegisterLoginChange">Wypożyczenie książki</div>
	<br>
    <form action="includes/rent_book.php" method="post">
			<?php display_book_content(); ?>
        <br>
        <br>
        	<?php display_user_content(); ?>
        <br>
        <input type="submit" name="submit" value="Wypożycz książkę" class="submitButton-form" id="submitButton-RentReturn">
		<div class="submitButton-form" id="cancelButton-RentReturn" onclick="location.href='AdminHomePage.php';">Anuluj i wróć do Strony Głównej</div>
    </form>
    <?php
        check_rent_book_errors();
    ?>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
    $("#searchddl").chosen();
    $("#searchddl2").chosen();
</script>
</body>
</html>