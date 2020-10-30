<?php
require_once('parser.php');
class ParserEnUs extends Parser {
	public function __construct() {
		
	}
	public function SectionSplit($docin) {
		
	}
	public function ParagraphSplit($docin) {
		
	}
	public function SentenceSplit($docin) {
		if (is_string($docin)) {
			$feed = $docin;
		}
		if (is_resource($docin)) {
			$feed = stream_get_contents($docin);
		}
		preg_match_all('/[!?\.]\s+[A-Z]/',$feed,$out,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
		$s = array();
		$lastoffset = -1;
		$extchar = array(chr(151),chr(147),chr(148),chr(146));
		$stdchar = array(" -- ","\"","\"","'");
		foreach ($out[0] as $match) {
			$s[] = str_replace($extchar,$stdchar,substr($feed,$lastoffset+1,$match[1]-$lastoffset+1));
			$lastoffset = $match[1]+1;
		}
		$s[] = substr($feed,$lastoffset+1);
		return $s;
	}
	public function Tokenize($sentence) {
		
	}
}
$parserClass = new ParserEnUs();
?>