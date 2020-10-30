<?php
/** api.wiktionary.php
 *  Author: Michael J. Sabal
 *  Project: Teknik Language Specification / Lucy bot
 *
 *  Description: Provide an interface to the downloadable
 *  wiktionary XML database, allowing a search on words
 *  in a native language, including part of speech, sense and
 *  meaning, and examples of usage.  The primary use of this
 *  API is to enable the translator to guess at the meaning
 *  of unfamiliar words.
 *
 *  CHANGELOG:
 *  - 16 Oct 2009: 0.01a - Initial framework
**/

class API_Wiktionary {
	private $BASE_DIR;
	private $default_file = '';
	public  $language = 'eng';
	private function construct($lang,$file) {
		$language = $lang;
	}
	function __construct($lang,$file='') {
		if (isset($_SERVER['SCRIPT_FILENAME'])) 
			$this->BASE_DIR=dirname($_SERVER['SCRIPT_FILENAME']);
		else $this->BASE_DIR=getcwd();
		$this->default_file = $this->BASE_DIR.'/library/wiki/word-'.$lang.'.xml';
		if (empty($file)) $file=$this->default_file;
		$this->language = $lang;
	}




} // class API_Wiktionary
?>
