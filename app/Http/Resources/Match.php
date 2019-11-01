<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GoalResource;

class Match extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->MatchID,
            'leagueName' => $this->resource->LeagueName,
            'groupName' => $this->resource->Group->GroupName,
            'date' => $this->resource->MatchDateTime,
            'team1' => $this->resource->Team1->TeamName,
            'team2' => $this->resource->Team2->TeamName,
            'goals'=> collect($this->resource->Goals)->map(function($row){
                return Goal::make($row)->resolve();
            }),
            'winner' => $this->when($this->resource->MatchIsFinished === true, function () {
                if($this->resource->MatchResults[0]->PointsTeam1 > $this->resource->MatchResults[0]->PointsTeam2)
                return $this->resource->Team1->TeamName;
            }),
            'loser' => $this->when($this->resource->MatchIsFinished === true, function () {
                if($this->resource->MatchResults[0]->PointsTeam1 > $this->resource->MatchResults[0]->PointsTeam2)
                return $this->resource->Team2->TeamName;
            }),
        ];
    }
}