<?php
use BracketBuilder\Player;
require_once "bootstrap.php";

$playerRepository = $entityManager->getRepository('player');
$players = $playerRepository->findAll();

foreach ($players as $player) {
    echo sprintf("-%s\n", $player->getName());
}