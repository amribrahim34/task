<?php 

use HasGetInterface;
use HasGuessInterface;

class Play implements HasGetInterface ,HasGuessInterface {

    private $secret;

    public function __construct()
    {
        $this->secret  = apcu_fetch('secret') ?? rand(00000,99999);
        apcu_fetch('secret') ?? apcu_store('secret' , $this->secret);

    }
    
    public function get($secret , $guess)
    {
        $guess_array = str_split($guess);
        $secret_array = str_split($secret);
    }

    public function guess($guess)
    {

        //apcu_store()
    }

    private function make_guess_string ($guess)
    {
        $secret_array = str_split($this->secret);
        $guess_array = str_split($guess);
        $secret_string = '';
        $i = 0;
        foreach ($secret_array as $num) {
            $num == $guess[$i] ? $secret_string .= $num : $secret_string .= 0 ;
            $i++;
        }
        return $secret_string ;
    }

}

