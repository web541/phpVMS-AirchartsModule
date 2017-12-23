<?php
class Aircharts extends CodonModule {
	// Properties
	public $title = 'Aircharts';

	// Index Function
	public function index() {
		if($this->post->action == 'search') {
			$this->postCharts();
			return;
		}

		$this->show('aircharts/aircharts_index');
	}

	// Main Charts Section
	public function charts($icao = '') {
		$icao = DB::escape(strtoupper($icao));
		$apiurl = 'https://api.aircharts.org/v2/Airport/'.$icao;
		$obj = json_decode(Aircharts::getSSLPage($apiurl), true);

		$this->set('obj', $obj);
		$this->set('icao', $icao);
		$this->show('aircharts/aircharts_chartslist');
	}

	// Charts via GET Method
	public function getCharts($icao = '') {
		$icao = DB::escape(strtoupper($icao));
		$apiurl = 'https://api.aircharts.org/v2/Airport/'.$icao;
		$obj = json_decode(Aircharts::getSSLPage($apiurl), true);

		$this->set('obj', $obj);
		$this->set('icao', $icao);
		return $obj;
	}

	// Charts via POST Method
	public function postCharts() {
		$icao = DB::escape(strtoupper($this->post->icao));
		$apiurl = 'https://api.aircharts.org/v2/Airport/'.$icao;
		$obj = json_decode(Aircharts::getSSLPage($apiurl), true);

		$this->set('obj', $obj);
		$this->set('icao', $icao);
		$this->show('aircharts/aircharts_chartslist');
	}

	// Workaround for SSL Pages
	public function getSSLPage($url) {
		$headers = [
			"ssl" => [
				"verify_peer" => false,
				"verify_peer_name" => false
			]
		];

		return file_get_contents($url, false, stream_context_create($headers));
	}
}
