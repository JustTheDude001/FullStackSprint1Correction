<?php

	
	include "ex03.php";
	
	use PHPUnit\Framework\TestCase;

	
	final Class testLibrary extends TestCase
	{

		
		/**
		 * @dataProvider providerAddBook
		 */
		function testAddBook($libraryObj, $bookObj, $expResult){
			//True means it was succesfully added
			$this->assertSame(True, $libraryObj->addBook($bookObj));
			//Check if the same object exists
			//NOT Programmed - Not needed
			//$this->assertSame($bookObj, $libraryObj->searchBookObj($bookObj));
			//Check if book with same name exists:
			if(is_bool($libraryObj->searchBookByTitle($bookObj->title) )==False){	
				
				foreach($libraryObj->searchBookByTitle($bookObj->title) as $book){
					$this->assertSame($bookObj->title,  $book->title );
				}
				
			}else{
				$this->assertSame($expResult,  $libraryObj->searchBookByTitle($bookObj) );
			}

			
		}
		
		function providerAddBook(){
			
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			
			
			return array(
				array($libraryObj, $bookObj, True)
			);
		}
		
		/**
		 * @dataProvider providerDeleteBookByTitle
		 */
		
		function testDeleteBookByTitle($libraryObj, $bookObj, $addBool){
			
			//First Add if $addBool == True
			if($addBool == True){
				$this->testAddBook($libraryObj, $bookObj, True);
			}
			
			//Remove it
			$this->assertSame(True,$libraryObj->deleteBookByTitle($bookObj->title));
		
		}
		
		function providerDeleteBookByTitle(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			
			return array(
				array($libraryObj, $bookObj, True)
			);
			
		}
		
		
		
		/**
		 * @dataProvider providerModifyBookByParam
		 */
		
		function testModifyBookByParam($libraryObj, $searchParam, $searchValue, $modParam, $modValue, $expValue){
			
			//Modify the value
			$this->assertSame(True, $libraryObj->modifyBookByParam($searchParam, $searchValue, $modParam, $modValue,) );
			
			//Check if the value is the same as the modidification:
			foreach($libraryObj->searchBookByParam($searchParam, $searchValue) as $book){
				$this->assertSame($modValue,$book->$modParam);
			}
		
		}
		
		function providerModifyBookByParam(){
			
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, "title","The Hobbit","author","JKK Tolkien", True),
				array($libraryObj, "title","The Hobbit","author","JKK Tolkien", True),
				array($libraryObj, "title","The Hobbit","author","JKK Tolkien", True),
				array($libraryObj, "title","The Hobbit","author","JKK Tolkien", True),
				array($libraryObj, "title","The Hobbit","author","JKK Tolkien", True)
			);
		}
		
		
		/**
		 * @dataProvider providerTestSearchBookByParam
		 */
		
		function testSearchBookByParam($libraryObj, $searchParam, $searchValue, $expResult){
			
			if($expResult == True){
				//Check if the value is the same as the modidification:
				foreach($libraryObj->searchBookByParam($searchParam, $searchValue) as $book){
					$this->assertSame($searchValue,$book->$searchParam);
				}
		
			}else{
				$this->assertSame($expResult,$libraryObj->searchBookByParam($searchParam, $searchValue));
			}
			
		}
		
		
		function providerTestSearchBookByParam(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, "title","The Hobbit", True),
				array($libraryObj, "author","Tolkien", True),
				array($libraryObj, "title","The Swarm", False),
				array($libraryObj, "author","Martin", False),
			);
		}
		/**
		 * @dataProvider providerTestSearchBookByTitle
		 */
		function testSearchBookByTitle($libraryObj, $searchValue, $expResult){	
			
			if($expResult == True){
				//Check if the value is the same as the modidification:
				foreach($libraryObj->searchBookByTitle($searchValue) as $book){
					$this->assertSame($searchValue,$book->title);
				}
		
			}else{
				$this->assertSame($expResult,$libraryObj->searchBookByTitle($searchValue));
			}
		}
		
		function providerTestSearchBookByTitle(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, "The Hobbit", True),
				array($libraryObj, "Tolkien", False),
				array($libraryObj, "The Swarm", False),
				array($libraryObj, "Martin", False),
			);
		}
		
		/**
		 * @dataProvider providerTestSearchBookByGenre
		 */
		function testSearchBookByGenre($libraryObj, $genre, $expResult){
			if($expResult == True){
				//Check if the value is the same as the modidification:
				foreach($libraryObj->searchBookByGenre($genre) as $book){
					$this->assertSame($genre,$book->genre);
				}
		
			}else{
				$this->assertSame($expResult,$libraryObj->searchBookByGenre($genre));
			}
		}
		
		
		function providerTestSearchBookByGenre(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, Genre::Adventures, True),
				array($libraryObj, "OMG", False),
				array($libraryObj, Genre::Story, False),
				array($libraryObj, Genre::Scify, False)
			);
		}
		
		
		/**
		 * @dataProvider providerTestSearchBookByISBN
		 */
		function testSearchBookByISBN($libraryObj, $ISBN, $expResult){
			if($expResult == True){
				//Check if the value is the same as the modidification:
				foreach($libraryObj->searchBookByISBN($ISBN) as $book){
					$this->assertSame($ISBN,$book->ISBN);
				}
		
			}else{
				$this->assertSame($expResult,$libraryObj->searchBookByISBN($ISBN));
			}
		}
		
		
		function providerTestSearchBookByISBN(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, "123-NB" , True),
				array($libraryObj, "Tolkien", False),
				array($libraryObj, Genre::Story, False),
				array($libraryObj, Genre::Adventures, False),
			);
		}
		
		
		/**
		 * @dataProvider providerTestSearchBookByAuthor
		 */
		function testSearchBookByAuthor($libraryObj, $author, $expResult){
			
			
			if($expResult == True){
				//Check if the value is the same as the modidification:
				foreach($libraryObj->searchBookByAuthor($author) as $book){
					$this->assertSame($author,$book->author);
				}
		
			}else{
				$this->assertSame($expResult,$libraryObj->searchBookByAuthor($author));
			}
			
		}
		
		function providerTestSearchBookByAuthor(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj = new Book("The Hobbit", "Tolkien", "123-NB", Genre::Adventures, 400);
			$libraryObj->addBook($bookObj);
		
			return array(
				array($libraryObj, "123-NB" , False),
				array($libraryObj, "Tolkien", True),
				array($libraryObj, "Routhfuss", False),
				array($libraryObj, Genre::Adventures, False),
			);
		
		}
		

		/**
		 * @dataProvider providerTestReturnLongerBooksThan
		 */
		function testReturnLongerBooksThan($libraryObj, $numPages, $expResult){
			
			if($expResult == True){
				foreach($libraryObj->returnLargerBooksThan($numPages) as $book){
					$this->assertGreaterThanOrEqual($numPages, $book->numPages );
				}
			}else{
				$this->assertSame(0, count($libraryObj->returnLargerBooksThan($numPages) ));
			}
		}
		
		function providerTestReturnLongerBooksThan(){
			$libraryObj = new Library();
			//Title
			//Author
			//ISB
			//Genre (Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic)
			//Num Pages
			$bookObj_1 = new Book("The Hobbit", "Tolkien", "123da-NB", Genre::Adventures, 700);
			$bookObj_2 = new Book("The Lord Of The fucking Rings", "Tolkien", "123a-NB", Genre::Adventures, 450);
			$bookObj_3 = new Book("The What The hell is this exercise", "The Dude", "123f-NB", Genre::Adventures, 100);
			$bookObj_4 = new Book("The Infinite Story", "The IT Academy", "123gt-NB", Genre::Adventures, 200);
			$bookObj_5 = new Book("The Longest Program of them all", "The PHP", "123-sNB", Genre::Adventures, 4000);
			$libraryObj->addBook($bookObj_1); $libraryObj->addBook($bookObj_2); $libraryObj->addBook($bookObj_3); $libraryObj->addBook($bookObj_4); $libraryObj->addBook($bookObj_5);
		
			return array(
				array($libraryObj, 500, True),
				array($libraryObj, 10000, False),
				array($libraryObj, 300, True),
				array($libraryObj, 500, True),
			);
		}
		
		
		
		
		
		
	}
	/*ASSERTIONS PHPUNIT -> https://docs.phpunit.de/en/9.6/assertions.html*/
	
?>
