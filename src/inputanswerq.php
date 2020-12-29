<?php
session_start();
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
else
    $lang = $_SERVER['LANG'];
if (strlen($lang)>=5) $lang=substr($lang,0,5);
$lang = strtolower(str_replace('_','-',$lang));
require_once("lib/xlatein.$lang.php");
require_once("lib/parser.$lang.php");
// Review euph/lucy/xlate.exu for command line parameters (passed via $_GET).
$source='POST';
$direction='in';

if (isset($_POST['reset'])) $_SESSION = array();
if (!isset($_SESSION['inputeng'])) $_SESSION['inputeng'] = array();
if (!isset($_SESSION['inputtek'])) $_SESSION['inputtek'] = array();
if (!isset($_SESSION['utwords'])) $_SESSION['utwords'] = array();

if (isset($_POST['engin']) || $source!='POST') {
    if ($direction == 'in') {
		$sentences = $parserClass->SentenceSplit($_POST['engin']);
		foreach ($sentences as $s) {
			$tekout = $translatorClassIn->FlatTranslate($s);
			$words = explode(' ',$tekout);
			$tekout = str_replace(' ','<br />',$tekout);
			$utwords = array();
			foreach($words as $word)
				if (!preg_match('/[0-9a-fA-Fx]{20}/',$word))
					$utwords[] = $word;
			// echo $tekout.'<br />';
			// echo 'Untranslated words: '.implode(' ',$utwords).'<br />';
			// print_tek(EngToTek(input));
			if (isset($_POST['input'])) {
				$_SESSION['inputeng'][] = $s;
				$_SESSION['inputtek'][] = $words;
				$_SESSION['utwords'][] = $utwords;
			}
		}
    } elseif ($direction == 'out') {
	// echo 'out';
	// pretty_print(1,TekToEng(input),{});
    } // else
	// echo "This mode is not supported.<br />";
}
?>
<!DOCTYPE HTML>
<HTML>
<BODY>
<div style="float: left; width: 60%;">
<p>This is Teknik's Input / Question interface.  Add statements in the first textbox; then submit questions from the second.</p>
<form method="POST" action="inputanswerq.php"><input type="submit" name="reset" value="Reset" /><br /></form>
<form method="POST" action="inputanswerq.php">
<textarea name="engin" rows=10 cols=60></textarea><br>
<input type="submit" name="input" value="Input"></input><br>
</form>
<form method="POST" action="inputanswerq.php">
<textarea name="engin" rows=10 cols=60></textarea><br>
<input type="submit" name="question" value="Question"></input><br>
</form>
<div id="answers">

</div>
</div>
<div id="statements" style="float:left; width: 38%;">
<?php 
foreach ($_SESSION['inputeng'] as $e) echo $e.'<BR />';
foreach ($_SESSION['inputtek'] as $tek) {
	var_dump($tek);
	echo '<BR />';
}
foreach ($_SESSION['utwords'] as $ut) {
	var_dump($ut);
	echo '<BR />';
}
?>
</div>
</BODY>
</HTML>
<?php
// Include HTML foot
?>
