<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Wypożyczono książkę!",
                text: "Transakcja przebiegła pomyślnie.",
                icon: "success",
                confirmButtonText: "Powrót na Stronę Główną",
                }).then((result) => {
                window.location.href="../AdminHomePage.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ISBN_ksiazki = $_POST["wypozycz_ksiazka"];
    $PESEL_uzytkownika = $_POST["wypozycz_uzytkownik"];

    require_once 'functions.php';
    $pdo = connect();
    require_once 'config_session.php';

    try
    {
        $id_ksiazki = getBookIDRentReturn($ISBN_ksiazki);
        $id_uzytkownika = getUserIDRentReturn($PESEL_uzytkownika);
        $termin_oddania = date('y-m-d',strtotime('+1 month'));

        $query = "INSERT INTO wypozyczenia (id_ksiazki, id_uzytkownika, termin_oddania)
        VALUES (?, ?, ?);";

        $errors =[];

        if(empty($ISBN_ksiazki) || empty($PESEL_uzytkownika))
        {
            $errors["empty_input"] = "Uzupełnij wszystkie pola!";
        }

        if(getBookStatusRentReturn($ISBN_ksiazki) != 1 && !empty($ISBN_ksiazki))
        {
            $errors["book_taken"] = "Książka nie jest dostępna";
        }
        
        if($errors)
        {
            $_SESSION["errors_rent_book"] = $errors;

            header("Location: ../AdminRentBook.php");
            die();
        }

        $query2 = "UPDATE ksiazka SET id_statusu = 2 WHERE id_ksiazki = $id_ksiazki;";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
            
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id_ksiazki, $id_uzytkownika, $termin_oddania]);

        echo '<script>sessionStorage.setItem("success", "true");</script>';
        
        $pdo = null;
        $stmt = null;
        $stmt2 = null;

        die();
    }
    catch(PDOException $e)
    {
        die("Query failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../AdminRentBook.php");
}