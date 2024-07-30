<?php 
    
    $rok = $_POST["rok"];

    $data_koniec_roku = date("$rok-12");
    $data_poczatek_roku = date("$rok-01");

    require_once 'functions.php';
    $pdo = connect();
    require_once 'statistics_functions.php';
    require_once 'config_session.php';
    require("../fpdf186/fpdf.php");
        
    
    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->cell(80);
    $pdf->cell(30, 10, "Zestawienie roku $rok", 0, 1, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(40, 8, "Miesiac", 1, 0, 'C');
    $pdf->cell(40, 8, "Czytelnicy", 1, 0, 'C');
    $pdf->cell(70, 8, "Wypozyczenia", 1, 0, 'C');
    $pdf->cell(40, 8, "Zwroty", 1, 1, 'C');
    
    $pdf->SetFont('Arial','',12);
    $raporty = templateYear($data_koniec_roku, $data_poczatek_roku);

    foreach($raporty as $raport)
    {
        $month = date('m', strtotime($raport['date']));
        $pdf->cell(40, 8, $month, 1, 0, 'C');
        $pdf->cell(40, 8, $raport['licz_nowe_wypozyczenia'], 1, 0, 'C');
        $pdf->cell(70, 8, $raport['liczba_wszystkich_wyp'], 1, 0, 'C');
        $pdf->cell(40, 8, $raport['liczba_zw'], 1, 1, 'C');
    }

    $pdf->cell(120);
    $pdf->cell(60, 30, "................................................", 0, 1, 'C');
    $pdf->OutPut();    
?>