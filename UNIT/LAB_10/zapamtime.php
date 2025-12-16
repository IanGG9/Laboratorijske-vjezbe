<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    pohraniInfo();
} elseif (isset($_GET["action"]) && $_GET["action"] === "zaboravi") {
    zaboraviInfo();
} else {
    prikaziStranicu();
}

function pohraniInfo()
{
    if (isset($_POST["ime"])) {
        setcookie("ime", $_POST["ime"], time() + 60 * 60 * 24 * 365, "", "", false, true);
    }

    if (isset($_POST["lokacija"])) {
        setcookie("lokacija", $_POST["lokacija"], time() + 60 * 60 * 24 * 365, "", "", false, true);
    }

    header("Location: zapamtime.php");
    exit;
}

function zaboraviInfo()
{
    setcookie("ime", "", time() - 3600, "", "", false, true);
    setcookie("lokacija", "", time() - 3600, "", "", false, true);

    header("Location: zapamtime.php");
    exit;
}

function prikaziStranicu()
{
    $ime = isset($_COOKIE["ime"]) ? $_COOKIE["ime"] : "";
    $lokacija = isset($_COOKIE["lokacija"]) ? $_COOKIE["lokacija"] : "";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Pamćenje informacija korisnika pomoću kolačića</title>
    </head>

    <body>

        <?php if ($ime || $lokacija) { ?>
            <p>
                Bok, <?php echo $ime ? $ime : "neznani posjetitelju"; ?>
                <?php echo $lokacija ? " iz mjesta $lokacija" : ""; ?>!
            </p>
            <p><a href="zapamtime.php?action=zaboravi">Zaboravi moje podatke!</a></p>
        <?php } else { ?>
            <form method="post" action="zapamtime.php">
                <p>
                    Ime:
                    <input type="text" name="ime">
                </p>
                <p>
                    Lokacija:
                    <input type="text" name="lokacija">
                </p>
                <p>
                    <input type="submit" value="Pošalji info">
                </p>
            </form>
        <?php } ?>

    </body>

    </html>
<?php
}
?>
