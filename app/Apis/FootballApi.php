<?php

namespace App\Apis;
/**
 *
 */
class FootballApi {

	protected $api_base_url;
    protected $liga = 'bl1';
    protected $year = '2019';
    protected $client;

	function __construct($api_base_url) {
        $this->api_base_url = $api_base_url;
        $this->client = new \GuzzleHttp\Client(['verify' => false]);
	}
    
    public function getUpcommingMatches(){

        $request = $this->client->get($this->api_base_url . '/getmatchdata/' . $this->liga);
        $response = $request->getBody();

        return $response->getContents();
    }

    public function getAllMatches(){

        $request = $this->client->get($this->api_base_url . '/getmatchdata/' . $this->liga . '/'. $this->year);
        $response = $request->getBody();

        return $response->getContents();
    }

    public function getLeagueTeams(){

        $request = $this->client->get($this->api_base_url . '/getavailableteams/'. $this->liga . '/'. $this->year);
        $response = $request->getBody();

        return $response->getContents();
    }
    
}