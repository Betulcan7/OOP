<?php

require_once 'Game.php';

$game = new Game();

if (isset($_POST['new_game'])) {
    $game = new Game();
}

if (isset($_POST['throw_dice'])) {
    $game->play();
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobbelspel</title>
    <style>
        .dice {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 1px solid black;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            font-size: 24px;
        }
    </style>
</head>
<body>

<h1>Dobbelspel</h1>

<form method="post">
    <select name="player">
        <option value="1">Speler 1</option>
        <option value="2">Speler 2</option>
    </select>
    <input type="submit" name="new_game" value="Nieuw spel">
</form>

<form method="post">
    <input type="submit" name="throw_dice" value="Werp">
</form>

<?php
if ($game->getThrowCount() > 0) {
    echo "<h2>Resultaat van worp " . $game->getThrowCount() . ":</h2>";
    echo "<div>";
    foreach ($game->getDiceValues() as $value) {
        echo "<div class='dice'>" . $value . "</div>";
    }
    echo "</div>";
}
?>

<?php
if ($game->getThrowCount() > 0) {
    echo "<h2>Score:</h2>";
    echo "<p>Score van speler " . $game->getCurrentPlayer() . ": " . $game->getPlayerScore() . "</p>"; // Hier is de toevoeging
}
?>

</body>
</html>
