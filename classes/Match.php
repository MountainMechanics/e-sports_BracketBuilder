<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 18.03.2019
 * Time: 10:13
 */

namespace BracketBuilder;


class Match
{
    public $p1, $p2;
    private $scoreP1 = 0, $scoreP2 = 0;


    /**
     * @OneToMany(targetEntity="Player", mappedBy="match")
     */
    public function __construct($playerindex){
        $this->p1 = Player::playerDummie($playerindex);
        $playerindex++;
        $this->p2 = Player::playerDummie($playerindex);
    }

    public function winRound($player){
        if($player->is($this->p1)){
            $this->scoreP1++;
        }
        else if($player->is($this->p2)){
            $this->scoreP2++;
        }
        else{
            echo "Player is not in this match -> can´t win round";
        }
    }

    public function winMatch($player){
        if($player->is($this->p1) || $player->is($this->p2)){
            $player->advanceRound();
            $this->scoreP1 = 0;
            $this->scoreP2 = 0;
        }
        else{
            echo "Player is not in this match -> can´t win match";
        }
    }

    public function setPlayers($p1, $p2){
        $this->p1=new Player($p1);
        $this->p2=new Player($p2);
    }

    public function outputMatch(){
        echo $this->p1->getName()." vs. ".$this->p2->getName(). "<br>";
        echo $this->scoreP1." : ".$this->scoreP2. "<br>";
        echo "<hr>";
    }
}