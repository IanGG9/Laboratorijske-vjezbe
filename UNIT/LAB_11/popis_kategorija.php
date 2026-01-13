<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");
$rezultat = mysqli_query($veza, "SELECT * FROM Kategorija");
echo "<h3>Popis kategorija</h3><table border='1'><tr><th>ID</th><th>Naziv kategorije</th></tr>";
while ($red = mysqli_fetch_object($rezultat)) {
    echo "<tr><td>$red->kategorijaID</td><td>$red->nazivkat</td></tr>";
}
echo "</table>
<a href='admin.php'>Povratak</a>";
?>
