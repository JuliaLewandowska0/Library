<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
        if(sessionStorage.getItem("deleted") === "true") 
        {
            Swal.fire({
                title: "Usunięto!",
                text: "Rekord został usunięty z bazy danych.",
                icon: "success",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../AdminModifyDatabase.php";
            });
            sessionStorage.removeItem("deleted");
        }

        if(sessionStorage.getItem("deleted") === "false") 
        {
            Swal.fire({
                title: "Błąd!",
                text: "Wystąpił błąd podczas usuwania rekordu.",
                icon: "error",
                confirmButtonText: "OK",
                }).then((result) => {
                window.location.href="../AdminModifyDatabase.php";
            });
            sessionStorage.removeItem("deleted");
        }
    });
</script>

<?php 
    require_once 'functions.php';
    $pdo = connect();
    $idbook = $_GET['idbook'];

    $query = "DELETE FROM ksiazka WHERE id_ksiazki=:id_ksiazki;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_ksiazki', $idbook, PDO::PARAM_INT);

    if ($stmt->execute()) 
    {
        echo '<script>sessionStorage.setItem("deleted", "true");</script>';
    } 
    else 
    {
        echo '<script>sessionStorage.setItem("deleted", "false");</script>';
    }

    $pdo = null;
    $stmt = null;
    die();
?>
