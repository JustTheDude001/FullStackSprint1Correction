<?php
	//require_once "level03.php";
	//require_once "pageLayout.php";
	require_once "indexPHP.php";
	
	function deployKinoSearch(Kino $kino, string $author){
		
		echo "<div class=\"kinoAll\">
				<div class=\"kinoInfo\">
					<div class=\"kinoName\">$kino->name</div>
					<div class=\"kinoTown\">$kino->town</div>
				</div>";
		
		echo "<div class=\"kinoFilms\">";
		foreach ($kino->films as $film){
			
			if($film->directorName == $author){
				echo "<div class=\"filmSection\">
							<h2 class=\"filmName\">$film->name</h2>
							<h2 class=\"filmDirector\">$film->directorName</h2></h2>
							<h2 class=\"filmDuration\">$film->durationMin</h2>
						</div>";
			}	
		
		}
		echo "</div>";
		
		echo "</div>";
	}
	
	
	function deployAllKinosSearch(array $Cinemas, $author){
		
		foreach($Cinemas as $kino){	
			deployKinoSearch($kino, $author);	
		}	
	}
	
	//function deployWeb(array $Cinemas){
	function deployWebSearch($author){
		
		$Kinos_array = defineFilmsAndCinemas();
		
		printTop();
		deployAllKinosSearch($Kinos_array, $author);
		printBottom();
		
	}
	
	//function deployWeb(array $Cinemas){
	function deployWebSearchFilm($filmName){
		
		$Kinos_array = defineFilmsAndCinemas();
		
		printTop();
		deployAllKinosSearchFilm($Kinos_array, $filmName);
		printBottom();		
	}
	
	function deployAllKinosSearchFilm($Kinos_array, $filmName){
		foreach($Kinos_array as $kino){	
			deployKinoSearchFilm($kino, $filmName);	
		}	
	}
	
	function deployKinoSearchFilm($kino, $filmName){
		echo "<div class=\"kinoAll\">
			<div class=\"kinoInfo\">
				<div class=\"kinoName\">$kino->name</div>
				<div class=\"kinoTown\">$kino->town</div>
			</div>";
		
		echo "<div class=\"kinoFilms\">";
		foreach ($kino->films as $film){
			
			if($film->name == $filmName){
				echo "<div class=\"filmSection\">
							<h2 class=\"filmName\">$film->name</h2>
							<h2 class=\"filmDirector\">$film->directorName</h2></h2>
							<h2 class=\"filmDuration\">$film->durationMin</h2>
						</div>";
			}	
		
		}
		echo "</div>";
		
		echo "</div>";
		
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
	
	/*Start Session in Order to use $_SESSION Variables*/
	session_start();
	//deployWeb();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		//author is search field;
		$author = htmlspecialchars($_POST["searchField"]);
		$searchType = htmlspecialchars($_POST["searchType"]);

		if(empty($author)){
			printf("No User Name Specified - Persuatory Input Variable.");
			exit();
		
		}elseif(empty($searchType)){
			printf("No Search Type Specified - Persuatory Input Variable.");
			//Somebody is trying to hack us!! Counterattack should begin...
			exit();
		
		}else{
			/*printf("User Name: %s", $userName);*/
				
			if(strtoupper($author) == "ALL"){
				deployWeb();
				
			}else{
				
				if($searchType ==  "author"){
				
					$_SESSION["directorName"] = $author;
					/*echo "The Form Data is as follows";
					echo "<br>";
					echo "User Name:", $userName;*/
					deployWebSearch($_SESSION["directorName"]);
					
				}elseif($searchType ==  "filmName"){
					
					$_SESSION["filmNameSearch"] = $author;
					deployWebSearchFilm($_SESSION["filmNameSearch"]);
					
				
				}else{
					printf("No Correct Search Type Specified - Persuatory Input Variable.");
					//Somebody is trying to hack us!! Counterattack should begin...
					exit();
				}
			
			}
			
		}
	}
	
	
	
?>
