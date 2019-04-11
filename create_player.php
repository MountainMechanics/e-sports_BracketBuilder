<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 25.03.2019
 * Time: 11:09
 */

use BracketBuilder\Player;

require "bootstrap.php";

$newPlayerName = $argv[1];
echo "Player name: ".$newPlayerName;

$player = new Player($newPlayerName);

$entityManager->persist($player);
$entityManager->flush();

echo "Created Player
with Name " . $player->getName() . "\n";
