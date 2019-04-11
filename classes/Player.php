<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 04.03.2019
 * Time: 11:01
 */
namespace BracketBuilder;

/**
 * @Entity @Table(name="player")
 **/
class Player
{
    /** @id @Column(type="string")**/
    protected $pId;

    /** @Column(type="integer") **/
    private $dummiecounter = 0;

    /** @Column(type="string") **/
    private $name = "Test johnson";

    /** @Column(type="integer") **/
    private $currRound = 0;

    // Functions ---------------------
    /**
     * @ManyToOne(targetEntity="Match", inversedBy="players")
     */
    //has information about the match the user is placed in
    private $match;
    public function __construct($name)
    {
        $this->name = $name;
        $this->setPId();
    }

    public function getName(){
        return $this->name;
    }

    public function getCurrRound(){
        return $this->currRound;
    }

    public function advanceRound(){
        $this->currRound++;
    }

    public function setPlayerDetails($name){ // To replace dummies with player data
        $this->name = $name;
    }


    // Identification --------------------------------------------------
    private function setPId(){
        $this->pId = uniqid();
    }

    public function is($player){
        return $this->pId === $player->pId;
    }

    //Player dummie ---------------------------

    public static function playerDummie($dummiename){
        return new Player("Dummy".$dummiename);
    }
}