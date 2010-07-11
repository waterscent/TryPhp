<?php

$dad = new Dad();
$dad2 = new Dad('peter');
$son = new Son();
$son2 = new Son('jabber');

echo $dad->getName();
echo $dad->getCounter();
echo $dad2->getName();

print_r($dad);

echo ("test");

class Dad {
	private $name;
	private static $counter;
	
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
		$this->nickName = $anickName;
		self::$counter++;
		super();
	}
	
	function getNick() {
		return $this->nickName."<br />";;
	}
	
	public function getName() {
		return $this->name." the ".$this->nickName."<br />";;
	}
	
}
?>