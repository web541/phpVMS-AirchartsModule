<?php
class Aircharts extends CodonModule {
	public $title = 'Aircharts';

	public function index() {
		if($this->post->action == 'search') {
			$this->postCharts();
			return;
		}
		
		$this->show('aircharts/aircharts_index');
	}
	
	public function charts($icao = '') {
		$icao = DB::escape(strtoupper($icao));
		$responsetype = '.json'; // Change this to .XML if you really want
		$apiurl = 'http://api.aircharts.org/Airport/'.$icao.$responsetype;
		$obj = json_decode(file_get_contents($apiurl), true);
	
		$this->set('obj', $obj);
		$this->set('icao', $icao);
		$this->show('aircharts/aircharts_chartslist');
	}
	
	public function getCharts($icao = '') {
		$icao = DB::escape(strtoupper($icao));
		$responsetype = '.json'; // Change this to .XML if you really want
		$apiurl = 'http://api.aircharts.org/Airport/'.$icao.$responsetype;
		$obj = json_decode(file_get_contents($apiurl), true);
	
		$this->set('obj', $obj);
		$this->set('icao', $icao);
		return $obj;
	}
	
	public function postCharts() {
		$icao = DB::escape(strtoupper($this->post->icao));
		$responsetype = '.json'; // Change this to .XML if you really want
		$apiurl = 'http://api.aircharts.org/Airport/'.$icao.$responsetype;
		$obj = json_decode(file_get_contents($apiurl), true);
	
		$this->set('obj', $obj);
		$this->set('icao', $icao);
		$this->show('aircharts/aircharts_chartslist');
	}
}