<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'uredi') {

        $sql = "DELETE FROM Proizvod WHERE proizvodID = $id";

        if (mysqli_query($veza, $sql)) {
            echo "Proizvod ID: $id je uspješno obrisan!";
            echo "
<a href='admin.php'>Povratak na listu</a>";
        } else {
            echo "Greška pri brisanju: " . mysqli_error($veza);
        }
    }
} else {
    header("Location: admin.php");
}

mysqli_close($veza);
?>

