<?php

function czyKsiazkaJestLektura($id)
{
    $pdo = connect();
	$result = $pdo->query("SELECT czy_lektura FROM ksiazka WHERE id_ksiazki=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
        if($row['czy_lektura'] == 1)
        {
            return "Tak";
        }
        else
        {
            return "Nie";
        }
	}
	return '';
}