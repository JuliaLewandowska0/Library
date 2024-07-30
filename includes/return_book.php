<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "overDeadline") 
        {
            Swal.fire({
                title: "Zwrot po terminie!",
                text: "Transakcja przebiegła pomyślnie. Książka została zwrócona po terminie.",
                icon: "success",
                confirmButtonText: "Powrót do Strony Głównej",
                }).then((result) => {
                window.location.href="../AdminHomePage.php";
            });
            sessionStorage.removeItem("success");
        }

        if(sessionStorage.getItem("success") === "underDeadline") 
        {
            Swal.fire({
                title: "Zwrot w terminie!",
                text: "Transakcja przebiegła pomyślnie. Książka została zwrócona w terminie.",
                icon: "success",
                confirmButtonText: "Powrót do Strony Głównej",
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
    $ISBN = $_POST["zwrot_ksiazka"];
    $PESEL = $_POST["zwrot_uzytkownik"];

    require_once 'functions.php';
    $pdo = connect();
    require_once 'config_session.php';

    try
    {
        $id_ksiazki = getBookIDRentReturn($ISBN);
        $id_uzytkownika = getUserIDRentReturn($PESEL);

        $termin_oddania = getReturnDeadline($id_uzytkownika, $id_ksiazki);
        $faktyczny_termin_oddania = date('Y-m-d');

        $query = "UPDATE wypozyczenia SET faktyczny_termin_oddania='$faktyczny_termin_oddania'
            WHERE id_ksiazki=$id_ksiazki AND id_uzytkownika=$id_uzytkownika;";

        $errors =[];

        if(empty($ISBN) || empty($PESEL))
        {
            $errors["empty_input"] = "Uzupełnij wszystkie pola!";
        }

        if(getBookStatusRentReturn($ISBN) != 2 && !empty($ISBN))
        {
            $errors["book_taken"] = "Książka nie jest wypożyczona";
        }

        if(!isCombinationCorrect($id_uzytkownika, $id_ksiazki))
        {
            $errors["combination_wrong"] = "Podana książka nie jest wypożyczona przez podanego użytkownika";
        }
        
        if($errors)
        {
            $_SESSION["errors_return_book"] = $errors;

            header("Location: ../AdminReturnBook.php");
            die();
        }

        $query2 = "UPDATE ksiazka SET id_statusu = 1 WHERE id_ksiazki=$id_ksiazki;";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
            
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        if($faktyczny_termin_oddania > $termin_oddania)
        {
            echo '<script>sessionStorage.setItem("success", "overDeadline");</script>';
        }
        else
        {
            echo '<script>sessionStorage.setItem("success", "underDeadline");</script>';
        }

        $pdo = null;
        $stmt = null;
        $stmt2 = null;

        die();
    }
    catch(PDOException $e)
    {
        die("Query failed: " . $e->getMessage());
    };
}
else
{
    header("Location: ../AdminReturnBook.php");
}