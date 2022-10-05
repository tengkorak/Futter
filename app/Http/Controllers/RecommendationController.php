<?php

namespace App\Http\Controllers;
use App\Http\Traits\PositioningTraits;
use App\Http\Controllers\Rule;
use App\Rating;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    use PositioningTraits;

    //Calculation 
    public function recommendation(){

        $recomend = $this->returnRatings();

        foreach($recomend as $rec){

            if(key($rec) == "defender"){
                $def = current($rec);
            }
            elseif(key($rec) == "rightWing"){
            $rw = current($rec);
            }
            elseif(key($rec) == "leftWing"){
            $lw = current($rec);
            }
            elseif(key($rec) == "striker"){
            $st = current($rec);
            }
        }
        //dd($st);
        
        $rating = Rating::create([
            'user_id' => auth()->user()->id, // only current user can create game
            'defender' => $def,
            'right_wing' => $rw,
            'left_wing' => $lw,
            'striker'=> $st,
                    
        ]);
        //dd($recomends); //return method dri trait

        return view('games.arrange', compact('recomends'));
    }


}
