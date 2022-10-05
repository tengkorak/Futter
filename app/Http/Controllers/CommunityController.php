<?php

namespace App\Http\Controllers;

use App\Community;
use App\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all();
        //select * from community

        return view('communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('create')

        return view ('communities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request)

        $request->validate([
            'community_name' => 'required'
        ]);

        $communities = Community::Create([
            'user_id'=> auth()->user()->id,
            'community_name' => $request['community_name'],
            'description' => $request['description'],
            'total_users'=> 1
        ]);

        $user = auth()->user();
        //dd($user);
        $user->communities()->attach($communities->id); //dia create dia auto join 
   
        return redirect("communities");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(community $community)
    {
        //
        $users= $community->users;
        //id dkt parameter method so find($id) kirenya function tu akan kasi users yg dah join game based on id kau send
        //dd($game->users); //ambik users based on game id
        return view('communities.show', compact('communities', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(community $community)
    {
        //
        abort_if($community->user_id !=auth()->id(), 403);
        return view ('communities.edit', compact ('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(community $community)
    {
        //
        $community->delete();

        return redirect()->route('communities.index') ->with('success', 'community deleted successfully');
    }

    public function join(community $community)
    {
        $user = auth()->user();// current user 
        $community->total_users = $community->total_users + 1; 
        $community->save();
        $user->communities()->attach($community->id);

        return redirect("communities");


        //join dah okay cuma, dia tak gi details  
    }


}
