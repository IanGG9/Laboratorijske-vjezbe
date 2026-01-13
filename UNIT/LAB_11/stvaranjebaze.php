<?php
$veza = mysqli_connect("localhost", "root", "");

if (!$veza) {
    die("Greška pri spajanju: " . mysqli_connect_error());
}

$sql_baza = "CREATE DATABASE IF NOT EXISTS Prodaja";

if (mysqli_query($veza, $sql_baza)) {
    echo "Baza Prodaja je uspješno stvorena ili već postoji.
";
} else {
    echo "Greška pri stvaranju baze: " . mysqli_error($veza);
}

mysqli_select_db($veza, "Prodaja");


$sql_dobavljac = "CREATE TABLE Dobavljac (
    dobavljacID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nazivDob VARCHAR(60) NOT NULL,
    adresa VARCHAR(70) NOT NULL,
    telefon VARCHAR(20) NOT NULL,
    PRIMARY KEY (dobavljacID)
) ENGINE = MyISAM";

$sql_kategorija = "CREATE TABLE Kategorija (
    kategorijaID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nazivkat VARCHAR(30) NOT NULL,
    PRIMARY KEY (kategorijaID)
) ENGINE = MyISAM";

$sql_proizvod = "CREATE TABLE Proizvod (
    proizvodID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nazivPro VARCHAR(40) NOT NULL,
    cijena DECIMAL(7,2) NOT NULL,
    kolicina SMALLINT NOT NULL DEFAULT 0,
    dobavljacID INTEGER UNSIGNED,
    kategorijaID INTEGER UNSIGNED,
    PRIMARY KEY (proizvodID)
) ENGINE = MyISAM";

mysqli_query($veza, $sql_dobavljac);
mysqli_query($veza, $sql_kategorija);
mysqli_query($veza, $sql_proizvod);

echo "Tablice Dobavljac, Kategorija i Proizvod su uspješno kreirane!";

mysqli_close($veza);
?>

