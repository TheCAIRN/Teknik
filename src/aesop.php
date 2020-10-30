<?php
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<TITLE>NLP Demo</TITLE>
<STYLE>

</STYLE>
</HEAD>
<BODY>
<?php
class Aesop {
	private $filename;
	private $fp;
	private $endOfTOC;
	private $animals;
	private $numbers;
	private $ordinals;
	private $grammar;
	private $pronoun_s;
	private $pronoun_o;
	private $pronoun_p;
	function init() {
		$this->fp = fopen($this->filename,'r');
		$this->endOfTOC = 0;
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
			$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		else
			$lang = $_SERVER['LANG'];
		if (strlen($lang)>=5) $lang=substr($lang,0,5);
		$lang = strtolower(str_replace('_','-',$lang));
	}
	function getTableOfContents() {
		// Table of contents: [0] ID [1] Title [2] Page [3] Byte index
		$toc = array();
		$savp = ftell($this->fp);
		rewind($this->fp);
		$done = false;
		$foundtoc = false;
		while (!$done && (($line = fgets($this->fp))!==false)) {
			if ($foundtoc) {
				if (preg_match('/\d+$/',trim($line))>0) {
					$pn = strrpos(trim($line),' ');
					$toc[] = array(0,trim(substr($line,0,$pn)),trim(substr($line,$pn)),0);
				} elseif (count($toc)>1) {
					$done = true;
				} else {
					
				}
			} else {
				if (stripos($line,'table of contents')!==false || stripos($line,'A LIST OF THE FABLES')!==false) $foundtoc = true;
			}
		}
		$this->endOfTOC = ftell($this->fp);
		$done = false;
		$lastLine = $this->endOfTOC;
		$i = 0;
		while (!$done && (($line = fgets($this->fp))!==false)) {
			//for ($i=0;$i<count($toc);$i++) {
				if (stripos($line,$toc[$i][1])!==false) {
					$toc[$i][3] = $lastLine;
					$i++;
					// break;
				}
				elseif (levenshtein(strtoupper($line),strtoupper($toc[$i][1]))<(strlen($line)/10)) {
					$toc[$i][3] = $lastLine;
					$i++;
					//break;
				}
				elseif (trim($line)===strtoupper(trim($line))) {
					for ($j=$i+1;$j<count($toc);$j++) {
						if (stripos($line,$toc[$j][1])!==false) {
							$toc[$j][3] = $lastLine;
							$i = $j+1;
							// break;
						}
					}
				}
			// }
			$lastLine = ftell($this->fp);
		}
		fseek($this->fp,$savp);
		return $toc;
	}
	function getNamedEntities() {
		$ne = array();
		for ($story=0;$story<count($_SESSION['toc']);$story++) {
			if ($story==count($_SESSION['toc'])-1) {
				$tale = ''; // TODO
			} elseif($_SESSION['toc'][$story][3]!=0 && $_SESSION['toc'][$story+1][3]>$_SESSION['toc'][$story][3]) {
				fseek($this->fp,$_SESSION['toc'][$story][3]);
				$tale = fread($this->fp,$_SESSION['toc'][$story+1][3]-$_SESSION['toc'][$story][3]);
			} else $tale = '';
			$talesplit = $this->SentenceSplit($tale);
			foreach($talesplit as $sentence) {
				$cpos = strpos($sentence,' '); 
				preg_match_all('/\s[A-Z]\w+\s/',substr($sentence,$cpos),$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
				foreach($list as $match) {
					if (is_array($match)) foreach ($match as $item) {
						if (in_array(strtolower(trim($item[0])),$this->grammar)) continue; // Don't include grammar words
						elseif (in_array(strtolower(trim($item[0])),$this->pronoun_s)) continue; // Don't include grammar words
						elseif (trim($item[0])===strtoupper(trim($item[0]))) continue; // Don't include allcaps
						elseif (!in_array(trim($item[0]),$ne)) $ne[] = trim($item[0]);
					} elseif (in_array(strtolower(trim($match[0])),$this->grammar)) continue; // Don't include grammar words
					elseif (trim($match[0])===strtoupper(trim($match[0]))) continue; // Don't include allcaps
					elseif (!in_array(trim($match[0]),$ne)) $ne[] = trim($match[0]);
				}
			}
		}
		return $ne;
	}
	public function SentenceSplit($docin) {
		if (is_string($docin)) {
			$feed = $docin;
		}
		if (is_resource($docin)) {
			$feed = stream_get_contents($docin);
		}
		preg_match_all('/([:!\?\.]([\''.chr(146).'])?(["'.chr(148).'])?\s+[A-Z])|\n/',$feed,$out,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
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
	function __construct() {
		// Original file location: http://www.gutenberg.org/files/19994/19994.txt
		$this->filename = 'doc/AesopsFablesForChildren.txt';
		$this->animals = array('sheep','fox','wolf','bear','cow');
		$this->numbers = array('one','two','three','four','five','six','seven','eight','nine','ten');
		$this->ordinals = array('first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth');
		$this->grammar = array('a','an','the','is','was','were','are','there','here','all','and','but','or','as','no');
		$this->pronoun_s = array('i','you','he','she','it','we','they');
		$this->pronoun_o = array('me','you','him','her','it','us','them');
		$this->pronoun_p = array('my','your','his','her','its','our','their');
		$this->init();
		if (!isset($_SESSION['toc'])) {
			$toc = $this->getTableOfContents();
			$_SESSION['toc'] = $toc;
		}
		echo "<A href=\"{$this->filename}\">Aesop's Fables</A><BR />Table of Contents<BR /><BR /><TABLE>";
		foreach($_SESSION['toc'] as $c) {
			echo '<TR><TD>'.$c[0].'</TD><TD>'.$c[1].'</TD><TD>page '.$c[2].'</TD><TD>byte position '.$c[3].'</TD></TR>';
		}
		echo '</TABLE><BR />Named Entities<BR /><BR />|';
		$namedEntities = $this->getNamedEntities();
		sort($namedEntities);
		foreach ($namedEntities as $n) echo ' '.$n.' |';
		echo '<BR />';
		fclose($this->fp);
	}
} // class
new Aesop();
?>
</BODY>
</HTML>