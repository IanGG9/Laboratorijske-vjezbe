<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");

if (!$veza) {
    die("Greška pri spajanju: " . mysqli_connect_error());
}

$sql1 = "INSERT INTO Dobavljac (dobavljacID, nazivDob, adresa, telefon) VALUES
(1, 'Kraš', 'Ravnice 48, Zagreb', '01 2396 111'),
(2, 'Labud', 'Radnička cesta 173 r, Zagreb', '01 2396 111'),
(3, 'Podravka', 'Ante Starčevića 32, Koprivnica', '048 651 144')";

$sql2 = "INSERT INTO Kategorija (kategorijaID, nazivKat) VALUES
(1, 'juha'),
(2, 'dodatak jelu'),
(3, 'čokolada'),
(4, 'keksi'),
(5, 'deterdžent')";

$sql3 = "INSERT INTO Proizvod (proizvodID, nazivPro, cijena, kolicina, dobavljacID, kategorijaID) VALUES
(1, 'Oliver Futura', 34.99, 25, 2, 5),
(2, 'Vegeta pikant', 12.50, 100, 3, 2),
(3, 'Dorina Mousse', 7.05, 70, 1, 3),
(4, 'Životinjsko carstvo', 1.45, 150, 1, 3)";

if (mysqli_query($veza, $sql1) && mysqli_query($veza, $sql2) && mysqli_query($veza, $sql3)) {
    echo "Podaci su uspješno uneseni u sve tri tablice!";
} else {
    echo "Greška pri unosu podataka: " . mysqli_error($veza);
}

mysqli_close($veza);
?>
