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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $params = $request->input('params');

        if($params){
            $game = new Game();
            $game->create(['gname' => $params['gname'],'playersnumbermin' => $params['playersnumbermin'],'playersnumbermax' => $params['playersnumbermin'],'playtime' => $params['playtime'],'recommendedage' => $params['recommendedage']]);
            $ret = true;
        }else{
            $ret = false;
        }

        return response()->json(['result' => $ret]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gid)
    {
        $params = $request->input('params');

        if($params){
            $data = Game::find($params['gid']);
            $data->gname = $params['gname'];
            $data->playersnumbermin = $params['playersnumbermin'];
            $data->playersnumbermax = $params['playersnumbermax'];
            $data->playtime = $params['playtime'];
            $data->recommendedage = $params['recommendedage'];
            $data->save();
            $ret = true;
        }else{
            $ret = false;
        }

        return response()->json(['result' => $ret]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gid)
    {
        if($gid) {
            $game = new Game();
            $gameData = $game->find($gid);
            $gameData->delete();
            $ret = true;
        }else{
            $ret = false;
        }

        return response()->json(['result' => $ret]);
    }
}
