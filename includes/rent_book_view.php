<?php

declare(strict_types=1);

function display_book_content()
{
    if(isset($_SESSION["Book_Title_To_Rent"]) && isset($_SESSION["Book_ISBN_To_Rent"]))
    {
        echo '<select class="selectBracket-RentReturn" id="searchddl" name="wypozycz_ksiazka" value="'. $_SESSION["Book_ISBN_To_Rent"] .'">
			    <option value="'. $_SESSION["Book_ISBN_To_Rent"] .'">'.$_SESSION["Book_ISBN_To_Rent"] ." ". $_SESSION["Book_Title_To_Rent"] .'</option>
		    </select>';

        unset($_SESSION["Book_Title_To_Rent"]);
        unset($_SESSION["Book_ISBN_To_Rent"]);
    }
    else
    {
        echo '<select class="selectBracket-RentReturn" id="searchddl" name="wypozycz_ksiazka">';
		echo '<option value="">--Wybierz książkę--</option>'; 
        $ksiazki = getBookTitleRent();
        foreach ($ksiazki as $ksiazka)
		{
			echo '<option value="' .$ksiazka['ISBN']. '">' .$ksiazka['ISBN'] ." ".$ksiazka['tytul_ksiazki']. '</option>';
		}
		echo '</select>';
    }
}

function display_user_content()
{
    if(isset($_SESSION["Surname_User_To_Rent"]) && isset($_SESSION["Name_User_To_Rent"]) && $_SESSION["PESEL_User_To_Rent"])
    {
        echo '<select class="selectBracket-RentReturn" id="searchddl2" name="wypozycz_uzytkownik" value="'. $_SESSION["PESEL_User_To_Rent"] .'">
                <option value="'. $_SESSION["PESEL_User_To_Rent"] .'">'. $_SESSION["Surname_User_To_Rent"] ." ".$_SESSION["Name_User_To_Rent"] ." ".$_SESSION["PESEL_User_To_Rent"] .'</option>
		    </select>';

        unset($_SESSION["Surname_User_To_Rent"]);
        unset($_SESSION["Name_User_To_Rent"]);
        unset($_SESSION["PESEL_User_To_Rent"]);
    }
    else
    {
        echo '<select class="selectBracket-RentReturn" id="searchddl2" name="wypozycz_uzytkownik">';
        echo '<option value="">--Wybierz użytkownika--</option>';
		$profile = getUserNameRent();
        foreach ($profile as $profil)
		{
			echo '<option value="' .$profil['PESEL_uzytkownika'] . '">' .$profil['nazwisko_uzytkownika'] ." ".$profil['imie_uzytkownika'] ." ".$profil['PESEL_uzytkownika']. '</option>';
		}
		echo '</select>';
    }
}

function check_rent_book_errors()
{
    if(isset($_SESSION["errors_rent_book"]))
    {
        $errors = $_SESSION["errors_rent_book"];

        echo "<br";

        foreach($errors as $error)
        {
            echo '<p class="formErrors">'. $error .'</p>';
        }

        unset($_SESSION["errors_rent_book"]);
    }
}