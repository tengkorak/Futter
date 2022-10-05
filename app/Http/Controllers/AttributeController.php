<?php

namespace App\Http\Controllers;


//nak panggil trait

use App\Attribute;
use App\Http\Traits\PositioningTraits;
use Illuminate\Http\Request;
use App\Rating;

//panggil method dalam controller use PositioningTrait
//untuk gk before start game random generator. 

class AttributeController extends Controller
{

    use PositioningTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $pemain = auth()->user(); //nak display ape2 data user kne parse dulu
        $attributes = Attribute::all(); //ambik attribute current user
        // dd($attributes);
        
        //dd($attributes);
        return view ('attributes.index', compact('attributes','pemain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dekat sini algorithm
        return view ('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        //dd(auth()->user());

        

        $total = $request['pass'] + $request['defend'] + $request['physical'] + $request['dribbling'] + $request['pace'] + $request['shooting'] ;
        
        //dd($total);

        if($total < 10) //real data 180
        {
            return back()->with('constraints', 'Use all the points given'); //aik, bukan aku dah kata rapatkan ke 
        }

        $request->validate([

        'pass' => 'required' ,
        'defend' => 'required',
        'physical'=> 'required',
        'dribbling' => 'required',
        'pace' => 'required',
        'shooting' => 'required',
        
        
        ]);

        $attribute = Attribute::create([

            'user_id' => auth()->user()->id,
            'pass' => $request['pass'] ,
            'defend' => $request['defend'] ,
            'physical' => $request['physical'] ,
            'dribbling' => $request['dribbling'] ,
            'pace' => $request['pace'] ,
            'shooting' => $request['shooting'] ,
            
        ]);

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
        
        // $rating = Rating::create([
        //     'user_id' => auth()->user()->id, // only current user can create game
        //     'defender' => $def,
        //     'right_wing' => $rw,
        //     'left_wing' => $lw,
        //     'striker'=> $st,
                    
        // ]);

        $rating= Rating::where('user_id', auth()->user()->id)->first();
        $rating->defender = $def;
        $rating->right_wing = $rw;
        $rating->left_wing = $lw;
        $rating->striker = $st;

        $rating->save();

        // $rating = Rating::update([
        //     'user_id' => auth()->user()->id, // only current user can create game
        //     'defender' => $def,
        //     'right_wing' => $rw,
        //     'left_wing' => $lw,
        //     'striker'=> $st,                    
        // ]);

        //return redirect('attributes');
        return view('attributes.show', compact('attribute', 'rating'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute, Rating $rating)
    {
        //
        $users= $attribute->users;
        //id dkt parameter method so find($id) kirenya function tu akan kasi users yg dah join game based on id kau send
        //dd($game->users); //ambik users based on game id
        return view('attributes.show', compact('attribute', 'users', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        //kita pass id user, pastu dapatkan attribute bagi user tu
        //tp tak leh edit, sbb kau pakai resources. so pass dari nav terus.
        // dd("jadi");
        // dd($attribute);
        abort_if($attribute->user_id != auth()->id(), 403);
        $attributes = auth()->user()->attributes;
        // dd($attributes);
        $pemain = auth()->user();
        //dd($attributes);
  

        //abort_if($attribute->user_id != auth()->id(), 403);
        return view ('attributes.edit',compact ('attributes','pemain'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        //
    }

    // Method untuk complexity
    //Coefficient (FC)
    //pick attribute ada point limit
    //save, then will be recommended top 2 position
    //player position = gk, center defend, left wing, right wing, forward
    //dd($request);
    //validation code
    //dekat join controller ke attribute controller
    //guna method PositioningTrait dalam controller

    
}
