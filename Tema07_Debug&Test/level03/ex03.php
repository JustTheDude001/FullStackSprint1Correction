<?php
	
	enum Genre: String{
		//Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic.
		case Adventures = "Aventures";
		case Scify = "Ciència-ficció";
		case Story = "Conte";
		case Thriller = "Novel·la Policial";
		case Paranormal = "Paranormal";
		case Distopian = "Distopia";
		case Fantastical = "Fantàstic";
		case Default = "Not Given";
	
	}	
	
	class Book{
		public string $title = "";
		public string $author = "";
		public string $ISBN = "";
		public Genre $genre;
		public int $numPages = 0;
		
	
		public function __construct(string $title, string $author, string $ISBN, Genre $genre, int $numPages){
			$this->title = $title;
			$this->author = $author;
			$this->ISBN = $ISBN;
			$this->genre = $genre;
			$this->numPages = $numPages;
		}
	
	}
	
	class Library extends Book{
		
		//WARNING - All functions and properties are public, CHANGE public to private to do NOT allow its use from the outside!
		
		
		//Some properties for the library - Own Choice
		public string $name = "";
		public string $address = "";
		public int $booksAmount = 0;
		//public Genre $genre; ERROR
		public array $booksArray = [];
		
		public function __construct(string $name = "", string $address = ""){
			$this->name = $name;
			$this->address = $address;
			$this->booksAmount = 0;
		}
		
		public function addBook(Book $book){
			
			$countBooksArray = count($this->booksArray);
			//It must have a different ISBN - Therefore there cannot be two books equal (done for practice)
			$isbnExistsBool = False;
			for($i = 0; $i<$countBooksArray; $i++){
				if($this->booksArray[$i]->ISBN == $book->ISBN){
					$isbnExistsBool = True;
					//It is possible to return here or break for more efficiency in the code:
					//return False;
					//break;
				}
			}
			if($isbnExistsBool == False){
				$this->booksArray[] = $book;
				$this->booksAmount ++;
				return True;
			}else{
				return False;
			}
			
		}
		
		public function deleteBookByTitle(String $title){
			
			$countBooksArray = count($this->booksArray);
			$titleExists = False;
			for($i = 0; $i<$countBooksArray; $i++){
				if($this->booksArray[$i]->title == $title){
					$titleExists = True;
					break;
					//It is possible to return here or break for more efficiency in the code:
					//return False;
					//break;
				}
			}
			if($titleExists == True){
				unset($this->booksArray[$i]);
				$this->booksAmount --;
				return True;
			}else{
				return False;
			}
		
		}
		
		public function searchBookByParam($paramName, $paramValue){
			
			if(property_exists("Book", $paramName) == False){
				
				return False;
			}
			$outputArrayBooks = [];
			
			
			$countBooksArray = count($this->booksArray);
			//It must have a different ISBN - Therefore there cannot be two books equal (done for practice)
			$titleExists = False;
			for($i = 0; $i<$countBooksArray; $i++){
				if($this->booksArray[$i]->$paramName == $paramValue){
					$outputArrayBooks[] = $this->booksArray[$i];
					//It is possible to return here or break for more efficiency in the code:
					//return False;
					//break;
				}
			}
			
			if(count($outputArrayBooks)==0){
				return False;
			}else{
				return $outputArrayBooks;
			}
			
			
		}
		
		public function modifyBookByParam($searchParam, $searchValue, $modParam, $modValue){
			
			if(property_exists("Book", $searchParam) == False){
				printf("ERROR - Not correct searchParam \n");
				return False;
			}
			if(property_exists("Book", $modParam) == False){
				printf("ERROR - Not correct modParam \n");
				return False;
			}

			
			$countBooksArray = count($this->booksArray);
			//It must have a different ISBN - Therefore there cannot be two books equal (done for practice)
			$titleExists = False;
			for($i = 0; $i<$countBooksArray; $i++){
				if($this->booksArray[$i]->$searchParam == $searchValue){
					//It will just update the first occurence - WARNING!
					$this->booksArray[$i]->$modParam = $modValue;
					//printf("DEBUG - Success -param modified \n");
					return True;
					//It is possible to return here or break for more efficiency in the code:
					//return False;
					//break;
				}
			}
			
			//No Modification was made
			printf("ERROR - The value was not found in the books \n");
			return False;
			
		}

		
		
		//WARNING - Function below deletes ALL books with match param and values, NOT only first occurrence!
		
		public function deleteBookByParam($searchParam, $searchValue){
		
			
			if(property_exists("Book", $searchParam) == False){
				printf("ERROR - Not correct searchParam \n");
				return False;
			}
			
			
			//Two loop because zero trust - Maybe count changes every unset execution (almost for sure)
			$modDoneBool = False;
			$countBooksStart = count($this->booksArray);
			echo "countBooksStart = ", $countBooksStart, "\n";
			for($a = 0; $a<$countBooksStart; $a++){
				
				$countBooksArray = count($this->booksArray);
				echo "countBooksArray = ", $countBooksArray, "\n";
				for($i = 0; $i<$countBooksArray; $i++){
					if($this->booksArray[$i]->$searchParam == $searchValue){
						//It will just update the first occurence - WARNING!
						//unset($this->booksArray[$i]);
						printf("DEBUG  - Deleting book with tilte = %s", $this->booksArray[$i]->title, "\n");
						array_splice($this->booksArray,$i,1);
						$this->booksAmount --;
						$modDoneBool = True;
						break 1;
					}
				}
				//unset($this->booksArray[$i]);
				//array_splice($this->booksArray,$i);
				
			}
			
			if($modDoneBool==False){
					
				//No Modification was made
				printf("ERROR - The value was not found in the books \n");
				return False;
			}else{
				return True;
			}
			
		}
		
		public function deleteBookByParamNew($searchParam, $searchValue){
		
			
			if(property_exists("Book", $searchParam) == False){
				printf("ERROR - Not correct searchParam \n");
				return False;
			}
			
			
			//Two loop because zero trust - Maybe count changes every unset execution (almost for sure)
			$modDoneBool = False;
			$countBooksStart = count($this->booksArray);
			echo "countBooksStart = ", $countBooksStart, "\n";
			for($a = 0; $a<$countBooksStart; $a++){
				
				$countBooksArray = count($this->booksArray);
				echo "countBooksArray = ", $countBooksArray, "\n";
				$counter = 0;
				foreach($this->booksArray as $book){
					if($book->$searchParam == $searchValue){
						//It will just update the first occurence - WARNING!
						//unset($this->booksArray[$i]);
						printf("DEBUG  - Deleting book with tilte = %s", $book->title, "\n");
						//REMEMBER TO Add OFFSET AND LENGTH!!!
						array_splice($this->booksArray,$counter,1);
						$this->booksAmount --;
						$modDoneBool = True;
						break 1;
					}
					$counter++;
				}
				//unset($this->booksArray[$i]);
				//array_splice($this->booksArray,$i);
				
			}
			
			if($modDoneBool==False){
					
				//No Modification was made
				printf("ERROR - The value was not found in the books \n");
				return False;
			}else{
				return True;
			}
			
		}
		
		
		public function returnLargerBooksThan($numPages){
			

			$outputArrayBooks = [];
			
			
			$countBooksArray = count($this->booksArray);
			//It must have a different ISBN - Therefore there cannot be two books equal (done for practice)
			$titleExists = False;
			for($i = 0; $i<$countBooksArray; $i++){
				if($this->booksArray[$i]->numPages >= $numPages){
					$outputArrayBooks[] = $this->booksArray[$i];
					//It is possible to return here or break for more efficiency in the code:
					//return False;
					//break;
				}
			}
			
			return $outputArrayBooks;
			
		}
		
		
		/*FUNCTIONS DEPENDENT ON THE FUNCTIONS ABOVE*/
		public function searchBookByTitle($title){
			return $this->searchBookByParam("title", $title);
			
		}
		public function searchBookByGenre($genre){
			return $this->searchBookByParam("genre", $genre);
			
		}
		public function searchBookByISBN($ISBN){
			return $this->searchBookByParam("ISBN", $ISBN);
		}
		public function searchBookByAuthor($author){
			return $this->searchBookByParam("author", $author);
		}
		
		
		/*ASK TEACHER
		 * IS THERE a Magic Method that is called always after the call of a class method?
		 * It is in order to update the number of books with count(arrayBooks) and therefore do NOT need to add or sum each tie
		 */
	
	}


	
	function firstTest(){
		$bookObj = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 678);
		
		echo $bookObj->genre->value;
		
		/*
		 * WITH String as argument for genre it does not work
		 * ASK TEACHER  - Solution for both, Genre or String
		 */
		//$bookObj = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", "Aventures", 678);
		
		//echo $bookObj->genre->value;
		
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		//$libraryObj->deleteBookByTitle("The lord of the rings I");
		//echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "ISBN Search = ", var_dump($libraryObj->searchBookByParam("ISBN", "Ab-12312313-SN")), "\n";
		echo "ISBN Search = ", var_dump($libraryObj->searchBookByParam("ISBN", "Ab-123-SN")), "\n";
		
		
		echo "Title Search = ", var_dump($libraryObj->searchBookByParam("title", "The lord of the rings I")), "\n";
		echo "Title Search = ", var_dump($libraryObj->searchBookByParam("title", "The lord of the rings II")), "\n";
		
		echo "Author Search = ", var_dump($libraryObj->searchBookByParam("author", "Tolkien")), "\n";
		echo "Author Search = ", var_dump($libraryObj->searchBookByParam("author", "Patrick")), "\n";
		
	}
	
	function secondTest(){
	
		$bookObj = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 678);
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		
		echo "Old Author = ", var_dump($libraryObj->searchBookByParam("title", "The lord of the rings I")[0]->author), "\n";
		
		$libraryObj->modifyBookByParam("title", "The lord of the rings I", "author", "JK Tolkien");
		echo "New Author = ", var_dump($libraryObj->searchBookByParam("title", "The lord of the rings I")[0]->author), "\n";
			
		
	}
	
	function thirdTest(){
		$bookObj_01 = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 500);
		$bookObj_02 = new Book("The lord of the rings II", "Tolkien", "Ab-872y31-SN", Genre::Adventures, 700);
		$bookObj_03 = new Book("The lord of the rings III", "Tolkien", "Ab-12321-SN", Genre::Adventures, 500);
		$bookObj_04 = new Book("The name of the wind", "Routhfuss", "Ab-12335-SN", Genre::Adventures, 600);
		
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj_01);
		$libraryObj->addBook($bookObj_02);
		$libraryObj->addBook($bookObj_03);
		$libraryObj->addBook($bookObj_04);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Tolkien"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Routhfuss"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		
		$libraryObj->deleteBookByParam("author", "Tolkien");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Tolkien"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Routhfuss"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
			
		
	}
	
	function fourthTest(){
		$bookObj_01 = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 500);
		$bookObj_02 = new Book("The lord of the rings II", "Tolkien", "Ab-872y31-SN", Genre::Adventures, 700);
		$bookObj_03 = new Book("The lord of the rings III", "Tolkien", "Ab-12321-SN", Genre::Adventures, 500);
		$bookObj_04 = new Book("The name of the wind", "Routhfuss", "Ab-12335-SN", Genre::Adventures, 600);
		
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj_01);
		$libraryObj->addBook($bookObj_02);
		$libraryObj->addBook($bookObj_03);
		$libraryObj->addBook($bookObj_04);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Tolkien"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("author", "Routhfuss"));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		
		$libraryObj->deleteBookByParam("numPages", "500");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		echo "Author Books = ", var_dump($libraryObj->searchBookByParam("genre", Genre::Adventures));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";

	}
	
	function fifthTest(){
		$bookObj_01 = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 500);
		$bookObj_02 = new Book("The lord of the rings II", "Tolkien", "Ab-872y31-SN", Genre::Adventures, 700);
		$bookObj_03 = new Book("The lord of the rings III", "Tolkien", "Ab-12321-SN", Genre::Adventures, 450);
		$bookObj_04 = new Book("The name of the wind", "Routhfuss", "Ab-12335-SN", Genre::Adventures, 200);
		
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj_01);
		$libraryObj->addBook($bookObj_02);
		$libraryObj->addBook($bookObj_03);
		$libraryObj->addBook($bookObj_04);
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";

		
		echo "Books Larger than 500 pages -  Books = ", var_dump($libraryObj->returnLargerBooksThan(500));
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
	}

	function sixthTest(){
		$bookObj_01 = new Book("The lord of the rings I", "Tolkien", "Ab-12312313-SN", Genre::Adventures, 500);
		$bookObj_02 = new Book("The lord of the rings II", "Tolkien", "Ab-872y31-SN", Genre::Adventures, 700);
		$bookObj_03 = new Book("The lord of the rings III", "Tolkien", "Ab-12321-SN", Genre::Adventures, 450);
		$bookObj_04 = new Book("The name of the wind", "Routhfuss", "Ab-12335-SN", Genre::Story, 200);
		
		
		$libraryObj = new Library("BCN Library");
		echo "Books Amount = ", $libraryObj->booksAmount, "\n";
		
		$libraryObj->addBook($bookObj_01);
		$libraryObj->addBook($bookObj_02);
		$libraryObj->addBook($bookObj_03);
		$libraryObj->addBook($bookObj_04);
		echo "Books Amount = ", $libraryObj->booksAmount;
		
		echo "Title ", var_dump($libraryObj->searchBookByTitle("The name of the wind")), "\n";
		
		echo "Author = ", var_dump($libraryObj->searchBookByAuthor("Tolkien")), "\n";
		
		echo "ISBN = ", var_dump($libraryObj->searchBookByISBN("Ab-12335-SN")), "\n";
		
		echo "ISBN = ", var_dump($libraryObj->searchBookByGenre(Genre::Story)), "\n";
		
		echo "ISBN = ", var_dump($libraryObj->searchBookByGenre("Conte")), "\n";
	}

	/*
	firstTest();
	secondTest();
	thirdTest();
	fourthTest();
	fifthTest();
	sixthTest();
	* */
?>
