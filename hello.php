<?php


$dad = new Dad('rose');
$dad2 = new Dad('peter');
$son = new Son('majjer');
$son2 = new Son('jabber');
$son3 = new Son('jabber');

/*echo $dad->getName();
echo $dad->getCounter();
echo $dad2->getName();
echo $dad->getCounter();
echo $dad2->getCounter();*/
echo $son->getName();
echo $son->getCounter();
echo $son->getNick();

echo time();

//print_r($dad);

class Dad {
	protected $name;
	protected  static $counter;
	
	function __construct($aName) {
		$this->name = $aName;
		self::$counter++;
	}
	
	function getName() {
		return $this->name."<br />";
	}
	
	public function getCounter() {
		return self::$counter."<br />";
	}
}

class Son extends Dad {
	
	private $nickName;
	
	function __construct($anickName) {
		parent::__construct('joe');
		$this->nickName = $anickName;
		self::$counter++;
	}
	// comment
	function getNick() {
		return $this->nickName."<br />";;
	}
	
	public function getName() {
		parent::getName();
		return $this->name." the ".$this->nickName."<br />";;
	}
	
}
echo date("l F jS, Y - g:ia", time());

?>