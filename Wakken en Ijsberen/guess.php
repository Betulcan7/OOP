<?php


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleert of de worpen zijn opgeslagen in de sessie
    if (isset($_SESSION['throws'])) {
        // Ontvangt geraden waarden
        $guessWakken = isset($_POST['guess_wakken']) ? intval($_POST['guess_wakken']) : 0;
        $guessIjsberen = isset($_POST['guess_ijsberen']) ? intval($_POST['guess_ijsberen']) : 0;
        $guessPinguins = isset($_POST['guess_pinguins']) ? intval($_POST['guess_pinguins']) : 0;

        // Haalt het laatste worpresultaat op uit de sessie
        $lastThrow = end($_SESSION['throws']);
        $wakken = isset($lastThrow['wakken']) ? $lastThrow['wakken'] : 0;
        $ijsberen = isset($lastThrow['ijsberen']) ? $lastThrow['ijsberen'] : 0;
        $pinguins = isset($lastThrow['pinguins']) ? $lastThrow['pinguins'] : 0;

        // Controleert of de gok correct is
        $correctWakken = ($guessWakken == $wakken);
        $correctIjsberen = ($guessIjsberen == $ijsberen);
        $correctPinguins = ($guessPinguins == $pinguins);

        // Toont feedback aan de gebruiker
        if ($correctWakken && $correctIjsberen && $correctPinguins) {
            $message = "Goed geraden! Je hebt het juiste aantal wakken, ijsberen en pinguïns geraden.";
        } else {
            $message = "Helaas fout. Probeer het opnieuw.";
        }
    } else {
        // Als er geen worpen zijn opgeslagen in de sessie, terug naar het spel
        header("Location: play.php");
        exit;
    }
} else {
    // Als het formulier niet is ingediend, terug naar het spel
    header("Location: play.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobbelspel - Feedback</title>
</head>
<body>
    <h1>Dobbelspel - Feedback</h1>
    <p><?php echo $message; ?></p>
    <p>Oplossing:</p>
    <p>Aantal wakken: <?php echo $wakken; ?></p>
    <p>Aantal ijsberen: <?php echo $ijsberen; ?></p>
    <p>Aantal pinguïns: <?php echo $pinguins; ?></p>
</body>
</html>
