<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Dodano do ulubionych!",
                text: "Książka została pomyślnie dodana do listy ulubionych",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../UserBookDetails.php";
            });
            sessionStorage.removeItem("success");
        }

        if(sessionStorage.getItem("success") === "false") 
        {
            Swal.fire({
                title: "Książka już należy do ulubionych!",
                text: "Wybrana książka już znajduje się na liście ulubionych",
                icon: "info",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../UserBookDetails.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php

    require 'getUserInfo_contr.php'; 
    $pdo = connect();
    $idb = $_SESSION['idKsiazki'];

    function checkIfAlreadyFavourite($idUzytkownika, $idb)
    {
        $pdo = connect();
	    $result = $pdo->query("SELECT * FROM ulubione WHERE id_ksiazki=$idb AND id_uzytkownika=$idUzytkownika;");
	    if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	    {
		    return true;
	    }
        else
        {
            return false;
        }
    }
  
    if(!checkIfAlreadyFavourite($idUzytkownika, $idb))
    {
        $query = "INSERT INTO ulubione (id_uzytkownika, id_ksiazki)
        VALUES (?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idUzytkownika, $idb]);

        echo '<script>sessionStorage.setItem("success", "true");</script>'; 
        $pdo = null;
        $stmt = null;

        die();
    }
    else
    {
        echo '<script>sessionStorage.setItem("success", "false");</script>'; 
        $pdo = null;
        die();
    }
?>

