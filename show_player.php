<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 29.04.2019
 * Time: 08:15
 */

require_once "bootstrap.php";
$id = $argv[1];
$player = $entityManager->find('player', $id);

if ($player === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $player->getName());