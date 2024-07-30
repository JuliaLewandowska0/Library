<?php

declare(strict_types=1);

function signupInput()
{
    //Jeśli użytkownik wprowadził imię, ale wystąpiły błędy, imię będzie wypełnione po powrocie na stronę rejestracji
    if(isset($_SESSION["signup_data"]["imie_uzytkownika"]))
    {
        echo '<input type="text" name="imie_uzytkownika" id="inputBracket" placeholder="Imię" value="'. $_SESSION["signup_data"]["imie_uzytkownika"] .'">';
        unset($_SESSION["signup_data"]["imie_uzytkownika"]);
    }
    else
    {
        echo '<input type="text" name="imie_uzytkownika" id="inputBracket" placeholder="Imię">';
    }

    //Jeśli użytkownik wprowadził nazwisko, ale wystąpiły błędy, nazwisko będzie wypełnione po powrocie na stronę rejestracji
    if(isset($_SESSION["signup_data"]["nazwisko_uzytkownika"]))
    {
        echo '<input type="text" name="nazwisko_uzytkownika" id="inputBracket" placeholder="Nazwisko" value="'. $_SESSION["signup_data"]["nazwisko_uzytkownika"] .'">';
        unset($_SESSION["signup_data"]["nazwisko_uzytkownika"]);
    }
    else
    {
        echo '<input type="text" name="nazwisko_uzytkownika" id="inputBracket" placeholder="Nazwisko">';
    }

    //Jeśli użytkownik wprowadził nazwę użytkownika, ale wystąpiły błędy niezwiązane z tą nazwą, będzie ona wypełniona po powrocie na stronę rejestracji
    if(isset($_SESSION["signup_data"]["nazwa_uzytkownika"]) && !isset($_SESSION["errors_signup"]["taken_username"]))
    {
        echo '<input type="text" name="nazwa_uzytkownika" id="inputBracket" placeholder="Nazwa użytkownika" value="'. $_SESSION["signup_data"]["nazwa_uzytkownika"] .'">';
        unset($_SESSION["signup_data"]["nazwa_uzytkownika"]);
    }
    else
    {
        echo '<input type="text" name="nazwa_uzytkownika" id="inputBracket" placeholder="Nazwa użytkownika">';
    }

    //Jeśli użytkownik wprowadził e-mail, ale wystąpiły błędy niezwiązane z nim, będzie on wypełniony po powrocie na stronę rejestracji
    if(isset($_SESSION["signup_data"]["adres_email_uzytkownika"]) && !isset($_SESSION["errors_signup"]["registered_email"]) && !isset($_SESSION["errors_signup"]["invalid_email"]))
    {
        echo '<input type="text" name="adres_email_uzytkownika" id="inputBracket" placeholder="Adres E-mail" value="'. $_SESSION["signup_data"]["adres_email_uzytkownika"] .'">';
        unset($_SESSION["signup_data"]["adres_email_uzytkownika"]);
    }
    else
    {
        echo '<input type="text" name="adres_email_uzytkownika" id="inputBracket" placeholder="Adres E-mail">';
    }

    echo '<input type="password" name="haslo_uzytkownika" id="inputBracket" placeholder="Hasło">';
    echo '<input type="password" name="powtorz_haslo_uzytkownika" id="inputBracket" placeholder="Powtórz hasło">';
    echo '<div class="textInsideForm-RegisterPage">Data urodzenia:</div>';
    echo '<input type="date" name="data_urodzenia_uzytkownika" id="inputBracket">';

    //Jeśli użytkownik wprowadził PESEL, ale wystąpiły błędy, PESEL będzie wypełniony po powrocie na stronę rejestracji
    if(isset($_SESSION["signup_data"]["PESEL_uzytkownika"]))
    {
        echo '<input type="text" name="PESEL_uzytkownika" id="inputBracket" placeholder="PESEL" value="'. $_SESSION["signup_data"]["PESEL_uzytkownika"] .'">';
        unset($_SESSION["signup_data"]["PESEL_uzytkownika"]);
    }
    else
    {
        echo '<input type="text" name="PESEL_uzytkownika" id="inputBracket" placeholder="PESEL">';
    }
}

function check_signup_errors()
{
    if(isset($_SESSION['errors_signup']))
    {
        $errors = $_SESSION['errors_signup'];

        echo "<br";

        foreach($errors as $error)
        {
            echo '<p class="formErrors">'. $error .'</p>';
        }

        unset($_SESSION['errors_signup']);
    }
    else if(isset($_GET["signup"]) && $_GET["signup"] === "success")
    {
        echo "<br";
        echo '<p class="formSuccess">Rejestracja przebiegła pomyślnie!</p>';
    }
}