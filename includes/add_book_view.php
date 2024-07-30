<?php

declare(strict_types=1);

function newBookInput()
{
    if(isset($_SESSION["new_book_data"]["ISBN"]))
    {
        echo '<label id="textInsideForm-AddBook">ISBN: </label>';
        echo '<input type="text" name="ISBN" id="inputBracket-AddBook" placeholder="Wprowadź kod ISBN" value="'. $_SESSION["new_book_data"]["ISBN"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">ISBN: </label>';
        echo '<input type="text" name="ISBN" id="inputBracket-AddBook" placeholder="Wprowadź kod ISBN">';
    }

    if(isset($_SESSION["new_book_data"]["tytul_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Tytuł książki: </label>';
        echo '<input type="text" name="tytul_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź tytuł książki" value="'. $_SESSION["new_book_data"]["tytul_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Tytuł książki: </label>';
        echo '<input type="text" name="tytul_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź tytuł książki">';
    }

    if(isset($_SESSION["new_book_data"]["imie_nazwisko_autora"]))
    {
        echo '<label id="textInsideForm-AddBook">Autor książki: </label>';
        echo '<input type="text" name="imie_nazwisko_autora" id="inputBracket-AddBook" placeholder="Wprowadź autora książki" value="'. $_SESSION["new_book_data"]["imie_nazwisko_autora"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Autor książki: </label>';
        echo '<input type="text" name="imie_nazwisko_autora" id="inputBracket-AddBook" placeholder="Wprowadź autora książki">';
    }

    if(isset($_SESSION["new_book_data"]["rok_wydania_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Rok wydania książki: </label>';
        echo '<input type="text" name="rok_wydania_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź rok wydania" value="'. $_SESSION["new_book_data"]["rok_wydania_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Rok wydania książki: </label>';
        echo '<input type="text" name="rok_wydania_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź rok wydania">';
    }

    if(isset($_SESSION["new_book_data"]["wydawnictwo_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Wydawnictwo książki: </label>';
        echo '<input type="text" name="wydawnictwo_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź wydawnictwo" value="'. $_SESSION["new_book_data"]["wydawnictwo_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Wydawnictwo książki: </label>';
        echo '<input type="text" name="wydawnictwo_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź wydawnictwo">';
    }

    if(isset($_SESSION["new_book_data"]["ilosc_stron_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Ilość stron książki: </label>';
        echo '<input type="text" name="ilosc_stron_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź ilość stron" value="'. $_SESSION["new_book_data"]["ilosc_stron_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Ilość stron książki: </label>';
        echo '<input type="text" name="ilosc_stron_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź ilość stron">';
    }

    if(isset($_SESSION["new_book_data"]["tlumacz_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Tłumacz książki: </label>';
        echo '<input type="text" name="tlumacz_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź tłumacza książki (nieobowiązkowe)" value="'. $_SESSION["new_book_data"]["tlumacz_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Tłumacz książki: </label>';
        echo '<input type="text" name="tlumacz_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź tłumacza książki (nieobowiązkowe)">';
    }

    if(isset($_SESSION["new_book_data"]["jezyk_org_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Język oryginału: </label>';
        echo '<input type="text" name="jezyk_org_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź język oryginału" value="'. $_SESSION["new_book_data"]["jezyk_org_ksiazki"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Język oryginału: </label>';
        echo '<input type="text" name="jezyk_org_ksiazki" id="inputBracket-AddBook" placeholder="Wprowadź język oryginału">';
    }

    echo '
        <label id="textInsideForm-AddBook">Gatunek książki: </label>
        <select class="filterBar" name="nazwa_gatunku" id="choseBracket-AddBook">
			<option value="">--Wybierz--</option>
			<option value="Fantasy">Fantasy</option>
			<option value="Science-Fiction">Science-Fiction</option>
			<option value="Romans">Romans</option>
			<option value="Historyczny">Historyczny</option>
			<option value="Horror">Horror</option>
			<option value="Kryminał">Kryminał</option>
			<option value="Thriller">Thriller</option>
			<option value="Biografia">Biografia</option>
			<option value="Reportaż">Reportaż</option>
			<option value="Dla młodzieży">Dla młodzieży</option>
			<option value="Dla dzieci">Dla dzieci</option>
			<option value="Kucharska">Kucharska</option>
			<option value="Poradnik">Poradnik</option>
			<option value="Psychologiczny">Psychologiczny</option>
			<option value="Dramat">Dramat</option>
		</select>
        <label id="textInsideForm-AddBook">Status książki: </label>
        <select class="filterBar" name="nazwa_statusu" id="choseBracket-AddBook">
			<option value="">--Wybierz--</option>
			<option value="1">Dostępna</option>
			<option value="2">Niedostępna</option>
		</select>
        <label id="textInsideForm-AddBook">Czy książka jest lekturą?</label>
        <select class="filterBar" name="czy_lektura" id="choseBracket-AddBook">
			<option value="">--Wybierz--</option>
			<option value="Tak">Tak</option>
			<option value="Nie">Nie</option>
		</select>';

    if(isset($_SESSION["new_book_data"]["opis_ksiazki"]))
    {
        echo '<label id="textInsideForm-AddBook">Opis książki: </label>';
        echo '<textarea id="inputBracket2-AddBook" name="opis_ksiazki" rows="14" cols="50" placeholder="Wprowadź opis książki...">'. $_SESSION["new_book_data"]["opis_ksiazki"] .'</textarea>';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Opis książki: </label>';
		echo '<textarea id="inputBracket2-AddBook" name="opis_ksiazki" rows="14" cols="50" placeholder="Wprowadź opis książki..."></textarea>';
    }

    if(isset($_SESSION["new_book_data"]["okladka"]))
    {
        echo '<label id="textInsideForm-AddBook">Ścieżka do pliku z okładką książki: </label>';
        echo '<input type="text" name="okladka" placeholder="Wprowadź ścieżkę do pliku" id="inputBracket-AddBook" value="'. $_SESSION["new_book_data"]["okladka"] .'">';
    }
    else
    {
        echo '<label id="textInsideForm-AddBook">Ścieżka do pliku z okładką książki: </label>';
        echo '<input type="text" name="okladka" placeholder="Wprowadź ścieżkę do pliku" id="inputBracket-AddBook">';
    }

    unset($_SESSION["new_book_data"]);
}