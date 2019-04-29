<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 04.03.2019
 * Time: 11:08
 */

namespace BracketBuilder;
/**
 * INFO: https://de.wikipedia.org/wiki/K.-o.-System
 */

class Matchmaker
{
    private $player=array(), $matches=array(), $playerindex = 0, $size = 0;

    public function __construct($size)
    {
        if(($size & ($size - 1)) == 0){ //if $size is a power of 2
            $this->size = $size;
            $this->prepareMatches();

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

    public function prepareMatches(){
        $this->matches = array();
        for ($i=0; $i < $this->size/2; $i++){
            array_push($this->matches,new Match($this->playerindex));
            $this->playerindex +=2;
        }
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


    // here i worry about generating the next iteration of matches ----------------------------------------------------
    public function filterWinners($matches){
        $winnerA = array();
        foreach ($matches as $m){
            array_push($winnerA,$m->declareMatchWinner());
        }

        return $winnerA;
    }

    public function generateNextIteration(){
        $this->player = $this->filterWinners($this->player);
        $this->size = sizeof($this->player);
        $this->prepareMatches();
        $this->generateMatches();
    }

/*
    public function giveBye($player){
        $player->advanceRound();
    }
*/
}