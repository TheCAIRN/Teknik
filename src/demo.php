<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<TITLE>Teknik Demo</TITLE>
<STYLE>
.lineNumber {
	float: left;
	color: #FF0000;
	padding-right: 3px;
}
.sentence {
	
}
</STYLE>
</HEAD>
<BODY>
<?php
$fp = fopen('doc/AesopsFablesForChildren.txt','r');
//$fp = fopen('doc/Passage6.txt','r');
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
else
    $lang = $_SERVER['LANG'];
if (strlen($lang)>=5) $lang=substr($lang,0,5);
$lang = strtolower(str_replace('_','-',$lang));
require_once("lib/parser.$lang.php");
require_once("lib/xlatein.$lang.php");
$sentenceArray = $parserClass->SentenceSplit($fp);
for ($i=0;$i<count($sentenceArray);$i++) {
//	echo '<div class="lineNumber">'.$i.'. </div><div class="sentence">'.$sentenceArray[$i].'</div>';
//	$tekout = $translatorClassIn->FlatTranslate($sentenceArray[$i]);
	$ngrams = $translatorClassIn->nGram($sentenceArray[$i],2);
//	echo $tekout.'<br />';	
}
$ngt = $translatorClassIn->getNGramTree();
foreach ($ngt as $word=>$stats) {
	if ($word=='<s>') $word = '[Sentence Start]';
	if ($word=='</s>') $word = '[Sentence End]';
	echo "$word: {$stats[0]}<br />";
	if (count($stats)>1) {
		/*
		foreach ($stats as $stat=>$gram) {
			$distword = preg_split('|',$stat);
			if ($distword[1]=='<s>') $distword[1] = '[Sentence Start]';
			if ($distword[1]=='</s>') $distword[1] = '[Sentence End]';
			echo "--- {$distword[1]}, distance {$distword[0]}: {$gram[0]}<br />";
		}
		*/
		foreach ($stats[1] as $gram2=>$count2)
	echo "--- $gram2: $count2 <br />";
	}
}
/*
$unk = $translatorClassIn->getUnknowns();
foreach ($unk as $word=>$wc) {
	if ($wc > 5) echo "$word: $wc<br />";
}
*/
fclose($fp);
?>
</BODY>
</HTML>