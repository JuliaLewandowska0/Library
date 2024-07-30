<?php

declare(strict_types=1);

function getUsername(object $pdo, string $nazwa_uzytkownika)
{
    $query = "SELECT nazwa_uzytkownika FROM uzytkownik WHERE nazwa_uzytkownika = :nazwa_uzytkownika;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nazwa_uzytkownika", $nazwa_uzytkownika);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getEmail(object $pdo, string $adres_email_uzytkownika)
{
    $query = "SELECT adres_email_uzytkownika FROM uzytkownik WHERE adres_email_uzytkownika = :adres_email_uzytkownika;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":adres_email_uzytkownika", $adres_email_uzytkownika);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
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