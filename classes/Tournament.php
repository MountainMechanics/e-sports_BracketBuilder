<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 28.04.2019
 * Time: 13:59
 */

namespace BracketBuilder;


class Tournament
{
    private $pId;
    private $size = 0;
    private $name = "";
    private $matcher;

    public function __construct($name, $size){
        $this->pId= Generator::generatePId("t",15);
        $this->size = $size;
        $this->name = $name;
    }
}