<?php
    include 'functions.php';
    require 'config_session.php';
    $pdo = connect();

    if(isset($_POST['action'])) //Sprawdzenie czy został zaznaczony przycisk sortowania/filtrowania
    {

        $sql = $_SESSION["search_query"];

        if(isset($_POST['tytul_ksiazki'])) //Dodanie sortowania po tytule do zapytania SQL
        {
            $sql .= "ORDER BY tytul_ksiazki";
        }

        if(isset($_POST['imie_nazwisko_autora'])) //Dodanie sortowania po imieniu autora do zapytania SQL
        {
            $sql .= "ORDER BY imie_nazwisko_autora";
        }

        if(isset($_POST['rok_wydania_ksiazkiDESC'])) //Dodanie sortowania po roku wydania malejąco do zapytania SQL
        {
            $sql .= "ORDER BY rok_wydania_ksiazki DESC";
        }

        if(isset($_POST['rok_wydania_ksiazkiASC'])) //Dodanie sortowania po roku wydania rosnąco do zapytania SQL
        {
            $sql .= "ORDER BY rok_wydania_ksiazki ASC";
        }

        if(isset($_POST['ilosc_stron_ksiazkiDESC'])) //Dodanie sortowania po ilości stron malejąco do zapytania SQL
        {
            $sql .= "ORDER BY ilosc_stron_ksiazki DESC";
        }

        if(isset($_POST['ilosc_stron_ksiazkiASC'])) //Dodanie sortowania po ilości stron rosnąco do zapytania SQL
        {
            $sql .= "ORDER BY ilosc_stron_ksiazki ASC";
        }

        $result = $pdo->query($sql);
        $output = '';

        while($row=$result->fetch(PDO::FETCH_ASSOC)) //Wyświetlenie danych po filtrach i sortowaniu
        {
                $output .= '<div class="product" onclick="details_connection_Admin_L('.$row['id_ksiazki'].')">
                <div class="left2">
                    <img id="bookCovers" src="'.$row['okladka'].'" alt="brak">
                </div>
                <div class="right2">
                    <p class="title">'.$row['tytul_ksiazki'].'</p>
                    <p class="author">'.$row['imie_nazwisko_autora'].'</p>
                </div>
            </div>';
        }
        
        echo $output;
    }