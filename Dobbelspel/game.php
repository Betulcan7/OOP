<?php

require_once 'Dice.php';

class Game {
    private $diceValues;
    private $throwCount;
    private $currentPlayer;
    private $playerScores;

    public function __construct() {
        $this->throwCount = 0;
        $this->currentPlayer = 1;
        $this->playerScores = array(1 => 0, 2 => 0);
    }

    public function play() {
        $this->throwCount++;
        $this->rollDice();
        $this->calculateScore();
        $this->switchPlayer();
    }

    private function rollDice() {
        $this->diceValues = array();
        for ($i = 0; $i < 6; $i++) {
            $dice = new Dice();
            $dice->throwDice();
            $this->diceValues[] = $dice->getFaceValue();
        }
    }

    private function calculateScore() {
        $totalScore = array_sum($this->diceValues);
        $this->playerScores[$this->currentPlayer] += $totalScore;
    }

    private function switchPlayer() {
        // Wissel naar de volgende speler (1 of 2)
        $this->currentPlayer = ($this->currentPlayer == 1) ? 2 : 1;
    }

    public function getThrowCount() {
        return $this->throwCount;
    }

    public function getDiceValues() {
        return $this->diceValues;
    }

    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    public function getPlayerScore() {
        return $this->playerScores[$this->currentPlayer];
    }
}

?>
