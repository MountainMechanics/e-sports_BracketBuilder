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
class Player implements \JsonSerializable
{
    /** @id @Column(type="string")**/
    protected $pId;

    /** @Column(type="string") **/
    private $name = "Test johnson";

    /** @Column(type="integer") **/
    private $currRound = 0;

    public $score = 0;

    /*
     * i do not need Many to one here because i will never need that information
    */
    // Functions ---------------------
    public function __construct($name)
    {
        $this->name = $name;
        $this->pId= Generator::generatePId("p",15);
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

    public function getScore()
    {
        return $this->score;
    }


    // Identification --------------------------------------------------

    public function is($player){
        return $this->pId === $player->pId;
    }

    public function getPlayerID(){
        return $this->pId;
    }

    //Player dummie ---------------------------

    public static function playerDummie($dummiename){
        return new Player("Dummy".$dummiename);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return array("name"=>$this->name,
                "pId"=>$this->pId,
                "currRound"=>$this->currRound,
                "score"=>$this->score);
    }
}