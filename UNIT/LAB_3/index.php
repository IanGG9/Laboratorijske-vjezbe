<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP zadaci - funkcije i petlje</title>
</head>
<body>
<h2>1. Funkcije – parametri i vraćanje vrijednosti</h2>

<form method="post">
    <label>Bodovi 1. kolokvij:</label>
    <input type="number" name="k1" required><br><br>
    <label>Bodovi 2. kolokvij:</label>
    <input type="number" name="k2" required><br><br>
    <input type="submit" name="provjeri" value="Provjeri rezultat">
</form>

<?php
function rezultatKolokvija($k1, $k2) {
    if ($k1 < 40 || $k2 < 40) {
        return "Pad";
    } elseif (($k1 >= 40 && $k1 <= 49) || ($k2 >= 40 && $k2 <= 49)) {
        return "Ponavljanje kolokvija";
    } elseif ($k1 >= 40 && $k2 >= 40 && ($k1 + $k2) >= 100) {
        return "Položeno";
    } else {
        return "Nedovoljan broj bodova za prolaz";
    }
}

if (isset($_POST['provjeri'])) {
    $k1 = $_POST['k1'];
    $k2 = $_POST['k2'];
    $rezultat = rezultatKolokvija($k1, $k2);
    echo "<p><b>Rezultat: $rezultat</b></p>";
}
?>

<hr>

<h2>2. Korištenje globalnih varijabli</h2>
<?php
$v = 50;

function Oduzmi() {
    global $v;
    $v -= 20;
}

function Dodaj() {
    global $v;
    $v += 60;
}

Oduzmi();
echo "Nakon Oduzmi(): $v<br>"; // treba biti 30
Dodaj();
echo "Nakon Dodaj(): $v<br>"; // treba biti 90
?>

<hr>

<h2>3. Korištenje statičkih varijabli</h2>
<?php
function Ispis() {
    static $st = 20;
    echo $st . " ";
    $st++;
}

for ($i = 0; $i < 10; $i++) {
    Ispis();
}
?>

<hr>

<h2>4a. For petlja – neparni brojevi</h2>
<form method="post">
    <label>Početni broj:</label>
    <input type="number" name="a" required><br><br>
    <label>Krajnji broj:</label>
    <input type="number" name="b" required><br><br>
    <input type="submit" name="forpetlja" value="Ispiši neparne (for)">
</form>

<?php
if (isset($_POST['forpetlja'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    echo "Neparni brojevi između $a i $b:<br>";
    for ($i = $a; $i <= $b; $i++) {
        if ($i % 2 != 0) {
            echo "$i ";
        }
    }
}
?>

<hr>

<h2>4b. While petlja – neparni brojevi</h2>
<form method="post">
    <label>Početni broj:</label>
    <input type="number" name="a2" required><br><br>
    <label>Krajnji broj:</label>
    <input type="number" name="b2" required><br><br>
    <input type="submit" name="whilepetlja" value="Ispiši neparne (while)">
</form>

<?php
if (isset($_POST['whilepetlja'])) {
    $a = $_POST['a2'];
    $b = $_POST['b2'];
    echo "Neparni brojevi između $a i $b:<br>";
    while ($a <= $b) {
        if ($a % 2 != 0) {
            echo "$a ";
        }
        $a++;
    }
}
?>

<hr>

<h2>5. Do...While petlja – djelitelji broja</h2>
<form method="post">
    <label>Unesi broj:</label>
    <input type="number" name="broj_djelitelji" required>
    <input type="submit" name="djelitelji" value="Prikaži djelitelje">
</form>

<?php
if (isset($_POST['djelitelji'])) {
    $n = $_POST['broj_djelitelji'];
    echo "Djelitelji broja $n su:<br>";
    $i = 1;
    do {
        if ($n % $i == 0) {
            echo "$i ";
        }
        $i++;
    } while ($i <= $n);
}
?>

<hr>

<h2>6. For petlja – provjera prostog broja</h2>
<form method="post">
    <label>Unesi broj:</label>
    <input type="number" name="prost" required>
    <input type="submit" name="provjeri_prost" value="Provjeri">
</form>

<?php
if (isset($_POST['provjeri_prost'])) {
    $broj = $_POST['prost'];
    $prost = true;

    if ($broj < 2) {
        $prost = false;
    } else {
        for ($i = 2; $i <= $broj / 2; $i++) {
            if ($broj % $i == 0) {
                $prost = false;
                break;
            }
        }
    }

    if ($prost) {
        echo "<p>$broj je prost broj.</p>";
    } else {
        echo "<p>$broj nije prost broj.</p>";
    }
}
?>

</body>
</html>
