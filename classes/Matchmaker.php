<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 04.03.2019
 * Time: 11:08
 */

namespace BracketBuilder;
/**
 * TODO: let people replace themselves with dummies (random dummy) (change properties)
 * INFO: https://de.wikipedia.org/wiki/K.-o.-System
 */

class Matchmaker
{
    private $player=array(), $matches=array(), $playerindex = 0;

    public function __construct($size)
    {
        if(($size & ($size - 1)) == 0){ //if $size is a power of 2
            for ($i=0; $i < $size/2; $i++){
                array_push($this->matches,new Match($this->playerindex));
                $this->playerindex +=2;
            }
        }else{
            echo "please select a number of players that is a power of 2 (2,4,8,16...)";
        }
    }

    public function getMatches(){
        return $this->matches;
    }

    public function addPlayer($player){
        array_push($this->player,$player);
    }

    public function generateMatches(){
        $counter1 = 0;
        $counter2 = 1;
        shuffle($this->player);

        for($i=0; $i < sizeof($this->matches); $i++){
            $this->matches[$i]->setPlayers($this->player[$counter1],$this->player[$counter2]);
            $counter1+=2;
            $counter2+=2;
        }
    }

/*
    public function giveBye($player){
        $player->advanceRound();
    }
*/
}