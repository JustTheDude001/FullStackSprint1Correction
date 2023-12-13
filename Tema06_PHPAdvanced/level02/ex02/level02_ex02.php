<?php

	class htmlFile{
		public function getFile(){
			return __FILE__;
		}
		public function getDir(){
			return __DIR__;
		}
		
		/*REMEMER - IF __toString is NOT defined Normal Behaviour is ERROR*/
		public function __toString(){
			return "I am a charlatan object... or maybe you are hallucinating... who knows...\n";
		}
	}
	
	function test(){
		echo "---------------Level 02 Ex. 01------------\n";
		$htmlFile = new htmlFile();
		echo "File:", $htmlFile->getFile(),"\n";
		echo "Directory:", $htmlFile->getDir(),"\n";
		echo "---------------Level 02 Ex. 02------------\n";
		echo $htmlFile;
	}
	
	test();

?>
