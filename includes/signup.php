<?php

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $imie_uzytkownika = $_POST["imie_uzytkownika"];
        $nazwisko_uzytkownika = $_POST["nazwisko_uzytkownika"];
        $nazwa_uzytkownika = $_POST["nazwa_uzytkownika"];
        $adres_email_uzytkownika = $_POST["adres_email_uzytkownika"];
        $haslo_uzytkownika = $_POST["haslo_uzytkownika"];
        $powtorz_haslo_uzytkownika = $_POST["powtorz_haslo_uzytkownika"];
        $data_urodzenia_uzytkownika = $_POST["data_urodzenia_uzytkownika"];
        $PESEL_uzytkownika = $_POST["PESEL_uzytkownika"];

        try
        {
            require_once 'functions.php';
            $pdo = connect();
            require_once 'signup_model.php';
            require_once 'signup_contr.php';

            $errors = [];

            if(isInputEmpty($imie_uzytkownika, $nazwisko_uzytkownika, $nazwa_uzytkownika, $adres_email_uzytkownika, $haslo_uzytkownika, $data_urodzenia_uzytkownika, $PESEL_uzytkownika))
            {
                $errors["empty_input"] = "Uzupełnij wszystkie pola!";
            }

            if(isEmailInvalid($adres_email_uzytkownika))
            {
                $errors["invalid_email"] = "Nieprawidłowy adres e-mail!";
            }

            if(isUsernameTaken($pdo, $nazwa_uzytkownika))
            {
                $errors["taken_username"] = "Nazwa użytkownika już istnieje!";
            }

            if(isEmailRegistered($pdo, $adres_email_uzytkownika))
            {
                $errors["registered_email"] = "Adres e-mail już zarejestrowany!";
            }

            if($powtorz_haslo_uzytkownika != $haslo_uzytkownika)
            {
                $errors["passwords_not_matched"] = "Hasła nie są takie same!";
            }

            require_once 'config_session.php';

            if($errors)
            {
                $_SESSION["errors_signup"] = $errors;

                $signupData = [
                    "imie_uzytkownika" => $imie_uzytkownika,
                    "nazwisko_uzytkownika" => $nazwisko_uzytkownika,
                    "data_urodzenia_uzytkownika" => $data_urodzenia_uzytkownika,
                    "PESEL_uzytkownika" => $PESEL_uzytkownika,
                    "adres_email_uzytkownika" => $adres_email_uzytkownika,
                    "nazwa_uzytkownika" => $nazwa_uzytkownika
                ];
                $_SESSION["signup_data"] = $signupData;

                header("Location: ../RegisterPage.php");
                die();
            }

            createUser($pdo, $imie_uzytkownika, $nazwisko_uzytkownika, $nazwa_uzytkownika, $adres_email_uzytkownika, $haslo_uzytkownika, $data_urodzenia_uzytkownika, $PESEL_uzytkownika);

            header("Location: ../RegisterPage.php?signup=success");
            
            $pdo = null;
            $stmt = null;

            die();
        }
        catch(PDOException $e)
        {
            die("Query failed: " . $e->getMessage());
        }
    }
    else
    {
        header("Location: ../RegisterPage.php");
        die();
    }