<?php

require 'functions.php';


function getFirstNameCurrentUser($id)
{
    $pdo = connect();
	$result = $pdo->query("SELECT imie_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['imie_uzytkownika'];
	}
	
}

function getLastNameCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT nazwisko_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['nazwisko_uzytkownika'];
	}
	return '';
}

function getBirthDateCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT data_urodzenia_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['data_urodzenia_uzytkownika'];
	}
	return '';
}

function getPESELCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT PESEL_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['PESEL_uzytkownika'];
	}
	return '';
}

function getAddressCurrentUser($id)
{
    $pdo = connect();
	$result = $pdo->query("SELECT adres_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		if($row['adres_uzytkownika'] == null)
		{
			return '-';
		}
		else
		{
			return $row['adres_uzytkownika'];
		}
	}
	return '';
}

function getPhoneNumberCurrentUser($id)
{
    $pdo = connect();
	$result = $pdo->query("SELECT nr_telefonu_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		if($row['nr_telefonu_uzytkownika'] == null)
		{
			return '-';
		}
		else
		{
			return $row['nr_telefonu_uzytkownika'];
		}
	}
	return '';
}

function getEmailAddressCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT adres_email_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['adres_email_uzytkownika'];
	}
	return '';
}

function getUsernameCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['nazwa_uzytkownika'];
	}
	return '';
}

function getPasswordCurrentUser($id)
{
    $pdo = connect();
    $result = $pdo->query("SELECT haslo_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['haslo_uzytkownika'];
	}
	return '';
}

function getUserTypeCurrentUser($id)
{
    $pdo = connect();
    $result1 = $pdo->query("SELECT id_uprawnienia FROM uzytkownik WHERE id_uzytkownika=$id;");
	if($row = $result1->fetch(PDO::FETCH_ASSOC)) 
	{
		$idUprawnienia = $row['id_uprawnienia'];
	}
	
    $result2 = $pdo->query("SELECT nazwa_uprawnienia FROM uprawnienia WHERE id_uprawnienia=$idUprawnienia;");
	if($row = $result2->fetch(PDO::FETCH_ASSOC)) 
	{
		return $row['nazwa_uprawnienia'];
	}
	return '';
}