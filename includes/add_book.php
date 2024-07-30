<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Dodano!",
                text: "Rekord został pomyślnie dodany do bazy.",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../AdminPanel.php";
            });
            sessionStorage.removeItem("success");
        }

        if(sessionStorage.getItem("success") === "false") 
        {
            Swal.fire({
                title: "Błąd!",
                text: "Wystąpił błąd podczas dodawania rekordu. Uzupełnij wszystkie potrzebne dane",
                icon: "error",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../AdminAddBook.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ISBN = $_POST["ISBN"];
    $tytul_ksiazki = $_POST["tytul_ksiazki"];
    $rok_wydania_ksiazki = $_POST["rok_wydania_ksiazki"];
    $imie_nazwisko_autora = $_POST["imie_nazwisko_autora"];
    $wydawnictwo_ksiazki = $_POST["wydawnictwo_ksiazki"];
    $ilosc_stron_ksiazki = $_POST["ilosc_stron_ksiazki"];
    $opis_ksiazki = $_POST["opis_ksiazki"];
    $czy_lektura = $_POST["czy_lektura"];
    $okladka = $_POST["okladka"];
    $nazwa_gatunku = $_POST["nazwa_gatunku"];
    $id_statusu = $_POST["nazwa_statusu"];
    $jezyk_org_ksiazki = $_POST["jezyk_org_ksiazki"];

    require_once 'functions.php';
    $pdo = connect();
    require_once 'config_session.php';

    $id_gatunku = getGenreID($nazwa_gatunku);

    if(empty($_POST["tlumacz_ksiazki"]))
    {
        $tlumacz_ksiazki = NULL;
    }

    if(!empty($_POST["tlumacz_ksiazki"]))
    {
        $tlumacz_ksiazki = $_POST["tlumacz_ksiazki"];
    }

    if($czy_lektura === "Tak")
    {
        $czy_lektura_final = 1;
    }
    else
    {
        $czy_lektura_final = 0;
    }

    try
    {
        $query = "INSERT INTO ksiazka (tytul_ksiazki, rok_wydania_ksiazki, wydawnictwo_ksiazki, 
        ilosc_stron_ksiazki, id_gatunku, opis_ksiazki, id_autora, id_statusu, czy_lektura, okladka,
        tlumacz_ksiazki, jezyk_org_ksiazki, ISBN)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        if(empty($ISBN) || empty($tytul_ksiazki) || empty($rok_wydania_ksiazki) || empty($wydawnictwo_ksiazki) || empty($ilosc_stron_ksiazki) || empty($nazwa_gatunku) || empty($opis_ksiazki) || empty($imie_nazwisko_autora) || empty($id_statusu) || empty($czy_lektura) || empty($okladka) || empty($jezyk_org_ksiazki))
        {
            $newBookData = [
                "ISBN" => $ISBN,
                "tytul_ksiazki" => $tytul_ksiazki,
                "rok_wydania_ksiazki" => $rok_wydania_ksiazki,
                "imie_nazwisko_autora" => $imie_nazwisko_autora,
                "wydawnictwo_ksiazki" => $wydawnictwo_ksiazki,
                "ilosc_stron_ksiazki" => $ilosc_stron_ksiazki,
                "opis_ksiazki" => $opis_ksiazki,
                "okladka" => $okladka,
                "jezyk_org_ksiazki" => $jezyk_org_ksiazki,
                "tlumacz_ksiazki" => $tlumacz_ksiazki
            ];
            $_SESSION["new_book_data"] = $newBookData;

            echo '<script>sessionStorage.setItem("success", "false");</script>'; 
            die();
        }
        
        if(!getAuthorName($imie_nazwisko_autora))
        {
            $query2 = "INSERT INTO autor (imie_nazwisko_autora)
            VALUES (?);";
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$imie_nazwisko_autora]);
        }

        $id_autora = getAuthorID($imie_nazwisko_autora);
            
        $stmt = $pdo->prepare($query);
        $stmt->execute([$tytul_ksiazki, $rok_wydania_ksiazki, $wydawnictwo_ksiazki, 
            $ilosc_stron_ksiazki, $id_gatunku, $opis_ksiazki, $id_autora, 
            $id_statusu, $czy_lektura_final, $okladka, $tlumacz_ksiazki, $jezyk_org_ksiazki, $ISBN]);

        echo '<script>sessionStorage.setItem("success", "true");</script>'; 
        
        $pdo = null;
        $stmt = null;
        $stmt2 = null;

        die();
    }
    catch(PDOException $e)
    {
        die("Query failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../AdminAddBook.php");
}