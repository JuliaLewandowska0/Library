<?php

    declare(strict_types=1);

    function isInputEmpty(string $imie_uzytkownika, string $nazwisko_uzytkownika, string $nazwa_uzytkownika, string $adres_email_uzytkownika, string $haslo_uzytkownika, $data_urodzenia_uzytkownika, string $PESEL_uzytkownika)
    {
        if(empty($imie_uzytkownika) || empty($nazwisko_uzytkownika) || empty($nazwa_uzytkownika) || empty($adres_email_uzytkownika) || empty($haslo_uzytkownika) || empty($data_urodzenia_uzytkownika) || empty($PESEL_uzytkownika))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function isEmailInvalid(string $adres_email_uzytkownika)
    {
        if(!filter_var($adres_email_uzytkownika, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function isUsernameTaken(object $pdo, string $nazwa_uzytkownika)
    {
        if(getUsername($pdo, $nazwa_uzytkownika))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function isEmailRegistered(object $pdo, string $adres_email_uzytkownika)
    {
        if(getEmail($pdo, $adres_email_uzytkownika))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function createUser(object $pdo, string $imie_uzytkownika, string $nazwisko_uzytkownika, string $nazwa_uzytkownika, string $adres_email_uzytkownika, string $haslo_uzytkownika, $data_urodzenia_uzytkownika, string $PESEL_uzytkownika)
    {
        setUser($pdo, $imie_uzytkownika, $nazwisko_uzytkownika, $nazwa_uzytkownika, $adres_email_uzytkownika, $haslo_uzytkownika, $data_urodzenia_uzytkownika, $PESEL_uzytkownika);
    }