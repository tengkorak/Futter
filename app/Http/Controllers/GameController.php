<?php

namespace App\Http\Controllers;

use App\Community;
use App\Court;
use App\Game;
use App\Http\Traits\PositioningTraits;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    use PositioningTraits;
    //index method
    public function index()
    {
        $games = Game::all(); 
        //select * from projects where owner_id = 4
        
        //Forecast thingy
        $courts = Court::all();
        $forecast = [];
        return view('games.index', compact('games', 'forecast','courts'));
    }

    //Create method
    public function create(Game $game)
    {
        //dd('create');
        
        $communities = Community::all();
        $courts = Court::all();

        return view('games.create', compact('communities', 'courts'));
    }

    public function createMulti(Game $game)
    {
        //dd('create');

        return view('games.createMulti');
    }

    //Store method
    public function store(Request $request)
    {
        //dd($request['communityId1']);
        //dd($request->all());
        //coding untuk validate form kita, contoh nak date after or equal
        
        $request->validate([
            'match_title' => 'required|unique:games',
            'date_time' => 'required|after_or_equal:now',
            'amount' => 'required',
            'communityId1'=>'required',
            'communityId2'=>'required|different:communityId1'
        ]);
            

        $game = Game::create([
            
            'user_id' => auth()->user()->id, // only current user can create game
            'match_title' => $request['match_title'],
            'date_time' => $request['date_time'],
            'amount' => $request['amount'],
            'total_players'=> 1,
            'court_id' => $request['courtId'],
                    
        ]);

        $user = auth()->user();
        //dd($user);
        
       // $com1 = Community::find($request['communityId1']);//attach community pertama
        //dd($com1);

        //$players = $com1->users;
        
        $game->communities()->attach($request['communityId1']); 
        $game->communities()->attach($request['communityId2']); 
        $user->games()->attach($game->id);

        return redirect("games");
        
    }

    public function test(){

 
        $highestDefender = [];
        $highestRw =[];
        $highestLw =[];
        $highestStriker =[];

        // foreach($players as $player){
        //     //dd($player->rating>defender);
        //     $highestDefender[$player->name] = $player->rating->defender;
        //     $highestRw[$player->name] = $player->rating->right_wing;
        //     $highestLw[$player->name] = $player->rating->left_wing;
        //     $highestStriker[$player->name] = $player->rating->striker;
        // }

        arsort($highestDefender);
        arsort($highestRw);
        arsort($highestLw);
        arsort($highestStriker);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game) 
    {
        
        // $games = Game::all();//aq panggil mcm ni , tapi tak proper sebab dia panggil semua user aq nk dia panggil user yg dh join jer
        $users= $game->users;
        //id dkt parameter method so find($id) kirenya function tu akan kasi users yg dah join game based on id kau send
        //dd($game->users); //ambik users based on game id
        //dd($game); 
        return view ('games.show', compact('game','users'));
    }


    public function edit(Game $game)
    {
        //
         abort_if($game->user_id != auth()->id(), 403); //dia nk check klau bukan user yg create takleh access
         return view ('games.edit',compact ('game')); 
    }


    public function update(Request $request, Game $game)
    {
  
    }


    public function destroy(Game $game)
    {
        
        $game->delete();

        abort_if($game->user_id != auth()->id(), 403); //dia nk check klau bukan user yg create takleh access
        return redirect()->route('games.index') ->with('success', 'Game delete successful');
    }

    public function find(){

        //$games = Game::all(); 

        $games = DB::table('games')->where('user_id', '!=', auth()->user()->id)->get();
        $courts = Court::all();
        
        // dd($games);

        //select * from projects where owner_id = 4

        return view('games.find', compact('games','courts'));
    }

    public function join(Game $game)
    {
        $user = auth()->user();

        //dd($game->community);
       
            //Dia nak check community tu community dalam game ke tak
            //dd($user->communities[0]["community_name"]);
            if($user->communities[0]["community_name"] != $game->communities[0]["community_name"] and
            $user->communities[0]["community_name"] != $game->communities[1]["community_name"]
            )//juve not equal acmilan or juve
            { 
                return back()->with('different', 'Awak bukan community yg boleh join');
            } 
      
        //@if($user->communities[0] != $game)
        
        //klau game tu dh penuh dia takleh join
        if($game->total_players >= 12)
        {
            return back()->with('penuh', 'this match is already full'); //return session full
        }

        $game->total_players = $game->total_players + 1;
        $game->save();
        $user->games()->attach($game->id);// attach biasa lepas game

        return redirect("games");

        //logic dia check game dia ambik, count cukup 10 ke tak klau lebih dia abort       
        // $user->games()->attach($game->id); //dia create dia auto join  
    }

    public function arrange(Game $game, Community $community1, Community $community2)
    {
        //dd($community2);
        //$games = DB::table('games')->where('user_id', '!=', auth()->user()->id)->get();
        // dd($game->users->first());

        $comm1checkplayerexist = false;
        $comm2checkplayerexist = false;

        foreach($game->users as $user) {
            foreach ($community1->users as $player1)
            {
                if($user->id == $player1->id)
                {
                    $comm1checkplayerexist = true;
                }
            }

            foreach ($community2->users as $player2)
            {
                if($user->id == $player2->id){
                    $comm2checkplayerexist = true;
                }
            }
        }

        if(!$comm1checkplayerexist || !$comm1checkplayerexist)
        {
            return redirect()->back()->withErrors('Must have at least one player in each community');
        }


        $highestDefender1 = [];
        $highestRw1 =[];
        $highestLw1 =[];
        $highestStriker1 =[];

        //dd($community1->users[1]->rating);
        foreach ($community1->users as $player)
        {
            foreach($game->users as $user) {

                if($user->id == $player->id){
                    //var_dump($player->rating);
                    $highestDefender1[] = $player->name." [".$player->rating->defender."]";
                    $highestRw1[] = $player->name." [".$player->rating->right_wing."]";
                    $highestLw1[] = $player->name." [".$player->rating->left_wing."]";
                    $highestStriker1[] = $player->name." [".$player->rating->striker."]";
                    }
            }
        }

        $namaTeam1=$community1->community_name;
        //dd($namaTeam1);

        $highestDefender2 = [];
        $highestRw2 =[];
        $highestLw2 =[];
        $highestStriker2 =[];

        foreach ($community2->users as $player)
        {
            ($player->rating);
            foreach($game->users as $user) {

                if($user->id == $player->id){           
            $highestDefender2[] = $player->name." [".$player->rating->defender."]";
            $highestRw2[] = $player->name." [".$player->rating->right_wing."]";
            $highestLw2[] = $player->name." [".$player->rating->left_wing."]";
            $highestStriker2[] = $player->name." [".$player->rating->striker."]";
                }
            }
        }

        $namaTeam2=$community2->community_name;
        //dd($namaTeam2);
        
        arsort($highestDefender1);//ini array
        arsort($highestRw1);
        arsort($highestLw1);
        arsort($highestStriker1);


        $team1Data = [];
        for($i=0; $i< count($highestDefender1); $i++)
        {
            $team1Data[$i] = array($highestDefender1[$i],$highestRw1[$i],$highestLw1[$i],$highestStriker1[$i]);
        }

        arsort($highestDefender2);//ini array
        arsort($highestRw2);
        arsort($highestLw2);
        arsort($highestStriker2);

        $team2Data = [];
        for($i=0; $i< count($highestDefender2); $i++)
        {
            $team2Data[$i]=array($highestDefender2[$i],$highestRw2[$i],$highestLw2[$i],$highestStriker2[$i]);
        }

        //dd($highestDefender);
        // return view('games.arrange', compact('highestDefender1','highestRw1','highestLw1', 'highestStriker1', 'highestDefender2', 'highestRw2', 'highestLw2', 'highestStriker2'));
        //dd($team1Data);
        return view('games.arrange', compact('team1Data','team2Data' ,'namaTeam1', 'namaTeam2')); 
        
    }

    public function finish(){
        return view('games.finish');
    }
}

//buat column bru pasal total player
//create field jadi 1 