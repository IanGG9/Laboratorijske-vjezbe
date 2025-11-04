<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Laboratorijska vježba 4 - PHP funkcije</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 35px;
            background-color: #f2f2f2;
        }
        h1 {
            color: #003366;
        }
        h2 {
            color: #006600;
            border-bottom: 2px dashed #bbb;
            padding-bottom: 5px;
        }
        form {
            background-color: #ffffff;
            padding: 18px;
            border-radius: 10px;
            width: 420px;
            margin-bottom: 30px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 8px;
            font-weight: bold;
        }
        input[type=text],
        input[type=number] {
            width: 95%;
            padding: 7px;
            margin-top: 4px;
        }
        input[type=submit] {
            background-color: #006600;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type=submit]:hover {
            background-color: #009900;
        }
        p {
            font-weight: bold;
        }
        hr {
            margin: 40px 0;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<h1>Vježba 4 – Rad s funkcijama u PHP-u</h1>

<!-- 1. Zamjena vrijednosti -->
<h2>1) Prosljeđivanje po vrijednosti i referencom</h2>
<form method="post">
    <label>Prvi broj:</label>
    <input type="number" name="br1" required>

    <label>Drugi broj:</label>
    <input type="number" name="br2" required>

    <input type="submit" name="btn1" value="Zamijeni vrijednosti">
</form>

<?php
function zamjenaRef(&$x, &$y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

function zamjenaVrijednost($x, $y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

if (isset($_POST['btn1'])) {
    $x = $_POST['br1'];
    $y = $_POST['br2'];

    echo "<p>Prije zamjene: prvi = $x, drugi = $y</p>";

    zamjenaRef($x, $y);
    echo "<p>Nakon zamjene referencom: prvi = $x, drugi = $y</p>";

    $a = $_POST['br1'];
    $b = $_POST['br2'];
    zamjenaVrijednost($a, $b);
    echo "<p>Nakon zamjene bez reference: prvi = $a, drugi = $b</p>";
}
?>

<hr>

<!-- 2. Podrazumijevana vrijednost -->
<h2>2) Funkcija s podrazumijevanim argumentom</h2>
<form method="post">
    <label>Brzina zvuka (m/s):</label>
    <input type="number" name="v2" step="any" placeholder="prazno = zrak">

    <label>Vrijeme (s):</label>
    <input type="number" name="t2" step="any" required>

    <input type="submit" name="btn2" value="Izračunaj udaljenost">
</form>

<?php
function izracunajPut($t, $v = 344) {
    return $t * $v;
}

if (isset($_POST['btn2'])) {
    $t = $_POST['t2'];
    $v = $_POST['v2'];

    $rez = empty($v) ? izracunajPut($t) : izracunajPut($t, $v);

    echo "<p>Zvuk je prešao udaljenost od $rez metara.</p>";
}
?>

<hr>

<!-- 3. Varijabilni broj parametara -->
<h2>3) Funkcija s proizvoljnim brojem parametara</h2>
<form method="post">
    <label>Unesite brojeve (odvojene zarezom):</label>
    <input type="text" name="brojevi" placeholder="npr. 2, 4, 6, 8" required>

    <input type="submit" name="btn3" value="Izračunaj prosjeke">
</form>

<?php
function prosjecnaVrijednost() {
    $brojArg = func_num_args();
    $suma = 0;

    for ($i = 0; $i < $brojArg; $i++) {
        $suma += func_get_arg($i);
    }
    return $suma / $brojArg;
}

if (isset($_POST['btn3'])) {
    $niz = array_map('floatval', explode(',', str_replace(' ', '', $_POST['brojevi'])));

    $p1 = prosjecnaVrijednost(10, 20, 30, 40, ...$niz);
    $p2 = prosjecnaVrijednost(50, 60, 70, ...$niz);

    echo "<p>Prosjek prvog skupa brojeva: $p1</p>";
    echo "<p>Prosjek drugog skupa brojeva: $p2</p>";
}
?>

<hr>

<!-- 4. Najveći zajednički djelitelj -->
<h2>4) Najveći zajednički djelitelj (NZD)</h2>
<form method="post">
    <label>Unesite prvi broj:</label>
    <input type="number" name="num1" required>

    <label>Unesite drugi broj:</label>
    <input type="number" name="num2" required>

    <input type="submit" name="btn4" value="Izračunaj NZD">
</form>

<?php
function najveciZajednicki($a, $b) {
    $min = ($a < $b) ? $a : $b;

    for ($i = $min; $i >= 1; $i--) {
        if ($a % $i == 0 && $b % $i == 0) {
            return $i;
        }
    }
}

if (isset($_POST['btn4'])) {
    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $rez = najveciZajednicki($a, $b);

    echo "<p>Najveći zajednički djelitelj brojeva $a i $b je $rez.</p>";
}
?>

</body>
</html>
