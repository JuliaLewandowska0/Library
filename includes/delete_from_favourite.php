<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Usunięto!",
                text: "Książka została pomyślnie usunięta z listy ulubionych.",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../UserFavouriteDisplay.php";
            });
            sessionStorage.removeItem("success");
        }

        if(sessionStorage.getItem("success") === "false") 
        {
            Swal.fire({
                title: "Błąd!",
                text: "Wystąpił błąd podczas usuwania książki. Spróbuj ponownie",
                icon: "error",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../UserFavouriteDisplay.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php

require 'getUserInfo_contr.php'; 
$pdo = connect();
$idbook = $_GET['idbook'];

$query = "DELETE FROM ulubione WHERE id_ksiazki=$idbook AND id_uzytkownika=$idUzytkownika;";
$stmt = $pdo->prepare($query);
$stmt->execute();

echo '<script>sessionStorage.setItem("success", "true");</script>'; 

$pdo = null;
$stmt = null;
die();
	