<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = new Game();
        $gameData = $game->all();

        return response()->json(['gameData' => $gameData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $gname = $request->input('gname');
        $playersnumbermin = $request->input('playersnumbermin');
        $playersnumbermax = $request->input('playersnumbermax');
        $playtime = $request->input('playtime');
        $recommendedage = $request->input('recommendedage');

//        if(!isset($sname) OR !isset($tanka)){
//            return response()->json(['result' => false]);
//        }
//
//        $model = new Shouhin();
//        $model = $model->create(['sname' => $sname, 'tanka' => $tanka]);
//
//        $sid = $model->sid;
//
//        return response()->json(['result' => true,'sid' => $sid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gid)
    {
        $game = new Game();
        $gameData = $game->find($gid);

        return response()->json(['gameData' => $gameData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
