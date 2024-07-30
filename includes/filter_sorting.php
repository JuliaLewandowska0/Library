<?php
    include 'functions.php';
    $pdo = connect();

    if(isset($_POST['action'])) //Sprawdzenie czy został zaznaczony przycisk sortowania/filtrowania
    {
        $sql = "SELECT tytul_ksiazki, imie_nazwisko_autora, nazwa_gatunku, id_ksiazki, okladka 
        FROM ksiazka 
        JOIN autor ON ksiazka.id_autora=autor.id_autora 
        JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku
        WHERE tytul_ksiazki !=''";

        $sql_2 = "SELECT COUNT(*)
        FROM ksiazka 
        JOIN autor ON ksiazka.id_autora=autor.id_autora 
        JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku
        WHERE tytul_ksiazki !=''";

        if(isset($_POST['nazwa_gatunku'])) //Dodanie filtrowania po nazwie gatunku do zapytania SQL
        {
            $nazwa_gatunku = implode("','",$_POST['nazwa_gatunku']);
            $sql .= "AND nazwa_gatunku IN('".$nazwa_gatunku."')";
            $sql_2 .= "AND nazwa_gatunku IN('".$nazwa_gatunku."')";
        }

        if(isset($_POST['tytul_ksiazki'])) //Dodanie sortowania po tytule do zapytania SQL
        {
            $sql .= "ORDER BY tytul_ksiazki";
            $sql_2 .= "ORDER BY tytul_ksiazki";
        }

        if(isset($_POST['imie_nazwisko_autora'])) //Dodanie sortowania po imieniu autora do zapytania SQL
        {
            $sql .= "ORDER BY imie_nazwisko_autora";
            $sql_2 .= "ORDER BY imie_nazwisko_autora";
        }

        if(isset($_POST['rok_wydania_ksiazkiDESC'])) //Dodanie sortowania po roku wydania malejąco do zapytania SQL
        {
            $sql .= "ORDER BY rok_wydania_ksiazki DESC";
            $sql_2 .= "ORDER BY rok_wydania_ksiazki DESC";
        }

        if(isset($_POST['rok_wydania_ksiazkiASC'])) //Dodanie sortowania po roku wydania rosnąco do zapytania SQL
        {
            $sql .= "ORDER BY rok_wydania_ksiazki ASC";
            $sql_2 .= "ORDER BY rok_wydania_ksiazki ASC";
        }

        if(isset($_POST['ilosc_stron_ksiazkiDESC'])) //Dodanie sortowania po ilości stron malejąco do zapytania SQL
        {
            $sql .= "ORDER BY ilosc_stron_ksiazki DESC";
            $sql_2 .= "ORDER BY ilosc_stron_ksiazki DESC";
        }

        if(isset($_POST['ilosc_stron_ksiazkiASC'])) //Dodanie sortowania po ilości stron rosnąco do zapytania SQL
        {
            $sql .= "ORDER BY ilosc_stron_ksiazki ASC";
            $sql_2 .= "ORDER BY ilosc_stron_ksiazki ASC";
        }

        $result = $pdo->query($sql);
        $resultCheck = $pdo->query($sql_2);
        $count = $resultCheck->fetchColumn(); //Zmienna przechowująca ilość wierszy wynikowych z zapytania SQL
        $output = '';

        if($count>0)
        {
            while($row=$result->fetch(PDO::FETCH_ASSOC)) //Wyświetlenie danych po filtrach i sortowaniu
            {
                $output .= '<div class="product" onclick="details_connection_NoLogin('.$row['id_ksiazki'].')">
                <div class="left2">
                    <img id="bookCovers" src="'.$row['okladka'].'" alt="brak">
                </div>
                <div class="right2">
                    <p class="title">'.$row['tytul_ksiazki'].'</p>
                    <p class="author">'.$row['imie_nazwisko_autora'].'</p>
                </div>
            </div>';
            }
        }
        else
        {
            $output = "<h3>No Products Found!</h3>";
        }
        echo $output;
    }