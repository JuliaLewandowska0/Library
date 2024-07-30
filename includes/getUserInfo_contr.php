<?php

require_once 'config_session.php';
$idUzytkownika = $_SESSION['uzytkownik_id'];

require_once 'getUserInfo_model.php';
$imieUzytkownika = getFirstNameCurrentUser($idUzytkownika);
$nazwiskoUzytkownika = getLastNameCurrentUser($idUzytkownika);
$dataUrodzeniaUzytkownika = getBirthDateCurrentUser($idUzytkownika);
$PESELUzytkownika = getPESELCurrentUser($idUzytkownika);
$adresUzytkownika = getAddressCurrentUser($idUzytkownika);
$nrTelefonuUzytkownika = getPhoneNumberCurrentUser($idUzytkownika);
$adresEmailUzytkownika = getEmailAddressCurrentUser($idUzytkownika);
$nazwaUzytkownika = getUsernameCurrentUser($idUzytkownika);
$hasloUzytkownika = getPasswordCurrentUser($idUzytkownika);
$uprawnienieUzytkownika = getUserTypeCurrentUser($idUzytkownika);