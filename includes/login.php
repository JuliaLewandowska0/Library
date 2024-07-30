<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nazwa_uzytkownika = $_POST["nazwa_uzytkownika"];
        $haslo_uzytkownika = $_POST["haslo_uzytkownika"];
    
        try
        {
            require_once 'functions.php';
            $pdo = connect();
            require_once 'login_model.php';
            require_once 'login_contr.php';
        
            $errors = [];

            if(isInputEmpty($nazwa_uzytkownika, $haslo_uzytkownika))
            {
                $errors["empty_input"] = "Uzupełnij wszystkie pola!";
            }

            $result = getUser($pdo, $nazwa_uzytkownika);

            if(isUsernameWrong($result))
            {
                $errors["login_incorrect"] = "Nieprawidłowa Nazwa Użytkownika lub Hasło!";
            }

            if(!isUsernameWrong($result) && isPasswordWrong($haslo_uzytkownika, $result["haslo_uzytkownika"]))
            {
                $errors["login_incorrect"] = "Nieprawidłowa Nazwa Użytkownika lub Hasło!";
            }

            require_once 'config_session.php';

            if($errors)
            {
                $_SESSION["errors_login"] = $errors;

                header("Location: ../LoginPage.php");
                die();
            }

            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["id_uzytkownika"];
            session_id($sessionId);

            $_SESSION["uzytkownik_id"] = $result["id_uzytkownika"];
            $_SESSION["uzytkownik_nazwa"] = htmlspecialchars($result["nazwa_uzytkownika"]);

            $_SESSION["last_regeneration"] = time();

            if($result["id_uprawnienia"] == 2)
            {
                header("Location: ../UserHomePage.php");
            }
            else if($result["id_uprawnienia"] == 1)
            {
                header("Location: ../AdminHomePage.php");
            }

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
        header("Location: ../LoginPage.php");
        die();
    }