<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

function check_late_return($id)
{
    $pdo = connect();
    $data = date('Y-m-d');
  
    $result = "SELECT COUNT(*) FROM wypozyczenia
      WHERE $data > termin_oddania
      AND id_uzytkownika = $id AND faktyczny_termin_oddania IS NULL;";

    $resultCheck = $pdo->query($result);
    $count = $resultCheck->fetchColumn();
  
    if($count > 0)
    {
        echo '<script>Swal.fire({
              title: "Zaległe zwroty!",
              text: "Posiadasz książki/książkę której minął termin oddania. Jak najszybciej zwróć ją do biblioteki.",
              icon: "warning",
              confirmButtonText: "Rozumiem. Przejdź do Strony Głównej.",
              }).then((result) => {
              window.location.href="UserHomePage.php";
              });</script>';
    }
}

