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

    function setUser(object $pdo, string $imie_uzytkownika, string $nazwisko_uzytkownika, string $nazwa_uzytkownika, string $adres_email_uzytkownika, string $haslo_uzytkownika, $data_urodzenia_uzytkownika, string $PESEL_uzytkownika)
    {
        $query = "INSERT INTO uzytkownik(imie_uzytkownika, nazwisko_uzytkownika, data_urodzenia_uzytkownika, PESEL_uzytkownika, adres_uzytkownika, nr_telefonu_uzytkownika, adres_email_uzytkownika, nazwa_uzytkownika, haslo_uzytkownika, id_uprawnienia)
        VALUES (:imie_uzytkownika, :nazwisko_uzytkownika, :data_urodzenia_uzytkownika, :PESEL_uzytkownika, NULL, NULL, :adres_email_uzytkownika, :nazwa_uzytkownika, :haslo_uzytkownika, 2);";
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12
        ];
        $hashedPassword = password_hash($haslo_uzytkownika, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":imie_uzytkownika", $imie_uzytkownika);
        $stmt->bindParam(":nazwisko_uzytkownika", $nazwisko_uzytkownika);
        $stmt->bindParam(":data_urodzenia_uzytkownika", $data_urodzenia_uzytkownika);
        $stmt->bindParam(":PESEL_uzytkownika", $PESEL_uzytkownika);
        $stmt->bindParam(":adres_email_uzytkownika", $adres_email_uzytkownika);
        $stmt->bindParam(":nazwa_uzytkownika", $nazwa_uzytkownika);
        $stmt->bindParam(":haslo_uzytkownika", $hashedPassword);
        $stmt->execute();
    }