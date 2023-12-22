<?php
	require "level03.php";
	require "pageLayout.php";
	
	function deployKino(Kino $kino){
		
		echo "<div class=\"kinoAll\">
				<div class=\"kinoInfo\">
					<div class=\"kinoName\">$kino->name</div>
					<div class=\"kinoTown\">$kino->town</div>
				</div>";
		
		echo "<div class=\"kinoFilms\">";
		foreach ($kino->films as $film){
			echo "<div class=\"filmSection\">
						<h2 class=\"filmName\">$film->name</h2>
						<h2 class=\"filmDirector\">$film->directorName</h2></h2>
						<h2 class=\"filmDuration\">$film->durationMin</h2>
					</div>";
		
		}
		echo "</div>";
		
		echo "</div>";
	}
	
	
	function deployAllKinos(array $Cinemas){
		
		foreach($Cinemas as $kino){
			
			deployKino($kino);
			
			
		}
		
	}
	
	//function deployWeb(array $Cinemas){
	function deployWeb(){
		
		$Kinos_array = defineFilmsAndCinemas();
		
		printTop();
		deployAllKinos($Kinos_array);
		printBottom();
		
	}
	
	
	function defineFilmsAndCinemas(): array{
		$film_01 = new Film("The Lord Of the Rings I", 100, "Peter Jackson");
		$film_02 = new Film("The Lord Of the Rings II", 198.6, "Peter Jackson");
		$film_03 = new Film("The Lord Of the Rings III", 198.6, "Peter Jackson");
		$film_04 = new Film("Planet Earth II", 126, "David A.");
		$film_05 = new Film("Pulp Fiction", 98, "Quentin Tarantino");
		
		$film_06 = new Film("Forrest Gump", 198.6, "Robert Zemeckis");
		$film_07 = new Film("The Matrix", 165, "Wachowski");
		$film_08 = new Film("Life is beautiful", 176, "Roberto Benigni");
		$film_09 = new Film("Fight Club", 167, "David Fincher");
		$film_10 = new Film("Gladiator", 210, "Ridley Scott");
		
		
		$Kinos_array = [];
		
		$kino_01 = new Kino("Mataro Park", "Centro Comercial Mataró Parc Carrer Estrasburg, 5, local 100 08304 Mataró Barcelona España");
		
		$kino_02 = new Kino("La Maquinista", "En la maquinista Julio");
		
		$kino_03 = new Kino("Grand Cinema", "Somewhere in the world");
		
		$kino_01->addFilm($film_01);
		$kino_01->addFilm($film_02);
		$kino_01->addFilm($film_03);
		
		$kino_02->addFilm($film_04);
		$kino_02->addFilm($film_05);
		$kino_02->addFilm($film_06);
		$kino_02->addFilm($film_07);
		$kino_02->addFilm($film_08);
		$kino_02->addFilm($film_09);
		$kino_02->addFilm($film_10);
		
		$kino_03->addFilm($film_02);
		$kino_03->addFilm($film_05);
		$kino_03->addFilm($film_04);
		
		$Kinos_array [] = $kino_01;
		$Kinos_array [] = $kino_02;
		$Kinos_array [] = $kino_03;
		
		return $Kinos_array;
	}
	
	
	/*
	$film_01 = new Film("The Lord Of the Rings I", 100, "Peter Jackson");
	$film_02 = new Film("The Lord Of the Rings II", 198.6, "Peter Jackson");
	$film_03 = new Film("The Lord Of the Rings III", 198.6, "Peter Jackson");
	$film_04 = new Film("Planet Earth II", 126, "David A.");
	$film_05 = new Film("Pulp Fiction", 98, "Quentin Tarantino");
	
	$film_06 = new Film("Forrest Gump", 198.6, "Robert Zemeckis");
	$film_07 = new Film("The Matrix", 165, "Wachowski");
	$film_08 = new Film("Life is beautiful", 176, "Roberto Benigni");
	$film_09 = new Film("Fight Club", 167, "David Fincher");
	$film_10 = new Film("Gladiator", 210, "Ridley Scott");
	
	
	$Kinos_array = [];
	
	$kino_01 = new Kino("Mataro Park", "Centro Comercial Mataró Parc Carrer Estrasburg, 5, local 100 08304 Mataró Barcelona España");
	
	$kino_02 = new Kino("La Maquinista", "En la maquinista Julio");
	
	$kino_03 = new Kino("Grand Cinema", "Somewhere in the world");
	
	$kino_01->addFilm($film_01);
	$kino_01->addFilm($film_02);
	$kino_01->addFilm($film_03);
	
	$kino_02->addFilm($film_04);
	$kino_02->addFilm($film_05);
	$kino_02->addFilm($film_06);
	$kino_02->addFilm($film_07);
	
	$kino_03->addFilm($film_02);
	$kino_03->addFilm($film_05);
	$kino_03->addFilm($film_04);
	
	$Kinos_array [] = $kino_01;
	$Kinos_array [] = $kino_02;
	$Kinos_array [] = $kino_03;
	*/

	//deployWeb();
	
	
?>
