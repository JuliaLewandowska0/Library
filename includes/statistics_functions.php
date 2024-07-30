<?php

require_once 'functions.php';
$pdo = connect();

function displayTopTen()
{
    $pdo = connect();
    $result = $pdo->query("SELECT wypozyczenia.id_ksiazki, COUNT(wypozyczenia.id_ksiazki) AS count, ksiazka.tytul_ksiazki, 
    ksiazka.okladka, ksiazka.ISBN, autor.imie_nazwisko_autora
    FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
    JOIN autor ON ksiazka.id_autora=autor.id_autora GROUP BY wypozyczenia.id_ksiazki ORDER BY count DESC LIMIT 10");
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $ksiazki[] = $row;
    }
    return $ksiazki;
}

function displayBottomFive()
{
    $pdo = connect();
    $result = $pdo->query("SELECT wypozyczenia.id_ksiazki, COUNT(wypozyczenia.id_ksiazki) AS count, ksiazka.tytul_ksiazki, 
    ksiazka.okladka, ksiazka.ISBN, autor.imie_nazwisko_autora
    FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
    JOIN autor ON ksiazka.id_autora=autor.id_autora GROUP BY wypozyczenia.id_ksiazki ORDER BY count ASC LIMIT 5");
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $ksiazki[] = $row;
    }
    return $ksiazki;
}

function displayLatestRentReturn($dzisiejsza_data)
{
    $pdo = connect();
    $data_poczatkowa = new DateTime("$dzisiejsza_data");
    $data_koncowa =  new DateTime("$dzisiejsza_data");
    $data_koncowa->modify('-20 days');
    $data1 = $data_koncowa->format('Y-m-d');
    $data2 = $data_poczatkowa->format('Y-m-d');
    $result = $pdo->query("WITH recursive Date_Ranges AS (SELECT '$data1' as Date 
                            UNION ALL SELECT Date + interval 1 day FROM Date_Ranges WHERE Date < '$data2'),
	                        days AS (SELECT date FROM Date_Ranges)
	                        SELECT d.date, COALESCE(wyp.liczba_wypozyczen, 0) AS liczba_wyp, 
	                        COALESCE(zw.liczba_zwrotow, 0) AS liczba_zw FROM days d
	                        LEFT JOIN (SELECT w.termin_wypozyczenia, COUNT(*) AS liczba_wypozyczen
	                        FROM wypozyczenia w WHERE w.termin_wypozyczenia BETWEEN '$data1' AND '$data2'
	                        GROUP BY w.termin_wypozyczenia) wyp ON (d.date = wyp.termin_wypozyczenia)
	                        LEFT JOIN (SELECT w.faktyczny_termin_oddania, COUNT(*) AS liczba_zwrotow
		                    FROM wypozyczenia w WHERE w.faktyczny_termin_oddania BETWEEN '$data1' AND '$data2'
		                    GROUP BY w.faktyczny_termin_oddania) zw ON (d.date = zw.faktyczny_termin_oddania);");
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $ksiazki[] = $row;
    }
    return $ksiazki;
}

function displayNewRegisteredUsers()
{
    $termin = date('y-m-d',strtotime('-3 month'));
    $pdo = connect();
	$result = "SELECT COUNT(*) FROM uzytkownik WHERE data_utworzenia_konta > '$termin' GROUP BY id_uzytkownika;";
    $resultCheck = $pdo->query($result);
	$count = $resultCheck->rowCount();
	
	return $count;
}

function displayHowManyUsersRent()
{
    $termin = date('y-m-d',strtotime('-2 month'));
    $pdo = connect();
	$result = "SELECT COUNT(*) FROM wypozyczenia WHERE termin_wypozyczenia > '$termin' GROUP BY id_uzytkownika;";
    $resultCheck = $pdo->query($result);
	$count = $resultCheck->rowCount();
	
	return $count;
}

function displayHowManyBooks()//
{
    $termin = date('y-m-d',strtotime('-1 month'));
    $pdo = connect();
	$result = "SELECT COUNT(*) FROM ksiazka WHERE data_dodania_ksiazki > '$termin' GROUP BY id_ksiazki;";
    $resultCheck = $pdo->query($result);
	$count = $resultCheck->rowCount();
	
	return $count;
}

function templateYear($rok_koniec, $rok_poczatek)
{
    $pdo = connect();
    $data_koncowa = new DateTime("$rok_koniec");
    $data_poczatkowa =  new DateTime("$rok_poczatek");
    $data_1 = $data_poczatkowa->format('Y-m-d');
    $data_2 = $data_koncowa->format('Y-m-d');
    $result = $pdo->query("WITH recursive Date_Ranges AS (SELECT '$data_1' AS Date UNION ALL
                            SELECT Date + interval 1 month FROM Date_Ranges WHERE Date < '$data_2'),
                            days AS (SELECT date FROM Date_Ranges),
                            raport_wyp AS (SELECT ROW_NUMBER() OVER (PARTITION BY id_uzytkownika 
                            ORDER BY termin_wypozyczenia) AS ROW_NUM, w.* FROM wypozyczenia w
                            WHERE termin_wypozyczenia BETWEEN '$data_1' AND '$data_2'),
                            raport_wyp_count AS (SELECT DATE_FORMAT(r_wyp.termin_wypozyczenia, '%Y-%m-01') 
                            AS miesiac_termin_wypozyczenia, COUNT(*) AS licz_wyp FROM raport_wyp r_wyp 
                            WHERE r_wyp.row_num = 1 GROUP BY DATE_FORMAT(r_wyp.termin_wypozyczenia, '%Y-%m-01'))
                            SELECT d.date, COALESCE(rwc.licz_wyp , 0) AS licz_nowe_wypozyczenia,
                            COALESCE(wyp.liczba_wypozyczen, 0) AS liczba_wszystkich_wyp, 
                            COALESCE(zw.liczba_zwrotow, 0) AS liczba_zw FROM days d
                            LEFT JOIN raport_wyp_count rwc ON (d.date = rwc.miesiac_termin_wypozyczenia)
                            LEFT JOIN (SELECT DATE_FORMAT(w.termin_wypozyczenia, '%Y-%m-01') 
                            AS miesiac_termin_wypozyczenia, COUNT(*) AS liczba_wypozyczen FROM wypozyczenia w 
                            WHERE w.termin_wypozyczenia BETWEEN '$data_1' AND '$data_2'
                            GROUP BY DATE_FORMAT(w.termin_wypozyczenia, '%Y-%m-01')) wyp 
                            ON (d.date = wyp.miesiac_termin_wypozyczenia)
                            LEFT JOIN (SELECT DATE_FORMAT(w.faktyczny_termin_oddania, '%Y-%m-01') 
                            AS miesiac_faktyczny_termin_oddania, COUNT(*) AS liczba_zwrotow
		                    FROM wypozyczenia w WHERE w.faktyczny_termin_oddania BETWEEN '$data_1' AND '$data_2'
		                    GROUP BY DATE_FORMAT(w.faktyczny_termin_oddania, '%Y-%m-01')) zw 
                            ON (d.date = zw.miesiac_faktyczny_termin_oddania);");
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $ksiazki[] = $row;
    }
    return $ksiazki;
}

function templateMonth($data1, $data2)
{
    $pdo = connect();
    $data_poczatkowa = new DateTime("$data1");
    $data_koncowa =  new DateTime("$data2");
    $data_1 = $data_koncowa->format('Y-m-d');
    $data_2 = $data_poczatkowa->format('Y-m-d');
    $result = $pdo->query("WITH recursive Date_Ranges AS (SELECT '$data_1' AS Date UNION ALL
                            SELECT Date + interval 1 day FROM Date_Ranges WHERE Date < '$data_2'),
                            days AS (SELECT date FROM Date_Ranges),
                            raport_wyp AS (SELECT ROW_NUMBER() OVER (PARTITION BY id_uzytkownika 
                            ORDER BY termin_wypozyczenia) AS ROW_NUM, w.* FROM wypozyczenia w
                            WHERE termin_wypozyczenia BETWEEN '$data_1' AND '$data_2'),
                            raport_wyp_count AS (SELECT r_wyp.termin_wypozyczenia, count(*) AS licz_wyp
                            FROM raport_wyp r_wyp WHERE r_wyp.row_num = 1 GROUP BY r_wyp.termin_wypozyczenia)
                            SELECT d.date, COALESCE(rwc.licz_wyp , 0) AS licz_nowe_wypozyczenia,
                            COALESCE(wyp.liczba_wypozyczen, 0) AS liczba_wszystkich_wyp, 
                            COALESCE(zw.liczba_zwrotow, 0) AS liczba_zw FROM days d
                            LEFT JOIN raport_wyp_count rwc ON (d.date = rwc.termin_wypozyczenia)
                            left join (SELECT w.termin_wypozyczenia, COUNT(*) AS liczba_wypozyczen
                            FROM wypozyczenia w WHERE w.termin_wypozyczenia BETWEEN '$data_1' AND '$data_2'
                            GROUP BY w.termin_wypozyczenia) wyp ON (d.date = wyp.termin_wypozyczenia)
                            LEFT JOIN (SELECT w.faktyczny_termin_oddania, COUNT(*) AS liczba_zwrotow
		                    FROM wypozyczenia w WHERE w.faktyczny_termin_oddania BETWEEN '$data_1' AND '$data_2'
		                    GROUP BY w.faktyczny_termin_oddania) zw ON (d.date = zw.faktyczny_termin_oddania);");
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $ksiazki[] = $row;
    }
    return $ksiazki;
}