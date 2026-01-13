<?php
$veza = mysqli_connect("localhost", "root", "", "Prodaja");

if (!$veza) {
    die("Greška pri spajanju: " . mysqli_connect_error());
}


$rezultat = mysqli_query($veza, "SELECT *, (cijena * kolicina) AS vrijednost FROM Proizvod");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administracija Proizvoda</title>
</head>
<body>

<div style="text-align: center;"> <h3>Baza proizvoda</h3> <table border="1" cellpadding="2" cellspacing="2" style="width:60%; margin-left: auto; margin-right: auto;"> <tr>
            <th>Naziv proizvoda</th> <th>Količina</th> <th>Cijena</th> <th>Vrijednost robe</th> <th>Uredi</th> </tr>

        <?php
        $brojpro = 0; // [cite: 75]

        while ($red = mysqli_fetch_object($rezultat)) {
            echo '<tr>';
            echo '<td>' . $red->nazivPro . '</td>';
            echo '<td>' . $red->kolicina . '</td>';
            echo '<td>' . $red->cijena . '</td>';
            echo '<td>' . number_format($red->vrijednost, 2) . '</td>';
            echo '<td><a href="proizvod.php?action=uredi&id=' . $red->proizvodID . '">[UREDI]</a></td>';
            echo '</tr>';
            $brojpro++;
        }
        ?>

    </table>

    <a href="potvrdi.php">Dodaj novi proizvod</a> <p>Broj proizvoda: <?php echo $brojpro; ?></p> </div>

</body>
</html>

