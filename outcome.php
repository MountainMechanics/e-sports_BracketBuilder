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
    <link rel="stylesheet" href="css/basic.css"/>
    <link rel="stylesheet" href="css/form.css"/>
    <meta charset="UTF-8">
    <title>Bracket Builder</title>
</head>
<body class="font-basic allContent">
    <?php
    $size = 16;
    $gameManager = new Matchmaker($size);

    $matches = $gameManager->getMatches();

    if(isset($_GET["playerNames"])){
        $playerData = $_GET["playerNames"];
        $playerStringA = preg_split("/[\s,;-]+/",$playerData);
        $players = array();
        foreach ($playerStringA as $pS){
            array_push($players, new Player($pS));
        }

        $playerCount = sizeof($players);
        $gameManager = new Matchmaker($playerCount);
        foreach ($players as $player){
            $gameManager->addPlayer($player);
        }

        if($playerCount === 1){
            echo "<div id='winner' class='center-on-screen card'><span class='font-header'>".$players[0]->getName()."</span><br>"."WON!<br>
                    <a href='creator.php'><button class='btn-submit nextGenB'>Back to creator</button></a>
                  </div>";
        }elseif (!($playerCount & ($playerCount - 1)) == 0){
            echo "<br><a href='creator.php'><button class='btn-submit nextGenB'>Back to creator</button></a>";
        }
        else{
            if(($playerCount & ($playerCount - 1)) == 0){
                //echo "playerCount is a power of 2!<br>";
                foreach ($players as $player){

                }
                $gameManager->generateMatches();
                $games = $gameManager->getMatches();

                foreach ($games as $game){
                    $game->winRound($game->players[1]);
                    $game->outputMatch();
                }
            }


            //---- next iteration here
            $nextRound = $gameManager->filterWinners($gameManager->getMatches());
            $linkString = generateString($nextRound);

            echo "
                <a href='http://localhost/esports_BracketBuilder/outcome.php?playerNames=".$linkString."'>
                    <button class='btn-warning nextGenB'>
                        Generate next round
                    </button>
                </a>
                    ";
        }
    }else {
        echo "please enter some Player-names for generation";
    }


    function generateString ($players){
        $resultString ="";
        $spacingCode = "%0D%0A";
        for ($i = 0; $i < sizeof($players); $i++){
            if($i === sizeof($players)-1){
                $resultString .= $players[$i]->getName();
            }else{
                $resultString .= $players[$i]->getName()."". $spacingCode;
            }
        }
        return $resultString;
    }



    /**
    * Proof uniqid() is garbage

    for ($i = 0;$i<20;$i++){
        echo uniqid()."\r\n";
    }
*/
    ?>
</body>
</html>