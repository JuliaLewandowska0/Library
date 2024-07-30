<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/add_book_view.php'; ?>

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
		<form action="includes/add_book.php" method="post">
			<div class="text-RegisterLoginChange" id="headerText-AddBook">Dodawanie nowej książki do bazy danych</div>
			<div id="textUnderHeader-AddBook">Uwaga! Wymagane jest wypełnienie wszystkich poniższych pól, jeśli nie są one opisane jako nieobowiązkowe.</div>
            <?php
				newBookInput();
			?>
            <input type="submit" name="submit" value="Dodaj książkę" class="submitButton-form" id="submitButton-AddBook">
			<div class="submitButton-form" id="cancelButton-AddBook" onclick="location.href='AdminPanel.php';">Anuluj</div>
        </form>
	</div>
</div>

<?php require_once 'includes/footer.php' ?>
<script src="jquery.js"></script>
</body>
</html>