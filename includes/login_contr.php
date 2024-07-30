<?php

declare(strict_types=1);

function isInputEmpty(string $nazwa_uzytkownika, string $haslo_uzytkownika)
{
    if(empty($nazwa_uzytkownika) || empty($haslo_uzytkownika))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isUsernameWrong(bool|array $result)
{
    if(!$result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isPasswordWrong(string $haslo_uzytkownika, string $hashedPassword)
{
    if(!password_verify($haslo_uzytkownika, $hashedPassword))
    {
        return true;
    }
    else
    {
        return false;
    }
}
