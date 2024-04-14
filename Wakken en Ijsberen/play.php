<?php


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of het aantal dobbelstenen is ingevuld
    if (isset($_POST['dice_count'])) {
        $diceCount = intval($_POST['dice_count']);
        // Maakt willekeurige worpen voor het opgegeven aantal dobbelstenen
        $throws = [];
        for ($i = 0; $i < $diceCount; $i++) {
            $throws[] = rand(1, 6);
        }

        // Sla de worpen op in de sessie
        $_SESSION['throws'] = $throws;
    } else {
        // Als het aantal dobbelstenen niet is ingevuld, terug naar de keuze pagina
        header("Location: index.php");
        exit;
    }
} else {
    // Als het formulier niet is ingediend, terug naar de keuze pagina
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobbelspel - Resultaat</title>
</head>
<body>
    <h1>Dobbelspel - Resultaat</h1>
    <p>Resultaat van de worpen:</p>
    <?php foreach ($throws as $throw) : ?>
        <img src="dice_<?php echo $throw; ?>.png" alt="Dobbelsteen <?php echo $throw; ?>">
    <?php endforeach; ?>
    <form action="guess.php" method="post">
        <label for="guess_wakken">Raad het aantal wakken:</label>
        <input type="number" id="guess_wakken" name="guess_wakken" min="0" required><br>
        <label for="guess_ijsberen">Raad het aantal ijsberen:</label>
        <input type="number" id="guess_ijsberen" name="guess_ijsberen" min="0" required><br>
        <label for="guess_pinguins">Raad het aantal pinguïns:</label>
        <input type="number" id="guess_pinguins" name="guess_pinguins" min="0" required><br>
        <button type="submit">Raad</button>
    </form>
</body>
</html>
