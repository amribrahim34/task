<?php 

use HasGetInterface;
use HasGuessInterface;

class Play implements HasGetInterface ,HasGuessInterface {

    private $computer_secret;

    public function __construct()
    {
        $this->computer_secret  = apcu_fetch('computer_secret') ?? rand(00000,99999);
        apcu_fetch('computer_secret') ?? apcu_store('computer_secret' , $this->computer_secret);

    }
    
    public function get($secret , $guess)
    {
        return $this->make_guess_string($guess);
        $guess_array = str_split($guess);
        $secret_array = str_split($secret);
    }

    public function guess($player_string = null)
    {
        if ($player_string == null) {
            $s = rand(00000,99999)
            apcu_store('player_secret' , $s);
            return $s;
        }else{

        }
    }

    private function make_computer_guess($player_string)
    {
        $arr = str_split($player_string);
        $ply_sec = apcu_fetch('computer_secret');
        $rightNumArr = [];
        $str = '';
        $i = 0;
        foreach ($arr as  $itm) {
            if($itm == '*' ){
                $str .= $ply_sec[$i];
                $rightNumArr[]=$itm;
            }else{
                if ($itm == '.' & !in_array($itm , $rightNumArr)) {
                    //make a guess for the dot 
                }else{
                    $str .= $arr[$i];
                }
            }
            $i++;
        }
    }

    private function make_guess_string ($guess)
    {
        $computer_secret_array = str_split($this->computer_secret);
        $guess_array = str_split($guess);
        $secret_string = '';
        $rightNumArr = [];
        $i = 0;
        foreach ($computer_secret_array as $num) {
            if ($num == $guess_array[$i]) {
                $secret_string .= $num;
                $rightNumArr[]=$num;
            }else{
                if (in_array($num,$computer_secret_array) & !in_array($num , $rightNumArr)) {
                    $secret_string .= '.' ;
                }else{
                    $secret_string .= 0 ;
                }
            }
            $i++;
        }
        return $secret_string ;
    }

}

