<?php

	function ex01(){
		
		/*CAUTION _ WARNING - ENUM works after php Version 8.1!!! Remember to check your version and update if needed!*/
		
		/*enum Topic{
			case PHP;
			case CSS;
			case HTML;
			case SQL;
			case Laravel;
		}
		enum Type{
			case Fitxer;
			case Article Web;
			case Video;
		}
		*/
		
		enum Topic: String{
			case Default = "";
			case PHP ="PHP";
			case CSS = "CSS";
			case HTML = "HTML";
			case SQL = "SQL";
			case Laravel = "Laravel";
		}
		enum Type: String{
			case Default = "";
			case Fitxer = "Fitxer";
			case ArticleWeb = "Article Web";
			case Video = "Video";
		}
		/* Enumerators Basic Fuctions:
		 * Topic::isValidName("PHP");
		 * Type::isValidValue("Article Web");
		 * 
		 * Suit::cases(),
		 * Suit::values(), 
		 * Suit::names(),
		 * Suit::array(),
		 * Suit::jsonSerialize(),
		 * Suit::default(),
		 */
		
		
		class Source{
			public Topic $topic =  Topic::Default;
			public string $url = "";
			/*const type = Type::Default;*/
			public Type $type = Type::Default;
			
			function __construct(Topic $topic, string $url, Type $type){
				$this->topic = $topic;
				$this->url = $url;
				$this->type = $type;
			}
			function getTopic(): string{
				return $this->topic->value;
			}
			function getType():string{
				return $this->type->value;
			}
			function getURL():string{
				return $this->url;
			}
			
		}
		
		
		/*---------------TEST----------*/
		$source_01 = new Source(Topic::PHP, "url1", Type::Fitxer);
		echo "Topic = ", $source_01->getTopic(),"\n";
		echo "Url = ", $source_01->getURL(),"\n";
		echo "Type = ", $source_01->getType(),"\n";
		
		$source_02 = new Source(Topic::Laravel, "url2", Type::ArticleWeb);
		echo "Topic = ", $source_02->getTopic(),"\n";
		echo "Url = ", $source_02->getURL(),"\n";
		echo "Type = ", $source_02->getType(),"\n";
		
		$source_03 = new Source(Topic::CSS, "url1", Type::Video);
		echo "Topic = ", $source_03->getTopic(),"\n";
		echo "Url = ", $source_03->getURL(),"\n";
		echo "Type = ", $source_03->getType(),"\n";
		
		
		
	}
	
	
	function ex02(){
		
		trait turboSignal{
			function boost():void{
				echo "S'ha iniciat el turbo!\n";
			}
		}
		
		
		class Car{
			public string $marca = "";
			public string $matricula ="";
			public string $fuelType = "";
			public float $maxSpeed = 0.0;
			
			use turboSignal;
			
			function __construct(string $marca, string $plateNumber, string $fuelType, float $maxSpeed){
				$this->marca = $marca;
				$this-> matricula = $plateNumber;
				$this->fuelType = $fuelType;
				$this->maxSpeed = $maxSpeed;
			}
		
		}
		
		$car_01 = new Car("Citroen", "B-0001", "Diesel", 120);
		$car_01->boost();
		
		$car_02 = new Car("Toyota", "A-0001-XX", "Hidrogen", 230);
		$car_02->boost();
	}
	
	
	
	echo "-------------- Level 03 Ex. 01 -------------------\n";
	ex01();
	
	echo "-------------- Level 03 Ex. 02 -------------------\n";
	ex02();
?>
