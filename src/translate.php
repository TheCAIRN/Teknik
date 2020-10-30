<?php
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
else
    $lang = $_SERVER['LANG'];
if (strlen($lang)>=5) $lang=substr($lang,0,5);
$lang = strtolower(str_replace('_','-',$lang));
require_once("lib/xlatein.$lang.php");
// Review euph/lucy/xlate.exu for command line parameters (passed via $_GET).
$source='POST';
$direction='in';

// Include HTML head

if (isset($_POST['engin']) || $source!='POST') {
    if ($direction == 'in') {
    	$tekout = $translatorClassIn->FlatTranslate($_POST['engin']);
	$words = explode(' ',$tekout);
	$tekout = str_replace(' ','<br />',$tekout);
	$utwords = array();
	foreach($words as $word)
		if (!preg_match('/[0-9a-fA-Fx]{20}/',$word))
			$utwords[] = $word;
	echo $tekout.'<br />';
	echo 'Untranslated words: '.implode(' ',$utwords).'<br />';
	// print_tek(EngToTek(input));
    } elseif ($direction == 'out') {
	echo 'out';
	// pretty_print(1,TekToEng(input),{});
    } else
	echo "This mode is not supported.<br />";
}
?>
<form method="POST" action="translate.php">
<textarea name="engin" rows=10 cols=60></textarea><br>
<input type="submit" name="submit" value="Translate"></input><br>
</form>
<?php
// Include HTML foot
?>
