<?php

namespace TennisGame;

class TennisGame {
  const POINTS = array(0, 15, 30, 40);

  const ADVANTAGE = 1;

  private $player1;
  private $player2;
  private $player1_score;
  private $player2_score;

  public function __construct() {
    $this->player1 = 'Joe';
    $this->player2 = 'Bob';
    $this->player1_score = 0;
    $this->player2_score = 0;
  }

  public function getPlayer($player) {
    return $this->$player;
  }

  public function getPlayerScore($player) {
    $player_score = $player . '_score';
    return $this->$player_score;
  }

  public function getPlayerPoints($player) {
    $player_score = $player . '_score';

    if (!array_key_exists($this->$player_score, self::POINTS)) {
      return FALSE;
    }

    return self::POINTS[$this->$player_score];
  }

  public function getOpposingPlayer($player) {
    if ($player == 'player1') {
      return 'player2';
    }
    else {
      return 'player1';
    }
  }

  public function playerWinPoint($player) {
    $score = $this->getPlayerScore($player) + 1;
    $this->setPlayerScore($player, $score);
  }

  public function setPlayerScore($player, $score) {
    $player_score = $player . '_score';
    $this->$player_score = $score;
  }

  public function isPlayerWinGame($player) {
    $opposing_player = $this->getOpposingPlayer($player);
    
    return (($this->getPlayerScore($player) - $this->getPlayerScore($opposing_player) >= 2) 
      && $this->getPlayerScore($player) >= 4);
  }

  public function areBothPlayersDeuce() {
    return (($this->getPlayerScore('player1') - $this->getPlayerScore('player2')) == 0 
      && $this->getPlayerScore('player1') >= 3 && $this->getPlayerScore('player2') >= 3);
  }

  public function hasPlayerAdvantageAndGameBall($player) {
    $opposing_player = $this->getOpposingPlayer($player);
    if ($player == 'player1') {
      return (($this->getPlayerScore($player) - $this->getPlayerScore($opposing_player)) == self::ADVANTAGE);
    }
    else {
      return (($this->getPlayerScore($opposing_player) - $this->getPlayerScore($player)) == self::ADVANTAGE);
    }
  }
}