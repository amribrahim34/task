<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Interfaces\HasGetResultInterface;
use App\Interfaces\HasGuessInterface;
use App\Models\Game;
use Illuminate\Http\Request;


class GameController extends Controller implements HasGetResultInterface , HasGuessInterface
{
    public function serve_view()
    {
        $g = $this->create_or_get_game();
        return view('welcome' ,['game' => $g]);
    }

    public function handle_request(StoreGameRequest $request)
    { 
        $v = $request->validated();
        $g = $this->create_or_get_game();
        $str= $this->get_result($g->computer_secret , $v['computer_secret']);
        isset($v['guess']) ? $this->guess($v['guess']) : '';
        $g->update(['guess_string' => $str]);
        $g->increment('num_of_guesses');
        return redirect(route('home'));
    }

    public function get_result ($computer_secret ,$guess)
    {
        $computer_secret_array = str_split($computer_secret);
        $guess_array = str_split($guess);
        $secret_string = null;
        $rightNumArr = [];
        $i = 0;
        foreach ($guess_array as $num) {
            if ($num == $computer_secret_array[$i]) {
                $secret_string .= '*';
                $rightNumArr[]=$num;
            }else{
                if (in_array($num,$computer_secret_array) && !in_array($num , $rightNumArr)) {
                    $secret_string .= '.';
                }
            }
            $i++;
        }
        return $secret_string ;
    }

    public function guess($player_string = null)
    {
        $g = Game::get()->first();
        $ply_str_arr = str_split($player_string);
        $ply_sec = $g->player_secret;
        $rightNumArr = [];
        $str = null;
        for ($i=0; $i < 5; $i++) { 
            $ps = $ply_str_arr[$i] ?? null;
            $s = $ply_sec[$i];
            if($ps == '*' ){
                $str .= $s;
                $rightNumArr[]=$ps ;
            }else{
                if ($ps  == '.' & !in_array($ps  , $rightNumArr)) {
                    $gn = $this->get_random_number($rightNumArr);
                    $str .= $gn;
                }else{
                    $str .= $this->get_random_number($rightNumArr);
                }
            }
        }
        is_null($str) ? '' :$g->update(['player_secret'=>$str]);
    }

    private function create_or_get_game()
    {
        $g = Game::get()->first();
        if (!$g) {
            $s = rand(00000,99999);
            $ps = rand(00000,99999);
            $g = Game::create([
                'player_secret'=>$ps,
                'computer_secret'=>$s,
            ]);
        }
        return $g;
    }

    private function get_random_number($right_number)
    {
        $player_sercret = Game::get()->first()->player_secret;
        $ply_str_arr = str_split($player_sercret);
        do {
            $rand = array_rand($ply_str_arr);
        } while (in_array($rand , $right_number) & $rand != 'k');
        is_null($rand) ? $rand = rand(0,9) : '';
        return $rand;
    }
    
    
}
