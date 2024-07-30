<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Hasło zmienione!",
                text: "Hasło zostało pomyślnie zmienione.",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../UserMyAccount.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php 

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $stare_haslo_uzytkownika = $_POST["stare_haslo_uzytkownika"];
        $nowe_haslo_uzytkownika = $_POST["nowe_haslo_uzytkownika"];
        $nowe_haslo_powtorzenie = $_POST["nowe_haslo_powtorzenie"];

        try
        {
            require_once 'getUserInfo_contr.php'; 

            $errors = [];

            if(empty($stare_haslo_uzytkownika) || empty($nowe_haslo_powtorzenie) || empty($nowe_haslo_uzytkownika))
            {
                $errors["empty_input"] = "Uzupełnij wszystkie pola!";
            }

            if(!password_verify($stare_haslo_uzytkownika, $hasloUzytkownika))
            {
                $errors["password_incorrect"] = "Nieprawidłowe hasło!";
            }
            
            if($nowe_haslo_uzytkownika != $nowe_haslo_powtorzenie)
            {
                $errors["passwords_not_matched"] = "Hasła nie są takie same!";
            }
            
            if($errors)
            {
                $_SESSION["errors_change_password"] = $errors;

                header("Location: ../UserChangePassword.php");
                die();
            }

            $pdo = connect();
            $query = "UPDATE uzytkownik SET haslo_uzytkownika = :nowe_haslo_uzytkownika 
            WHERE id_uzytkownika = $idUzytkownika;";

            $stmt = $pdo->prepare($query);

            $options = [
                'cost' => 12
            ];
            $hashedNewPassword = password_hash($nowe_haslo_uzytkownika, PASSWORD_BCRYPT, $options);

            $stmt->bindParam(":nowe_haslo_uzytkownika", $hashedNewPassword);
            $stmt->execute();

            $pdo = null;
            $stmt = null;

            echo '<script>sessionStorage.setItem("success", "true");</script>';
            die();
            
        }
        catch(PDOException $e)
        {
            die("Query failed: " . $e->getMessage());
        }
    }
    else
    {
        header("Location: ../UserChangePassword.php");
        die();
    }