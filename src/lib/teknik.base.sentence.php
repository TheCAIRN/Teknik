<?php
class TekSentence {
	private $sentence;
	public function __construct($v=null,$s=null,$do=null,$io=null,$t=null,$dir=null,$loc=null) {
		$this->sentence = array();
		$this->sentence[0] = $v;
		$this->sentence[1] = $s;
		$this->sentence[2] = $do;
		$this->sentence[3] = $io;
		$this->sentence[4] = $t;
		$this->sentence[5] = $dir;
		$this->sentence[6] = $loc;
	}
	public function getSentence() {
		return $this->sentence;
	}
	public function setVerb($v) {
		$this->sentence[0] = $v;
	}
	public function setSubject($s) {
		$this->sentence[1] = $s;
	}
	public function setDirectObject($do) {
		$this->sentence[2] = $do;
	}
	public function setIndirectObject($io) {
		$this->sentence[3] = $io;
	}
	public function setTimeReference($t) {
		$this->sentence[4] = $t;
	}
	public function setDirectionReference($dir) {
		$this->sentence[5] = $dir;
	}
	public function setLocationReference($loc) {
		$this->sentence[6] = $loc;
	}
	public function getVerb() {
		return $this->sentence[0];
	}
	public function getSubject() {
		return $this->sentence[1];
	}
	public function getDirectObject() {
		return $this->sentence[2];
	}
	public function getIndirectObject() {
		return $this->sentence[3];
	}
	public function getTimeReference() {
		return $this->sentence[4];
	}
	public function getDirectionReference() {
		return $this->sentence[5];
	}
	public function getLocationReference() {
		return $this->sentence[6];
	}
} // class TekSentence
?>
