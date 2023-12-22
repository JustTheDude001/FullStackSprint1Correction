<?php

function ex01(){
	
	class Film{
		public string $name = "";
		public float $durationMin = 0.0;
		public string $directorName = "";
		
		
		public function __construct($name, $duration, $director){
			$this->name = $name;
			$this->durationMin = $duration;
			$this->directorName = $director;
		}
		
		public function printFilmInfo(){
			echo "Film Name:", $this->name,"\n";
			echo "Film Duration (min) : ", $this->durationMin,"\n";
			echo "Film Director: ", $this->directorName,"\n";
		}
		
	}
	
	class Kino{
		
		public string $name = "";
		public string $town = "";
		public array $films = [];
		
		public function __construct($name, $town){
			$this->name = $name;
			$this->town = $town;
		}
		
		public function addFilm(Film $film){
			$this->films[] = $film;
		}

		public function showFilms(){
			for($i=0; $i<count($this->films); $i++){
				$this->films[$i]->printFilmInfo();
			}
		}
		public function showLongestFilm(){
			$filmsExist = False;
			$indexL = 0;
			$maxDurationMin = 0.0;
			for($i=0; $i<count($this->films); $i++){
				if($this->films[$i]->durationMin > $maxDurationMin){
					$maxDurationMin = $this->films[$i]->durationMin;
					$indexL = $i;
					$filmsExist = True;
				}
				
			}
			if($filmsExist == True){
				printf("The longest film has the following information:\n");
				$this->films[$indexL]->printFilmInfo();
			}
		}
		public function showFilmWithDirector($directorName){
			for($i=0; $i<count($this->films); $i++){
				if($this->films[$i]->directorName == $directorName){
					$this->films[$i]->printFilmInfo();
				}
			}
		
		}
		
		
		
		
	}
	
	
	function searchDirectorInFilms($directorName, ...$Kinos){
		
		foreach($Kinos as $kino){
			$kino->showFilmWithDirector($directorName);
	
		}
		
	}
	
	
	$film_01 = new Film("The lord of the rings.",184.5,"P. Jackons");
	$film_01->printFilmInfo();
	
	$kino_01 = new Kino("BarcelonaTheater","Barcelona");
	$kino_01->showFilms();
	$kino_01->showLongestFilm();
	
	$kino_01->addFilm($film_01);
	$kino_01->showFilms();
	$kino_01->showLongestFilm();
	
	$film_02 = new Film("The lord of the rings. 2",170.5,"P. Jackson");
	$film_03 = new Film("The lord of the rings. 3",198.4,"P. Jackson");
	$kino_01->addFilm($film_02);
	$kino_01->addFilm($film_03);
	$kino_01->showFilms();
	$kino_01->showLongestFilm();
	
	$kino_02 = clone $kino_01;
	echo "Films by P. Jackson in Kino__01\n";
	searchDirectorInFilms("P. Jackson",$kino_01);
	echo "Films by P. Jackson in Kino__01 & Kino_02\n";
	searchDirectorInFilms("P. Jackson",$kino_01,$kino_02);
	
	
}

/*
echo "--------- Ex 01 --------------\n";
* */
ex01();


?>
