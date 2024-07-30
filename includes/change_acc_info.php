<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Informacje zmienione!",
                text: "Pomyślnie zmieniono informacje o profilu.",
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
        $nowe_imie = $_POST["nowe_imie"];
        $nowe_nazwisko = $_POST["nowe_nazwisko"];
        $nowa_nazwa_uzytkownika = $_POST["nowa_nazwa_uzytkownika"];
        $nowy_adres_email = $_POST["nowy_adres_email"];
        $nowa_data_urodzenia = $_POST["nowa_data_urodzenia"];
        $nowy_PESEL = $_POST["nowy_PESEL"];
        $length1 = strlen($nowy_PESEL);
        $nowy_adres = $_POST["nowy_adres"];
        $nowy_nr_telefonu = $_POST["nowy_nr_telefonu"];
        $length2 = strlen($nowy_nr_telefonu);

        try
        {
            require_once 'getUserInfo_contr.php'; 
            $pdo = connect();
            require_once 'change_acc_info_functions.php';

            $errors = [];

            if(isEmailInvalid($nowy_adres_email) && !empty($nowy_adres_email))
            {
                $errors["email_invalid"] = "Niepoprawny adres e-mail!";
            }

            if(isUsernameTaken($pdo, $nowa_nazwa_uzytkownika) && !empty($nowa_nazwa_uzytkownika))
            {
                $errors["username_taken"] = "Nazwa użytkownika jest zajęta!";
            }

            if(isEmailRegistered($pdo, $nowy_adres_email) && !empty($nowy_adres_email))
            {
                $errors["email_taken"] = "Adres e-mail już zarejestrowany!";
            }

            if($length1 != 11 && !empty($nowy_PESEL))
            {
                $errors["invalid_pesel"] = "Nieprawidłowy PESEL!";
            }

            if($length2 != 9 && !empty($nowy_nr_telefonu))
            {
                $errors["invalid_phone_number"] = "Nieprawidłowy numer telefonu!";
            }

            if($errors)
            {
                $_SESSION["errors_change_acc_info"] = $errors;

                header("Location: ../UserChangeAccountInfo.php");
                die();
            }

            if(!empty($nowe_imie))
            {
                $query1 = "UPDATE uzytkownik SET imie_uzytkownika = :nowe_imie
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->bindParam(":nowe_imie", $nowe_imie);
                $stmt1->execute();
            }

            if(!empty($nowe_nazwisko))
            {
                $query2 = "UPDATE uzytkownik SET nazwisko_uzytkownika = :nowe_nazwisko 
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->bindParam(":nowe_nazwisko", $nowe_nazwisko);
                $stmt2->execute();
            }

            if(!empty($nowa_nazwa_uzytkownika))
            {
                $query3 = "UPDATE uzytkownik SET nazwa_uzytkownika = :nowa_nazwa_uzytkownika
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt3 = $pdo->prepare($query3);
                $stmt3->bindParam(":nowa_nazwa_uzytkownika", $nowa_nazwa_uzytkownika);
                $stmt3->execute();
            }

            if(!empty($nowy_adres_email))
            {
                $query4 = "UPDATE uzytkownik SET adres_email_uzytkownika = :nowy_adres_email 
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt4 = $pdo->prepare($query4);
                $stmt4->bindParam(":nowy_adres_email", $nowy_adres_email);
                $stmt4->execute();
            }

            if(!empty($nowa_data_urodzenia))
            {
                $query5 = "UPDATE uzytkownik SET data_urodzenia_uzytkownika = :nowa_data_urodzenia
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt5 = $pdo->prepare($query5);
                $stmt5->bindParam(":nowa_data_urodzenia", $nowa_data_urodzenia);
                $stmt5->execute();
            }

            if(!empty($nowy_PESEL))
            {
                $query6 = "UPDATE uzytkownik SET PESEL_uzytkownika = :nowy_PESEL
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt6 = $pdo->prepare($query6);
                $stmt6->bindParam(":nowy_PESEL", $nowy_PESEL);
                $stmt6->execute();
            }

            if(!empty($nowy_adres))
            {
                $query7 = "UPDATE uzytkownik SET adres_uzytkownika = :nowy_adres
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt7 = $pdo->prepare($query7);
                $stmt7->bindParam(":nowy_adres", $nowy_adres);
                $stmt7->execute();
            }

            if(!empty($nowy_nr_telefonu))
            {
                $query8 = "UPDATE uzytkownik SET nr_telefonu_uzytkownika = :nowy_nr_telefonu
                        WHERE id_uzytkownika = $idUzytkownika;";
                $stmt8 = $pdo->prepare($query8);
                $stmt8->bindParam(":nowy_nr_telefonu", $nowy_nr_telefonu);
                $stmt8->execute();
            }

            $pdo = null;
            $stmt1 = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            $stmt5 = null;
            $stmt6 = null;
            $stmt7 = null;
            $stmt8 = null;

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
        header("Location: ../UserChangeAccountInfo.php");
        die();
    }