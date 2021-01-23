<?php
require_once('xlatein.php');
class XlateInEnUs extends XlateIn {
	protected $tekflat = array();
	protected $unknown = array();
	protected $ngramtree = array();
	protected $ngramEntityCount;
	protected $ngramEntityMax;
	protected $tekintype = 'Unknown';
	public function __construct() {
		$this->ngramEntityCount = 0;
		$this->ngramEntityMax = 1000;
		$tekintype = 'Unknown';
	}
	protected function Numbers($strin) {
		$strout = $strin;
		// Positive integers
		preg_match_all('/\s\d+\s/',$strout,$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
		foreach($list as $match) {
			if (is_array($match)) foreach($match as $item) {
				if ($item[0]==1)
					$strout = str_replace($item[0],sprintf(' c33644ff6ff0301%05u ',$item[0]),$strout);
				elseif ($item[0]==2)
					$strout = str_replace($item[0],sprintf(' c33674ff6ff0301%05u ',$item[0]),$strout);
				else
					$strout = str_replace($item[0],sprintf(' c33694ff6ff0301%05u ',$item[0]),$strout);
			} 
			else {
				if ($match[0]==1)
					$strout = str_replace($match[0],sprintf(' c33644ff6ff0301%05u ',$match[0]),$strout);
				elseif ($match[0]==2)
					$strout = str_replace($match[0],sprintf(' c33674ff6ff0301%05u ',$match[0]),$strout);
				else
					$strout = str_replace($match[0],sprintf(' c33694ff6ff0301%05u ',$match[0]),$strout);
			}
		}		
		// Negative integers
		preg_match_all('/\s\-\d+\s/',$strout,$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
		foreach($list as $match) {
			if (is_array($match)) foreach($match as $item) {
				if ($item[0]==1)
					$strout = str_replace($item[0],sprintf(' c33614ff6ff0301%05u ',$item[0]),$strout);
				elseif ($item[0]==2)
					$strout = str_replace($item[0],sprintf(' c336c4ff6ff0301%05u ',$item[0]),$strout);
				else
					$strout = str_replace($item[0],sprintf(' c336e4ff6ff0301%05u ',$item[0]),$strout);
			} 
			else {
				if ($match[0]==1)
					$strout = str_replace($match[0],sprintf(' c33614ff6ff0301%05u ',$match[0]),$strout);
				elseif ($match[0]==2)
					$strout = str_replace($match[0],sprintf(' c336c4ff6ff0301%05u ',$match[0]),$strout);
				else
					$strout = str_replace($match[0],sprintf(' c336e4ff6ff0301%05u ',$match[0]),$strout);
			}
		}		
		// Positive integer dollars
		preg_match_all('/\s$\d+\s/',$strout,$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
		foreach($list as $match) {
			if (is_array($match)) foreach($match as $item) {
				if ($item[0]==1)
					$strout = str_replace($item[0],sprintf(' c33644ff6ff0302%05u ',$item[0]),$strout);
				elseif ($item[0]==2)
					$strout = str_replace($item[0],sprintf(' c33674ff6ff0302%05u ',$item[0]),$strout);
				else
					$strout = str_replace($item[0],sprintf(' c33694ff6ff0302%05u ',$item[0]),$strout);
			} 
			else {
				if ($match[0]==1)
					$strout = str_replace($match[0],sprintf(' c33644ff6ff0302%05u ',$match[0]),$strout);
				elseif ($match[0]==2)
					$strout = str_replace($match[0],sprintf(' c33674ff6ff0302%05u ',$match[0]),$strout);
				else
					$strout = str_replace($match[0],sprintf(' c33694ff6ff0302%05u ',$match[0]),$strout);
			}
		}		
		return $strout;
	} // private Numbers
	protected function Punctuation($strin) {
		/*** TO DO ***/
		/*** Note: Many punctuation characters are already being translated from the database during Phrases() ***/
		return $strin;
	} // private Punctuation
	protected function Phrases($strin,$mode) {
		/*** TO DO:
		 * Move DB functions to their own class
		 * Complete the phrase lookup
		 * Include a logging engine
		 ***/
		$lstrin = strtolower(trim($strin));
		$phraselist = array();
		$dblink = mysqli_connect('localhost','msabalne_teknik','teknikaipw','msabalne_teknik');
		if (!$dblink) return $strin;
		$startat = 0; // to be used with limit and paging
		$qstrin = mysqli_real_escape_string($dblink,$strin);
		$q = "select tek,trn from tektrn where '$qstrin' like concat('%',trn,'%') and lang='eng' order by length(trn) desc;";
		$result = mysqli_query($dblink,$q);
// echo '<br />Scanning '.$startat.' phrases ['.number_format(mysqli_num_rows($result)).' rows]....'.$strin;
		if ($result!==false && mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$cpos = stripos($strin,$row['trn']);
// echo "({$row['trn']}:$cpos)";
				if ($cpos===false) {
					// Do nothing.
				} elseif ($cpos > 0 && !ctype_punct(substr($strin,$cpos-1,1)) && !ctype_space(substr($strin,$cpos-1,1))) {
					// Partial word match
				} elseif ($cpos+strlen($row['trn']) < strlen($strin) && !ctype_punct(substr($strin,$cpos+strlen($row['trn']),1)) && !ctype_space(substr($strin,$cpos+strlen($row['trn']),1))) {
					// Partial word match
				} elseif ($cpos===0 && strlen($strin)==strlen($row['trn'])) {
					return $row['tek'];
				} elseif ($cpos===0) {
					return $row['tek'] . ' ' . $this->Phrases(trim(substr($strin,strlen($row['trn']))),$mode);
				} elseif ($cpos+strlen($row['trn']) >= strlen($strin)) {
					return $this->Phrases(trim(substr($strin,0,$cpos)),$mode).' '.$row['tek'];
				} elseif ($cpos!==false) {
					return $this->Phrases(trim(substr($strin,0,$cpos)),$mode) . ' ' . $row['tek'] . ' ' . $this->Phrases(trim(substr($strin,$cpos+strlen($row['trn']))),$mode);
				}
			}
		}
		return $strin;
	} // private Phrases
	public function FlatTranslate($strin) {
		$strin = trim($strin);
		if (substr($strin,-1)=='?') $tekintype = 'Question';
		else $tekintype = 'Statement';
		$english = $this->Phrases($strin,1);
		$english = $this->Phrases($english,2);
		$english = $this->Numbers($english);
		$english = $this->Punctuation($english);
		//preg_match_all('/(^(\s[0-9A-Fa-fXx]{20}\s))/',$english,$unklist,PREG_PATTERN_ORDER);
		$wordsplit = preg_split('/\s/',$english);
		$verbindex = -1;
		$wordptr = 0;
		foreach ($wordsplit as $item) {
			$istek = false;
			if (preg_match('/[0-9A-Fa-fXx]{20}/',$item)) $istek=true;
			elseif (isset($this->unknown[strtolower($item)])) $this->unknown[strtolower($item)]++;
			else $this->unknown[strtolower($item)] = 1;
			echo 'Wordptr: '.$wordptr.'; istek: '.$istek.'; Item: '.$item.'; POS: '.($istek?substr($item,1,1):'?').'<BR />';
			if ($istek && $verbindex==-1 && substr($item,1,1)=='2') {$verbindex=$wordptr;}
			$wordptr++;
		}
		// Sloppy Named Entity Recognition.
		// TODO: Update gender marker based on pronouns found later in the sentence.
		// TODO: Dereference pronouns.
		if ($verbindex==1 && !preg_match('/[0-9A-Fa-fXx]{20}/',$wordsplit[0])) {
			$this->namereference[$wordsplit[0]] = sprintf('c13f41ff61aff%09u',$this->namecounter);
			$english = str_replace($wordsplit[0].' ',sprintf('c13f41ff61aff%09u ',$this->namecounter),$english);
			$this->namecounter++;
		}
		return $english;
	} // public FlatTranslate
	public function Validate($strin,$flat) {

	} // public Validate
	public function Pump($flat) {

	} // public Pump
	public function Translate($strin) {
		$tekflat = FlatTranslate($strin);
	} // public Translate
	public function PrintTek($tek) {
		if (is_string($tek)) $tek = Translate($tek);
		var_dump($tek);
	} // public PrintTek
	public function nGram($strin,$n) {
		// The tags <s> and </s> indicate the start and end of a sentence, 
		// as it will be interesting to identify the most common words 
		// at the beginning and end of sentences in a given corpus.
		if ($n < 1) return;
		$wordsplit = preg_split('/\s/','<s> '.strtolower($strin).' </s>');
		for ($i=0;$i<count($wordsplit);$i++) {
			if ($this->ngramEntityCount < $this->ngramEntityMax && !isset($this->ngramtree[$wordsplit[$i]])) {
				$this->ngramtree[$wordsplit[$i]] = array();
				if ($n==1) $this->ngramtree[$wordsplit[$i]][0] = 0;
				else {
					$this->ngramtree[$wordsplit[$i]][0] = 0;
					$this->ngramtree[$wordsplit[$i]][1] = array();
				}
				$this->ngramEntityCount++;
			}
			if (!isset($this->ngramtree[$wordsplit[$i]])) return; // Exceeded ngramEntityMax
			$this->ngramtree[$wordsplit[$i]][0]++;
			//if ($n > 1) {
			if ($n==2 && $i+1 < count($wordsplit)) {
				$j = $i + 1;
				/*for ($j=$i+1;$j<count($wordsplit);$j++) {
					$w = $wordsplit[$i];
					if ($this->ngramEntityCount < $this->ngramEntityMax && !isset($this->ngramtree[$w][1][$j.'|'.$wordsplit[$j]])) {
						if ($n==2) $this->ngramtree[$w][1][$j.'|'.$wordsplit[$j]] = array(0);
						else $this->ngramtree[$w][1][$j.'|'.$wordsplit[$j]] = array(0,array());
						$this->ngramEntityCount++;
					}
					$this->ngramtree[$w][1][$j.'|'.$wordsplit[$j]][0]++;
				} */
				$w = $wordsplit[$i];
				$w2 = $wordsplit[$j];
				if ($this->ngramEntityCount < $this->ngramEntityMax && !isset($this->ngramtree[$w][1][$w2])) {
					$this->ngramtree[$w][1][$w2] = 0;
					$this->ngramEntityCount++;
				}
				if ($this->ngramEntityCount < $this->ngramEntityMax) $this->ngramtree[$w][1][$w2]++;
				
			}
		}
	}
	public function resetNGramTree() {
		$this->ngramtree = array();
	}
	public function getUnknowns() {
		arsort($this->unknown);
		return $this->unknown;
	}
	public function getNGramTree() {
		arsort($this->ngramtree);
		return $this->ngramtree;
	}
} // class XlateInEnUs
$translatorClassIn = new XlateInEnUs();

?>
