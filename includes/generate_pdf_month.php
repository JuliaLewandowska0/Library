<?php 
    
    $miesiac = $_POST["miesiac"];

    $date = date("Y-$miesiac-d");
    $year = date("Y-$miesiac");
    $data_koniec_miesiaca = date("Y-m-t", strtotime($date));
    $data_poczatek_miesiaca = date("Y-$miesiac-01");

    require_once 'functions.php';
    $pdo = connect();
    require_once 'statistics_functions.php';
    require_once 'config_session.php';
    require("../fpdf186/fpdf.php");
        
    
    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->cell(80);
    $pdf->cell(30, 10, "Zestawienie $year", 0, 1, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(40, 8, "Data", 1, 0, 'C');
    $pdf->cell(40, 8, "Czytelnicy", 1, 0, 'C');
    $pdf->cell(70, 8, "Wypozyczenia", 1, 0, 'C');
    $pdf->cell(40, 8, "Zwroty", 1, 1, 'C');
    
    $pdf->SetFont('Arial','',12);
    $raporty = templateMonth($data_koniec_miesiaca, $data_poczatek_miesiaca);

    foreach($raporty as $raport)
    {
        $pdf->cell(40, 7, $raport['date'], 1, 0, 'C');
        $pdf->cell(40, 7, $raport['licz_nowe_wypozyczenia'], 1, 0, 'C');
        $pdf->cell(70, 7, $raport['liczba_wszystkich_wyp'], 1, 0, 'C');
        $pdf->cell(40, 7, $raport['liczba_zw'], 1, 1, 'C');
    }

    $pdf->cell(120);
    $pdf->cell(60, 30, "................................................", 0, 1, 'C');
    $pdf->OutPut();    
?>