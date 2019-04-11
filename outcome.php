<?php
namespace BracketBuilder;
use Doctrine\ORM\Query\Expr\Math;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 25.03.2019
 * Time: 10:02
 */
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bracket Builder</title>
</head>
<body>
    <?php
    $size = 16;
    $gameManager = new Matchmaker($size);

    $matches = $gameManager->getMatches();

    if(isset($_GET["playerNames"])){
        $playerData = $_GET["playerNames"];
        $players = preg_split("/[\s,;-]+/",$playerData);
        $playerCount = sizeof($players);
        $gameManager = new Matchmaker($playerCount);
        foreach ($players as $player){
            $gameManager->addPlayer($player);
        }


        if(($playerCount & ($playerCount - 1)) == 0){
            echo "playerCount is a power of 2!<br>";
            $gameManager->generateMatches();
            $games = $gameManager->getMatches();

            foreach ($games as $game){
                $game->winRound($game->p1);
                $game->outputMatch();
            }
        }
    }else {
        echo "please enter some Player-names for generation";
    }

    /*
    randomizeScore($matches);


    function randomizeScore($matches){
        foreach ($matches as $match) {
            $rand = random_int(0, 1);
            switch ($rand) {
                case 0:
                    $match->winRound($match->p1);
                    break;

                case 1:
                    $match->winRound($match->p2);
                    break;
            }
            $match->outputMatch();
        }
    }
    */
    ?>
Some text that is there for a reason
</body>
</html>