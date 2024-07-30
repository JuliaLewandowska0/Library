<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/config_session.php'; ?>
<?php require_once 'includes/return_book_view.php'; ?>

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
	<div class="text-RegisterLoginChange">Zwrot książki</div>
    <br>
    <form action="includes/return_book.php" method="post">
        <select class="selectBracket-RentReturn" id="searchddl" name="zwrot_ksiazka">
			<option value="">--Wybierz książkę--</option>
		    <?php 
            $ksiazki = getBookTitleReturn();
            foreach ($ksiazki as $ksiazka)
		    {
		    ?>
			    <option value="<?php echo $ksiazka['ISBN'] ?>"><?php echo $ksiazka['ISBN']." ".$ksiazka['tytul_ksiazki'] ?></option>
		    <?php
		    }
		    ?>
		</select>
        <br>
        <br>
		<div id="populate">
        <select class="selectBracket-RentReturn" id="searchddl2" name="zwrot_uzytkownik" disabled>
			<option value="">--Użytkownik--</option>
		</select>
		</div>
        <input type="submit" name="submit" value="Zwróć książkę" class="submitButton-form" id="submitButton-RentReturn">
		<div class="submitButton-form" id="cancelButton-RentReturn" onclick="location.href='AdminHomePage.php';">Anuluj i wróć do Strony Głównej</div>
    </form>
    <?php
        check_return_book_errors();
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
<script>
	$(document).ready(function(){
		$('#searchddl').change(function(){
			var isbn1 = $(this).val();

			$.ajax({
				url: "includes/return_book_select.php",
				type: "POST",
				data: {ISBN:isbn1},
				success: function(data)
				{
					$('#populate').html(data);
				}
			});
		});
	});
</script>
</body>
</html>