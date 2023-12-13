<?php

	class htmlFile{
		public function getFile(){
			return __FILE__;
		}
		public function getDir(){
			return __DIR__;
		}
	}
	
	function test(){
		$htmlFile = new htmlFile();
		echo "File:", $htmlFile->getFile(),"\n";
		echo "Directory:", $htmlFile->getDir(),"\n";
	}
	
	test();

?>
