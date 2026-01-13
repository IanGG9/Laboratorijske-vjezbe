<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");

if (isset($_POST['spremi'])) {
    $naziv = $_POST['nazivPro'];
    $cijena = $_POST['cijena'];
    $kolicina = $_POST['kolicina'];
    $dobavljac = $_POST['dobavljacID'];
    $kategorija = $_POST['kategorijaID'];

    $sql = "INSERT INTO Proizvod (nazivPro, cijena, kolicina, dobavljacID, kategorijaID) 
            VALUES ('$naziv', '$cijena', '$kolicina', '$dobavljac', '$kategorija')";

    if (mysqli_query($veza, $sql)) {
        echo "<p style='color:green;'>Proizvod uspješno dodan! <a href='admin.php'>Povratak na listu</a></p>";
    } else {
        echo "Greška: " . mysqli_error($veza);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Novi proizvod</title>
</head>
<body>
<h3>Dodaj novi proizvod</h3>
<form method="POST" action="">
    Naziv: <input type="text" name="nazivPro" required>


    Cijena: <input type="number" step="0.01" name="cijena" required>


    Količina: <input type="number" name="kolicina" required>



    Dobavljač ID:
    <select name="dobavljacID">
        <option value="1">Kraš</option>
        <option value="2">Labud</option>
        <option value="3">Podravka</option>
    </select>



    Kategorija ID:
    <select name="kategorijaID">
        <option value="1">Juha</option>
        <option value="2">Dodatak jelu</option>
        <option value="3">Čokolada</option>
        <option value="4">Keksi</option>
        <option value="5">Deterdžent</option>
    </select>



    <input type="submit" name="spremi" value="Spremi proizvod">
</form>


<a href="admin.php">Odustani</a>
</body>
</html>
