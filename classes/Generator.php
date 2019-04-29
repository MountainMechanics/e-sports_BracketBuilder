<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 28.04.2019
 * Time: 14:01
 */

namespace BracketBuilder;


class generator
{


    public static function generatePId($prefix,$length){
        /*the normal uniqid() is complete garbage, it generates a lot of equal strings (look at outcome.php for proof)
         * so i made my own
        */
        $rand = random_int(0,1);
        if($rand === 0){
            return $prefix."_r1".random_int(100,499)."b".substr(bin2hex(random_bytes(ceil($length/2))),0,$length);
        }
        else{
            return $prefix."_r2".random_int(500,999)."b".substr(bin2hex(random_bytes(ceil($length/2))),0,$length);
        }
    }
}