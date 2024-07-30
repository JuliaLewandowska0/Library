<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("success") === "true") 
        {
            Swal.fire({
                title: "Informacja zmieniona!",
                text: "Pomyślnie zmieniono informacje o książce.",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../AdminModifyDatabase.php";
            });
            sessionStorage.removeItem("success");
        }
    });
</script>
<?php 

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $idbook = $_GET['idbook'];
        $nowy_tytul = $_POST["nowy_tytul"];
        $nowy_ISBN = $_POST["nowy_ISBN"];
        $nowy_autor = $_POST["nowy_autor"];
        $nowy_rok_wydania = $_POST["nowy_rok_wydania"];
        $nowe_wydawnictwo = $_POST["nowe_wydawnictwo"];
        $nowy_jezyk_oryginalu = $_POST["nowy_jezyk_oryginalu"];
        $nowy_tlumacz = $_POST["nowy_tlumacz"];
        $nowa_ilosc_stron = $_POST["nowa_ilosc_stron"];
        $nowa_nazwa_gatunku = $_POST["nowa_nazwa_gatunku"];
        $nowe_czy_lektura = $_POST["nowe_czy_lektura"];
        $nowa_sciezka_do_okladki = $_POST["nowa_sciezka_do_okladki"];
        $nowy_opis_ksiazki = $_POST["nowy_opis_ksiazki"];

        require_once 'functions.php';
        $pdo = connect();
        require_once 'config_session.php';

        $nowe_id_gatunku = getGenreID($nowa_nazwa_gatunku);

        if(!getAuthorName($nowy_autor))
        {
            $query = "INSERT INTO autor (imie_nazwisko_autora)
            VALUES (?);";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$nowy_autor]);
        }

        $nowe_id_autora = getAuthorID($nowy_autor);

        try
        {
            if(!empty($nowy_tytul))
            {
                $query1 = "UPDATE ksiazka SET tytul_ksiazki = :nowy_tytul
                        WHERE id_ksiazki = $idbook;";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->bindParam(":nowy_tytul", $nowy_tytul);
                $stmt1->execute();
            }

            if(!empty($nowy_ISBN))
            {
                $query2 = "UPDATE ksiazka SET ISBN = :nowy_ISBN
                        WHERE id_ksiazki = $idbook;";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->bindParam(":nowy_ISBN", $nowy_ISBN);
                $stmt2->execute();
            }

            if(!empty($nowy_autor))
            {
                $query3 = "UPDATE ksiazka SET id_autora = :nowe_id_autora 
                        WHERE id_ksiazki = $idbook;";
                $stmt3 = $pdo->prepare($query3);
                $stmt3->bindParam(":nowe_id_autora", $nowe_id_autora);
                $stmt3->execute();
            }

            if(!empty($nowy_rok_wydania))
            {
                $query4 = "UPDATE ksiazka SET rok_wydania_ksiazki = :nowy_rok_wydania
                        WHERE id_ksiazki = $idbook;";
                $stmt4 = $pdo->prepare($query4);
                $stmt4->bindParam(":nowy_rok_wydania", $nowy_rok_wydania);
                $stmt4->execute();
            }

            if(!empty($nowe_wydawnictwo))
            {
                $query5 = "UPDATE ksiazka SET wydawnictwo_ksiazki = :nowe_wydawnictwo 
                        WHERE id_ksiazki = $idbook;";
                $stmt5 = $pdo->prepare($query5);
                $stmt5->bindParam(":nowe_wydawnictwo", $nowe_wydawnictwo);
                $stmt5->execute();
            }

            if(!empty($nowy_jezyk_oryginalu))
            {
                $query6 = "UPDATE ksiazka SET jezyk_org_ksiazki = :nowy_jezyk_oryginalu
                        WHERE id_ksiazki = $idbook;";
                $stmt6 = $pdo->prepare($query6);
                $stmt6->bindParam(":nowy_jezyk_oryginalu", $nowy_jezyk_oryginalu);
                $stmt6->execute();
            }

            if(!empty($nowy_tlumacz))
            {
                $query7 = "UPDATE ksiazka SET tlumacz_ksiazki = :nowy_tlumacz
                        WHERE id_ksiazki = $idbook;";
                $stmt7 = $pdo->prepare($query7);
                $stmt7->bindParam(":nowy_tlumacz", $nowy_tlumacz);
                $stmt7->execute();
            }

            if(!empty($nowa_ilosc_stron))
            {
                $query8 = "UPDATE ksiazka SET ilosc_stron_ksiazki = :nowa_ilosc_stron
                        WHERE id_ksiazki = $idbook;";
                $stmt8 = $pdo->prepare($query8);
                $stmt8->bindParam(":nowa_ilosc_stron", $nowa_ilosc_stron);
                $stmt8->execute();
            }

            if(!empty($nowe_id_gatunku))
            {
                $query9 = "UPDATE ksiazka SET id_gatunku = :nowe_id_gatunku
                        WHERE id_ksiazki = $idbook;";
                $stmt9 = $pdo->prepare($query9);
                $stmt9->bindParam(":nowe_id_gatunku", $nowe_id_gatunku);
                $stmt9->execute();
            }

            if(!empty($nowe_czy_lektura))
            {
                $query10 = "UPDATE ksiazka SET czy_lektura = :nowe_czy_lektura
                        WHERE id_ksiazki = $idbook;";
                $stmt10 = $pdo->prepare($query10);
                $stmt10->bindParam(":nowe_czy_lektura", $nowe_czy_lektura);
                $stmt10->execute();
            }

            if(!empty($nowa_sciezka_do_okladki))
            {
                $query11 = "UPDATE ksiazka SET okladka = :nowa_sciezka_do_okladki
                        WHERE id_ksiazki = $idbook;";
                $stmt11 = $pdo->prepare($query11);
                $stmt11->bindParam(":nowa_sciezka_do_okladki", $nowa_sciezka_do_okladki);
                $stmt11->execute();
            }

            if(!empty($nowy_opis_ksiazki))
            {
                $query12 = "UPDATE ksiazka SET opis_ksiazki = :nowy_opis_ksiazki
                        WHERE id_ksiazki = $idbook;";
                $stmt12 = $pdo->prepare($query12);
                $stmt12->bindParam(":nowy_opis_ksiazki", $nowy_opis_ksiazki);
                $stmt12->execute();
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
            $stmt9 = null;
            $stmt10 = null;
            $stmt11 = null;
            $stmt12 = null;
            $stmt = null;

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
        header("Location: ../AdminModifyDatabase.php");
        die();
    }