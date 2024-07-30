<?php
	function connect() //Połączenie do bazy danych
	{
		$host = 'localhost';
		$dbusername = 'root';
		$dbpassword = '';
		$dbname = 'biblioteka';
		
		try
		{
			$pdo = new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} 
		catch(PDOException $e)
		{
			die("Conection failed: " . $e->getMessage());
		}
	}

	function getAllBooks() /* funkcja wyświetlająca wszystkie książki */
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ksiazka.ISBN, ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, gatunek.nazwa_gatunku, ksiazka.id_ksiazki, ksiazka.rok_wydania_ksiazki, ksiazka.wydawnictwo_ksiazki, ksiazka.ilosc_stron_ksiazki FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku ORDER BY ksiazka.id_ksiazki;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$ksiazki[] = $row;
		}
		return $ksiazki;
	}

	function getAllAccounts() //Funkcja wyświetlająca wszystkie profile użytkowników
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_uzytkownika, imie_uzytkownika, nazwisko_uzytkownika, nazwa_uzytkownika FROM uzytkownik JOIN uprawnienia ON uzytkownik.id_uprawnienia=uprawnienia.id_uprawnienia WHERE nazwa_uprawnienia='Użytkownik' ORDER BY nazwisko_uzytkownika;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$profile[] = $row;
		}
		return $profile;
	}
	
	function getTitle($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['tytul_ksiazki'];
		}
		return '';
	}

	function getISBN($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ISBN FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['ISBN'];
		}
		return '';
	}
	
	function getAuthor($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT imie_nazwisko_autora FROM autor JOIN ksiazka ON autor.id_autora=ksiazka.id_autora WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['imie_nazwisko_autora'];
		}
		return '';
	}
	
	function getYear($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT rok_wydania_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['rok_wydania_ksiazki'];
		}
		return '';
	}
	
	function getPublisher($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT wydawnictwo_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['wydawnictwo_ksiazki'];
		}
		return '';
	}

	function getOrgLanguage($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT jezyk_org_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['jezyk_org_ksiazki'];
		}
		return '';
	}

	function getTranslator($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tlumacz_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			if($row['tlumacz_ksiazki'] == null)
			{
				return '-';
			}
			else
			{
				return $row['tlumacz_ksiazki'];
			}
		}
		return '';
	}
	
	function getPageQuantity($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ilosc_stron_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['ilosc_stron_ksiazki'];
		}
		return '';
	}
	
	function getGenre($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT nazwa_gatunku FROM gatunek JOIN ksiazka ON gatunek.id_gatunku=ksiazka.id_gatunku WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['nazwa_gatunku'];
		}
		return '';
	}
	
	function getDescription($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT opis_ksiazki FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['opis_ksiazki'];
		}
		return '';
	}
	
	function getCover($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT okladka FROM ksiazka WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['okladka'];
		}
		return '';
	}
	
	function getBirthDate($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT data_urodzenia_autora FROM autor JOIN ksiazka ON autor.id_autora=ksiazka.id_autora WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['data_urodzenia_autora'];
		}
		return '';
	}
	
	function getStatus($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT nazwa_statusu FROM status JOIN ksiazka ON status.id_statusu=ksiazka.id_statusu WHERE id_ksiazki=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['nazwa_statusu'];
		}
		return '';
	}

	function getUserFirstName($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT imie_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['imie_uzytkownika'];
		}
		return '';
	}

	function getUserLastName($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT nazwisko_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['nazwisko_uzytkownika'];
		}
		return '';
	}

	function getUserBirthDate($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT data_urodzenia_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['data_urodzenia_uzytkownika'];
		}
		return '';
	}

	function getUserPESEL($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT PESEL_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['PESEL_uzytkownika'];
		}
		return '';
	}

	function getUserEmailAddress($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT adres_email_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['adres_email_uzytkownika'];
		}
		return '';
	}

	function getUserUsername($id) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika=$id;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['nazwa_uzytkownika'];
		}
		return '';
	}

	function getUserAddress($id) 
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

	function getUserPhoneNumber($id) 
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

	function getSearchResultLong($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' OR wydawnictwo_ksiazki LIKE '%$search%' OR imie_nazwisko_autora LIKE '%$search%';");

		$result2 = "SELECT COUNT(*)
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' OR wydawnictwo_ksiazki LIKE '%$search%' OR imie_nazwisko_autora LIKE '%$search%';";
		
		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}

			return $ksiazki;
		}
		
	}

	function getSearchResultLongQuery($search) 
	{
		$pdo = connect();
		$result = "SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' OR wydawnictwo_ksiazki LIKE '%$search%' OR imie_nazwisko_autora LIKE '%$search%'";

		return $result;
	}

	function getSearchResultShort($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '$search%';");

		$result2 = "SELECT COUNT(*)
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '$search%';";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}

			return $ksiazki;
		}
	}

	function getSearchResultShortQuery($search) 
	{
		$pdo = connect();
		$result = "SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '$search%'";

		return $result;
	}

	function getSearchResultLongL($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' AND czy_lektura=1 OR imie_nazwisko_autora LIKE '%$search%' AND czy_lektura=1
		OR wydawnictwo_ksiazki LIKE '%$search%' AND czy_lektura=1;");

		$result2 = "SELECT COUNT(*)
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' AND czy_lektura=1 OR imie_nazwisko_autora LIKE '%$search%' AND czy_lektura=1
		OR wydawnictwo_ksiazki LIKE '%$search%' AND czy_lektura=1;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}

			return $ksiazki;
		}
	}

	function getSearchResultLongLQuery($search) 
	{
		$pdo = connect();
		$result = "SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '%$search%' AND czy_lektura=1 AND tytul_ksiazki != ''
		OR wydawnictwo_ksiazki LIKE '%$search%' AND czy_lektura=1 AND tytul_ksiazki != ''
		OR imie_nazwisko_autora LIKE '%$search%' AND czy_lektura=1 AND tytul_ksiazki != ''";

		return $result;
	}

	function getSearchResultShortL($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '$search%' AND czy_lektura=1;");

		$result2 = "SELECT COUNT(*)
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE tytul_ksiazki LIKE '$search%' AND czy_lektura=1;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}

			return $ksiazki;
		}
	}

	function getSearchResultShortLQuery($search) 
	{
		$pdo = connect();
		$result = "SELECT tytul_ksiazki, imie_nazwisko_autora, id_ksiazki, okladka 
		FROM ksiazka JOIN autor ON ksiazka.id_autora=autor.id_autora 
		WHERE czy_lektura=1 AND tytul_ksiazki LIKE '$search%' AND tytul_ksiazki != ''";

		return $result;
	}

	function getSearchResultAccountLong($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_uzytkownika, imie_uzytkownika, nazwisko_uzytkownika, nazwa_uzytkownika 
		FROM uzytkownik JOIN uprawnienia ON uzytkownik.id_uprawnienia=uprawnienia.id_uprawnienia 
		WHERE nazwa_uprawnienia='Użytkownik' AND imie_uzytkownika LIKE '%$search%'
		OR nazwa_uprawnienia='Użytkownik' AND nazwisko_uzytkownika LIKE '%$search%'
		ORDER BY nazwisko_uzytkownika;");

		$result2 = "SELECT COUNT(*)
		FROM uzytkownik JOIN uprawnienia ON uzytkownik.id_uprawnienia=uprawnienia.id_uprawnienia 
		WHERE nazwa_uprawnienia='Użytkownik' AND imie_uzytkownika LIKE '%$search%'
		OR nazwa_uprawnienia='Użytkownik' AND nazwisko_uzytkownika LIKE '%$search%'
		ORDER BY nazwisko_uzytkownika;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$profile[] = $row;
			}

			return $profile;
		}
	}

	function getSearchResultAccountShort($search) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_uzytkownika, imie_uzytkownika, nazwisko_uzytkownika, nazwa_uzytkownika 
		FROM uzytkownik JOIN uprawnienia ON uzytkownik.id_uprawnienia=uprawnienia.id_uprawnienia 
		WHERE nazwa_uprawnienia='Użytkownik' AND imie_uzytkownika LIKE '$search%'
		OR nazwa_uprawnienia='Użytkownik' AND nazwisko_uzytkownika LIKE '$search%'
		ORDER BY nazwisko_uzytkownika;");

		$result2 = "SELECT COUNT(*)
		FROM uzytkownik JOIN uprawnienia ON uzytkownik.id_uprawnienia=uprawnienia.id_uprawnienia 
		WHERE nazwa_uprawnienia='Użytkownik' AND imie_uzytkownika LIKE '$search%'
		OR nazwa_uprawnienia='Użytkownik' AND nazwisko_uzytkownika LIKE '$search%'
		ORDER BY nazwisko_uzytkownika;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$profile[] = $row;
			}

			return $profile;
		}
	}

	function getAuthorName($imie_nazwisko_autora)
    {
		$pdo = connect();
        $query = "SELECT imie_nazwisko_autora FROM autor WHERE imie_nazwisko_autora = :imie_nazwisko_autora;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":imie_nazwisko_autora", $imie_nazwisko_autora);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

	function getAuthorID($imie_nazwisko_autora) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_autora FROM autor WHERE imie_nazwisko_autora='$imie_nazwisko_autora';");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_autora'];
		}
		return '';
	}

	function getGenreID($nazwa_gatunku) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_gatunku FROM gatunek WHERE nazwa_gatunku='$nazwa_gatunku';");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_gatunku'];
		}
		return '';
	}

	function displayFavourite($id)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT gatunek.nazwa_gatunku, status.nazwa_statusu, ksiazka.id_ksiazki, ksiazka.tytul_ksiazki, ksiazka.okladka, autor.imie_nazwisko_autora FROM ulubione JOIN ksiazka ON ulubione.id_ksiazki=ksiazka.id_ksiazki JOIN autor ON ksiazka.id_autora=autor.id_autora JOIN gatunek ON ksiazka.id_gatunku=gatunek.id_gatunku JOIN status ON ksiazka.id_statusu=status.id_statusu WHERE id_uzytkownika=$id;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$ksiazki[] = $row;
		}
		return $ksiazki;
	}

	function getBookTitleRent()
	{
		$pdo = connect();
		$result = $pdo->query("SELECT tytul_ksiazki, ISBN FROM ksiazka WHERE id_statusu=1;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$ksiazki[] = $row;
		}
		return $ksiazki;
	}

	function getUserNameRent()
	{
		$pdo = connect();
		$result = $pdo->query("SELECT imie_uzytkownika, nazwisko_uzytkownika, PESEL_uzytkownika FROM uzytkownik WHERE id_uprawnienia=2;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$profile[] = $row;
		}
		return $profile;
	}

	function getBookIDRentReturn($ISBN)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_ksiazki FROM ksiazka WHERE ISBN=$ISBN;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_ksiazki'];
		}
		return '';
	}

	function getUserIDRentReturn($PESEL_uzytkownika) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_uzytkownika FROM uzytkownik WHERE PESEL_uzytkownika='$PESEL_uzytkownika';");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_uzytkownika'];
		}
		return '';
	}

	function getBookStatusRentReturn($ISBN) 
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_statusu FROM ksiazka WHERE ISBN=$ISBN;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_statusu'];
		}
		return '';
	}

	function getBookTitleReturn()
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ISBN, tytul_ksiazki FROM wypozyczenia
								JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki WHERE ksiazka.id_statusu=2
								AND wypozyczenia.faktyczny_termin_oddania IS NULL;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$ksiazki[] = $row;
		}
		return $ksiazki;
	}

	function getUserNameReturn()
	{
		$pdo = connect();
		$result = $pdo->query("SELECT DISTINCT uzytkownik.PESEL_uzytkownika, uzytkownik.imie_uzytkownika, uzytkownik.nazwisko_uzytkownika FROM wypozyczenia 
			JOIN uzytkownik ON wypozyczenia.id_uzytkownika=uzytkownik.id_uzytkownika WHERE uzytkownik.id_uprawnienia=2 AND wypozyczenia.faktyczny_termin_oddania IS NULL;");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$profile[] = $row;
		}
		return $profile;
	}

	function getReturnDeadline($id_uzytkownika, $id_ksiazki)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT termin_oddania FROM wypozyczenia WHERE id_uzytkownika=$id_uzytkownika AND id_ksiazki=$id_ksiazki;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['termin_oddania'];
		}
		return '';
	}

	function isCombinationCorrect($id_uzytkownika, $id_ksiazki)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_wypozyczenia FROM wypozyczenia WHERE id_uzytkownika=$id_uzytkownika AND id_ksiazki=$id_ksiazki AND faktyczny_termin_oddania IS NULL;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function displayUserBooks($id_uzytkownika)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, ksiazka.okladka, 
			gatunek.nazwa_gatunku, wypozyczenia.termin_wypozyczenia, wypozyczenia.termin_oddania
			FROM wypozyczenia JOIN ksiazka ON ksiazka.id_ksiazki=wypozyczenia.id_ksiazki
			JOIN autor ON autor.id_autora=ksiazka.id_autora JOIN gatunek ON gatunek.id_gatunku=ksiazka.id_gatunku
			WHERE wypozyczenia.id_uzytkownika=$id_uzytkownika AND wypozyczenia.faktyczny_termin_oddania IS NULL;");
		
		$result2 = "SELECT COUNT(*)
			FROM wypozyczenia JOIN ksiazka ON ksiazka.id_ksiazki=wypozyczenia.id_ksiazki
			JOIN autor ON autor.id_autora=ksiazka.id_autora JOIN gatunek ON gatunek.id_gatunku=ksiazka.id_gatunku
			WHERE wypozyczenia.id_uzytkownika=$id_uzytkownika AND wypozyczenia.faktyczny_termin_oddania IS NULL;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}
			return $ksiazki;
		}
	}

	function displayUserBooksArchive($id_uzytkownika)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, ksiazka.okladka, 
			gatunek.nazwa_gatunku, wypozyczenia.termin_wypozyczenia, wypozyczenia.faktyczny_termin_oddania
			FROM wypozyczenia JOIN ksiazka ON ksiazka.id_ksiazki=wypozyczenia.id_ksiazki
			JOIN autor ON autor.id_autora=ksiazka.id_autora JOIN gatunek ON gatunek.id_gatunku=ksiazka.id_gatunku
			WHERE wypozyczenia.id_uzytkownika=$id_uzytkownika AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL;");
		
		$result2 = "SELECT COUNT(*)
		FROM wypozyczenia JOIN ksiazka ON ksiazka.id_ksiazki=wypozyczenia.id_ksiazki
			JOIN autor ON autor.id_autora=ksiazka.id_autora JOIN gatunek ON gatunek.id_gatunku=ksiazka.id_gatunku
			WHERE wypozyczenia.id_uzytkownika=$id_uzytkownika AND wypozyczenia.faktyczny_termin_oddania IS NOT NULL;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();
		
		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}
			return $ksiazki;
		}
	}

	function displayUsersBooksAdmin($id)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ksiazka.id_ksiazki, ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, 
		ksiazka.okladka, wypozyczenia.termin_wypozyczenia, wypozyczenia.termin_oddania
		FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
		JOIN autor ON autor.id_autora=ksiazka.id_autora WHERE wypozyczenia.id_uzytkownika=$id 
		AND wypozyczenia.faktyczny_termin_oddania IS NULL;");

		$result2 = "SELECT COUNT(*)
		FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
		JOIN autor ON autor.id_autora=ksiazka.id_autora WHERE wypozyczenia.id_uzytkownika=$id 
		AND wypozyczenia.faktyczny_termin_oddania IS NULL;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();

		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}
			return $ksiazki;
		}
	}

	function displayLateReturnAdmin($dzisiejsza_data)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT ksiazka.id_ksiazki, ksiazka.tytul_ksiazki, autor.imie_nazwisko_autora, 
		ksiazka.okladka, wypozyczenia.termin_wypozyczenia, wypozyczenia.termin_oddania,
		uzytkownik.imie_uzytkownika, uzytkownik.nazwisko_uzytkownika, uzytkownik.adres_email_uzytkownika
		FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
		JOIN uzytkownik ON uzytkownik.id_uzytkownika=wypozyczenia.id_uzytkownika
		JOIN autor ON autor.id_autora=ksiazka.id_autora 
		WHERE $dzisiejsza_data > wypozyczenia.termin_oddania
		AND wypozyczenia.faktyczny_termin_oddania IS NULL;");

		$result2 = "SELECT COUNT(*)
		FROM wypozyczenia JOIN ksiazka ON wypozyczenia.id_ksiazki=ksiazka.id_ksiazki
		JOIN uzytkownik ON uzytkownik.id_uzytkownika=wypozyczenia.id_uzytkownika
		JOIN autor ON autor.id_autora=ksiazka.id_autora 
		WHERE $dzisiejsza_data > wypozyczenia.termin_oddania
		AND wypozyczenia.faktyczny_termin_oddania IS NULL;";

		$resultCheck = $pdo->query($result2);
		$count = $resultCheck->fetchColumn();

		if($count > 0)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$ksiazki[] = $row;
			}
			return $ksiazki;
		}
	}

	function getUserIDFromBookID($id_ksiazki)
	{
		$pdo = connect();
		$result = $pdo->query("SELECT id_uzytkownika FROM wypozyczenia WHERE id_ksiazki=$id_ksiazki AND faktyczny_termin_oddania IS NULL;");
		if($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			return $row['id_uzytkownika'];
		}
		return '';
	}