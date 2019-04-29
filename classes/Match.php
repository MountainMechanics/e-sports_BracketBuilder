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
    public  $players = ["p1","p2"];
    private $scores = [0,0];
    private $matchID;


    /**
     * @OneToMany(targetEntity="Player", mappedBy="match")
     */
    public function __construct($playerindex){
        $this->matchID = Generator::generatePId("m",15);;

        $this->players[0] = Player::playerDummie($playerindex);
        $playerindex++;
        $this->players[1] = Player::playerDummie($playerindex);
    }

    public function winRound($player){

        for ($i = 0; $i < sizeof($this->players); $i++){
            if($player->is($this->players[$i])){
                $this->scores[$i]++;
                $this->players[$i]->score++;
            }
        }
    }

    public function declareMatchWinner(){
        if($this->scores[0] > $this->scores[1]){
            $this->players[0]->advanceRound();
            return $this->players[0];

        }else if($this->scores[0] < $this->scores[1]){
            $this->players[1]->advanceRound();
            return $this->players[1];
        }
        else{
            //fuck it i dont care who wins
            $this->players[rand(0,1)]->advanceRound();
            if($this->players[0]->getCurrRound() < $this->players[1]->getCurrRound()){
                return $this->players[0];
            }else{
                return $this->players[1];
            }
        }
    }

    public function setPlayers($p1, $p2){
        if($p1 instanceof Player && $p2 instanceof Player){
            $this->players[0]=$p1;
            $this->players[1]=$p2;
        }else{
            $this->players[0]=new Player($p1);
            $this->players[1]=new Player($p2);
        }
    }

    public function outputMatch(){
        echo "<div class='card card-anim matchInfo'>";
        echo "<span class='font-header'>".$this->players[0]->getName()." vs. ".$this->players[1]->getName(). "</span><br>";
        echo $this->scores[0]." : ".$this->scores[1]. "<br>";
        echo "</div>";
    }


    public function getMatchID(){
        return $this->matchID;
    }
}