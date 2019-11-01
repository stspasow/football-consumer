<?php

namespace App\Http\Controllers;

use App\Http\Resources\Match as MatchResource;
use App\Http\Resources\Team as TeamResource;
use App\Http\Resources\MatchCollection as MatchCollection;

use Illuminate\Http\Request;

class GamedayController extends Controller
{
    public function __construct()
    {
        $this->api = resolve('api_resource');
    }
    
    private function allMatchesCurrentSeason() {
        
        $result = $this->api->getAllMatches();
        $result = json_decode($result);
        $transformed = collect($result)->map(function($row){
            return MatchResource::make($row)->resolve();
        });

        return $transformed;
    }

    public function upcoming() {
        
        $result = $this->api->getUpcommingMatches();
        $result = json_decode($result);

        $transformed = collect($result)->map(function($row){
            return MatchResource::make($row)->resolve();
        });

        return view('home', compact('transformed'));
    }
    
    public function all() {
        $transformed = $this->allMatchesCurrentSeason();
        return view('all', compact('transformed'));
    }
    
    public function teams() {
        
        $result = $this->api->getLeagueTeams();
        $result = json_decode($result);

        $teams = collect($result)->map(function($row) {
            return TeamResource::make($row)->resolve();
        });

        $matches = $this->allMatchesCurrentSeason();

        $teams->transform(function ($item, $key) use ($matches) {
            $wins = $matches->where('winner', $item['name']);
            $losses = $matches->where('loser', $item['name']);
            $item['wins'] = $wins->count();
            $item['losses'] = $losses->count();
            return $item;
        });

        return view('teams', compact('teams'));
    }
    
    public function searchGoalgetter(Request $request) {

        $data = request()->validate([
            'name' => 'required|string',
        ]);
    
        $goalgetterName = $request->name;
        $mathces = $this->allMatchesCurrentSeason();
        $goals = $mathces->pluck('goals')->flatten(1);

        $numberOfGoals = $goals->where('goalgetterName', $goalgetterName)->count();

        $noScoredGoals = false;
        if($numberOfGoals == 0) {
            $noScoredGoals = true;
        }
        return back()->with(['goals' => $numberOfGoals, 'goalgetter' => $goalgetterName, 'noGoals' => $noScoredGoals]);
    }
}
