<?php 

declare(strict_types=1);

function getUser(object $pdo, string $nazwa_uzytkownika)
{
    $query = "SELECT * FROM uzytkownik WHERE nazwa_uzytkownika = :nazwa_uzytkownika;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nazwa_uzytkownika", $nazwa_uzytkownika);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}