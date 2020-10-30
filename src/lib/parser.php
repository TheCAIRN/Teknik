<?php
abstract class Parser {
	protected $origdoc;
	protected $origdocarray;
	// abstract protected function Structure($docin);
	abstract public function SectionSplit($docin);
	abstract public function ParagraphSplit($docin);
	abstract public function SentenceSplit($docin);
	abstract public function Tokenize($sentence);
}
?>
