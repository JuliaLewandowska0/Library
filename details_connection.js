//Funkcja, która przechodzi do szczegółów książki o podanym ID (Bez logowania)
function details_connection_NoLogin (nr)
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("BookDetails.php")
}

//Funkcja, która przechodzi do szczegółów książki o podanym ID (User)
function details_connection_User (nr) 
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("UserBookDetails.php")
}

//Funkcja, która przechodzi do szczegółów książki o podanym ID (Admin)
function details_connection_Admin (nr)
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("AdminBookDetails.php")
}

//Funkcja, która przechodzi do szczegółów lektury o podanym ID (Bez logowania)
function details_connection_NoLogin_L (nr) 
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("BookLDetails.php")
}

//Funkcja, która przechodzi do szczegółów lektury o podanym ID (User)
function details_connection_User_L (nr) 
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("UserBookLDetails.php")
}

//Funkcja, która przechodzi do szczegółów książki o podanym ID (Admin)
function details_connection_Admin (nr)
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("AdminBookDetails.php")
}

//Funkcja, która przechodzi do szczegółów lektury o podanym ID (Admin)
function details_connection_Admin_L (nr)
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("AdminBookLDetails.php")
}

//Funkcja, która przechodzi do szczegółów profilu użytkownika o podanym ID (Admin)
function details_connection_Admin_accounts (nr)
{
	var profilid=nr;
	localStorage.setItem("idprofil",profilid);
	window.location.assign("AdminAccountsDetails.php")
}

//Funkcja, która przechodzi do szczegółów książki z listy "Ulubionych" użytkownika
function details_connection_User_favourite (nr)
{
	var ksiazkaid=nr;
	localStorage.setItem("idksiazki",ksiazkaid);
	window.location.assign("UserFavouriteDetails.php")
}