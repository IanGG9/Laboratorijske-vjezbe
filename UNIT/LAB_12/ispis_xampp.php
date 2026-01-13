<?php
$dir = "C:\\xampp";

if (!is_dir($dir)) {
    die("Direktorij ne postoji: $dir");
}

$stavke = scandir($dir);

echo "<h3>Sadržaj direktorija: $dir</h3>";
echo "<ul>";

foreach ($stavke as $s) {
    if ($s === "." || $s === "..") continue;

    $punaPutanja = $dir . "\\" . $s;

    if (is_file($punaPutanja)) {
        echo "<li>$s</li>";
    }
}

echo "</ul>";
?>

