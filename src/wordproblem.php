<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<TITLE>Teknik Word Problem Demo</TITLE>
<STYLE>
.lineNumber {
	float: left;
	color: #FF0000;
	padding-right: 3px;
}
.sentence {
	
}
.question {
	font-weight: bold;
	color: #000000;
}
.answer {
	font-weight: normal;
	color: #555500;
}
</STYLE>
</HEAD>
<BODY>
<?php
$fp = fopen('doc/MathWordProblemsGrade2.txt','r');
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
else
    $lang = $_SERVER['LANG'];
if (strlen($lang)>=5) $lang=substr($lang,0,5);
$lang = strtolower(str_replace('_','-',$lang));
require_once("lib/parser.$lang.php");
require_once("lib/xlatein.$lang.php");
$nameprefixes = array('Mr.','Mrs.','Miss','Dr.','Rev.');
$names = array();
$nameCtr = 1;
$stoppedAt = count($names);
$doweng = array(' Sunday',' Monday',' Tuesday',' Wednesday',' Thursday',' Friday',' Saturday');
$dowtrans = array(' {0d010411001}',' {0d010411002}',' {0d010411003}',' {0d010411004}',' {0d010411005}',' {0d010411006}',' {0d010411007}');
$holidayeng = array(" Valentine's Day"," Christmas"," Halloween");
$holidaytrans = array(" {0d01054120e}"," {0d010541c19}"," {0d010541a1f}");
$coinseng = array(" penny"," pennies"," nickels"," nickel"," dimes"," dime"," quarters"," quarter");
$coinstrans = array(" {ff030213001}"," {ff030213001}"," {ff030213005}"," {ff030213005}"," {ff030213010}"," {ff030213010}"," {ff030213025}"," {ff030213025}");
$conjeng = array(" more than "," less than ");
$conjtrans = array(" {ff020334001} "," {ff020334002} ");
$humaneng = array(' boys',' boy',' girls',' girl',' children',' child');
$humantrans = array(' {0f010511005}',' {0f010511005}',' {0f020511005}',' {0f020511005}',' {0f030511005}',' {0f030511005}');
$extchar = array(chr(151),chr(147),chr(148),chr(146)); // in Parser::SentenceSplit
$stdchar = array(" -- ","\"","\"","'"); // in Parser::SentenceSplit
while (($problem=fgets($fp))!==false) {
	$parts = explode("\t",trim($problem));
	$parts[1] = str_replace($extchar,$stdchar,$parts[1]); // in Parser::SentenceSplit
	$parts[1] = str_replace($doweng,$dowtrans,$parts[1]);
	$parts[1] = str_replace($holidayeng,$holidaytrans,$parts[1]);
	$parts[1] = str_replace($conjeng,$conjtrans,$parts[1]);
	$parts[1] = str_replace($coinseng,$coinstrans,$parts[1]);
	$parts[1] = str_replace($humaneng,$humantrans,$parts[1]);
	$sentenceArray = $parserClass->SentenceSplit($parts[1]);
	$howmanywhat = strpos($parts[1],' How many ');
	if ($howmanywhat!==false) {
		$nextspace = strpos($parts[1],' ',$howmanywhat+10);
		$howmanywhat = substr($parts[1],$howmanywhat+10,$nextspace-($howmanywhat+10));
		echo 'Looking for '.$howmanywhat.'<BR />';
	}
	$parts[1] = str_replace('?',' {ff010112002}',$parts[1]);
	// 1. Named Entity recognition
	preg_match_all('/((^|\s)(Mr\.|Mrs\.|Miss|Dr\.|Rev\.)\s[A-Z]\w+\s)/',$parts[1],$formalNames,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
	print_r($formalNames);
	foreach($formalNames as $match) {
		$thisName = "";
		if (is_array($match)) foreach ($match as $item) {
			if (preg_match('/(Mr\.|Mrs\.|Miss|Dr\.|Rev\.)/',$item[0]))
				if (strlen($thisName)>0) {
					if (!in_array(trim($thisName),$names)) $names[$nameCtr++] = $thisName;
					$thisName = trim($item[0]);
				}
			else $thisName .= trim($item[0]);
		} 
		else $thisName .= trim($match[0]);
		if (strlen($thisName)>0 && !in_array(trim($thisName),$names) && !in_array(trim($thisName),$nameprefixes)) 
			$names[$nameCtr++] = $thisName;
	}
	foreach($names as $nameKey=>$name) {
		$parts[1] = str_replace($name,sprintf('{19990000%03u}',$nameKey),$parts[1]);
	}
	$stoppedAt = count($names);
	foreach($sentenceArray as $sentence) {
		$cpos = strpos($sentence,' '); 
		preg_match_all('/(\s[A-Z]\w+(")?(\s|([!\?\.]$)))/',substr($sentence,$cpos),$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
		foreach($list as $match) {
			if (is_array($match)) foreach ($match as $item) {
				if (is_array($item)) $ii = $item[0]; else $ii = $item;
				if (strlen($ii)>0 && !in_array(trim($ii),$names)) $names[$nameCtr++] = trim($ii);
				break;	// Elements other than the first are punctuation
			} 
			elseif (strlen(trim($match[0]))>0 && !in_array(trim($match[0]),$names)) 
				$names[$nameCtr++] = trim($match[0]);
		}
	}
	foreach($names as $nameKey=>$name) {
		$parts[1] = str_replace($name,sprintf('{19990000%03u}',$nameKey),$parts[1]);
	}
	// 2. Number recognition
	preg_match_all('/\s\d+\s/',$parts[1],$list,PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE);
	foreach($list as $match) {
		if (is_array($match)) foreach($match as $item) {
			$parts[1] = str_replace($item[0],sprintf(' {ff0301%05u} ',$item[0]),$parts[1]);
		} 
		else $parts[1] = str_replace($match[0],sprintf(' {ff0301%05u} ',$match[0]),$parts[1]);
	}
	echo '<DIV id="Question'.number_format($parts[0]).'" class="question">'.$parts[1].'</DIV>';
	// 3. Identify the question
	$op = '0'; // no op
	$question = $sentenceArray[count($sentenceArray)-1];
	if (substr($question,-1)=='?') {
		// We have a winner.
		if (stripos($question,'in all')!==false) $op = '+';
		elseif (stripos($question,'left')!==false) $op = '-';
		elseif (stripos($question,'what is the sum')!==false) $op = '+';
		elseif (stripos($question,'what is the total')!==false) $op = '+';
	}
	// 4. Identify key verbs / phrases: buy/sell, take/give, have left, in all
	if ($op=='0') {
		
	}
	// 5. Create the equation, and solve.
	echo '<DIV id="Answer'.number_format($parts[0]).'" class="answer"></DIV><BR />';
	// 6. Display the answer as a complete sentence.
}
echo '<DIV>';
var_dump($names);
echo '</DIV>';
fclose($fp);
?>
</BODY>
</HTML>