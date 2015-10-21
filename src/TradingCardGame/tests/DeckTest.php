<?php

namespace TradingCardGame\Tests;

use TradingCardGame\Deck;

class testDeck extends \PHPUnit_Framework_TestCase {

  const INIT_NUMBER_CARDS = 20;

  public $deck;

  public function setUp() {
    $this->deck = new Deck();  
  }

  public function tearDown() {
    unset($this->deck);
  }

  public function testDeckTwentyCards() {
    $this->assertEquals($this->deck->getNumberOfCards(), self::INIT_NUMBER_CARDS);
  }

  public function testExtractCardFromDesk() {
    $example_key_card = 1; 

    $this->deck->extractCard($example_key_card);
    $this->assertEquals($this->deck->getNumberOfCards(), self::INIT_NUMBER_CARDS - 1);
  }

}