<?php


	function printTop(){
		
		echo "<!DOCTYPE html>
<html>
<link rel=\"stylesheet\" type=\"text/css\" href=\"./style.css\">
<meta content=\"width=device-width, initial-scale=1\" name=\"viewport\" />
<meta charset=\"UTF-8\">
<body>

<header>
<h3>Dude'S Kinos</h3>	
</header>

<div id=\"main\">

	<div id=\"infoKinos\">
		<h3>Information about Dude's Theathers</h3>
		<div id=\"infoKinosInsert\">";

	}
	
	function printBottom(){
		
		
		echo "</div>
	</div>

	<div id=\"searchMain\">
		
		<div id=\"formSearch\">
			<h3>Search In Theathers:</h3>
			<form action=\"./searchResponse.php\" method=\"post\">
				<div>
					<label for=\"searchField\"></label>
					<input type=\"text\" id=\"searchField\" name=\"searchField\" value=\"...\">
				</div>
				
				<div>
					<input type=\"radio\" id=\"searchType1\" name=\"searchType\" value=\"filmName\" checked />
					<label for=\"searchType1\">Film's Name</label>
				</div>
				
				<div>
					<input type=\"radio\" id=\"searchType2\" name=\"searchType\" value=\"author\" />
					<label for=\"searchType2\">Author</label>
				</div>
				
				<input type=\"submit\" id=\"submit\" value=\"Search!\">
			
			</form>
		
		</div>
	
	</div>


</div>

<footer>
	<h3> 2023 November 29 - JustADude</h3>
</footer>

</body>
</html>";

	}



?>
