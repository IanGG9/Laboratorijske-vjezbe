<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    pohraniSesiju();
} elseif (isset($_GET["action"]) && $_GET["action"] === "zaboravi") {
    zaboraviSesiju();
} else {
    prikaziStranicu();
}

function pohraniSesiju()
{
    if (isset($_POST["ime"])) {
        $_SESSION["ime"] = $_POST["ime"];
    }

    if (isset($_POST["lokacija"])) {
        $_SESSION["lokacija"] = $_POST["lokacija"];
    }

    header("Location: zapamti.php");
    exit;
}

function zaboraviSesiju()
{
    session_unset();
    session_destroy();

    header("Location: zapamti.php");
    exit;
}

function prikaziStranicu()
{
    $ime = isset($_SESSION["ime"]) ? $_SESSION["ime"] : "";
    $lokacija = isset($_SESSION["lokacija"]) ? $_SESSION["lokacija"] : "";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Pamćenje informacija pomoću sesije</title>
    </head>

    <body>

    <?php if ($ime || $lokacija) { ?>
        <p>
            Bok, <?php echo $ime ? $ime : "neznani posjetitelju"; ?>
            <?php echo $lokacija ? " iz mjesta $lokacija" : ""; ?>!
        </p>
        <p><a href="zapamti.php?action=zaboravi">Zaboravi moje podatke!</a></p>
    <?php } else { ?>
        <form method="post" action="zapamti.php">
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