<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 25.03.2019
 * Time: 11:09
 */

use BracketBuilder\Player;

require "bootstrap.php";

$newPlayerName = $_GET['name'];
echo "Player name: ".$newPlayerName;

$player = new Player($newPlayerName);

$entityManager->persist($player);
$entityManager->flush();
header('Content-Type: application/json');
echo json_encode($player);
