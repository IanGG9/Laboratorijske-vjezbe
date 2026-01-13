<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");
$rezultat = mysqli_query($veza, "SELECT * FROM Dobavljac");
echo "<h3>Popis dobavljača</h3><table border='1'><tr><th>Naziv</th><th>Adresa</th><th>Telefon</th></tr>";
while ($red = mysqli_fetch_object($rezultat)) {
    echo "<tr><td>$red->nazivDob</td><td>$red->adresa</td><td>$red->telefon</td></tr>";
}
echo "</table>
<a href='admin.php'>Povratak</a>";
?>
