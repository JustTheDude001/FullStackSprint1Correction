<?php
	
	define("mySession","SomeonesSesion");
	
	/*Start Session in Order to use $_SESSION Variables*/
	session_start();
	$_SESSION["newsession"]=mySession;
	
	/*Assures the method used for transfering data to the server is POST HTTP/HTTPS Method*/
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$userName = htmlspecialchars($_POST["username"]);

		if(empty($userName)){
			printf("No User Name Specified - Persuatory Input Variable.");
			exit();
		}else{
			/*printf("User Name: %s", $userName);*/
			
			$_SESSION["userName"] = $userName;
			echo "The Form Data is as follows";
			echo "<br>";
			echo "User Name:", $_SESSION["userName"];
			
			
			
		}
		
	}


?>
