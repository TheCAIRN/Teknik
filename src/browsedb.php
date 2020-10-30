<?php
$search = '';
$tekcode = '';
function search() {
	$dblink = mysqli_connect('localhost','msabalne_teknik','teknikaipw','msabalne_teknik');
	if (!$dblink) {
		return "";
	}
	$search = $s = $_POST['searchbox'];
	$q = 'SELECT tek,trn,lang,rgn,pkey FROM tektrn WHERE tek LIKE ? OR trn LIKE ?';
	$stmt = $dblink->prepare($q);
	$stmt->bind_param('ss',$p1,$p2);
	$p1 = $p2 = '%'.$s.'%';
	$result = $stmt->execute();
	$stmt->bind_result($tek,$trn,$lang,$rgn,$pkey);
	$stmt->store_result();
	if ($stmt->num_rows == 0) {
		$stmt->close();
		$dblink->close();
		return "No results found.";
	}
	$rtn = '<TABLE><TR><TH>Teknik</TH><TH>Translation</TH><TH>Language</TH><TH>Region</TH><TH>pkey</TH></TR>';
	while ($stmt->fetch()) 
		$rtn .= "<TR><TD>$tek</TD><TD>$trn</TD><TD>$lang</TD><TD>$rgn</TD><TD>$pkey</TD></TR>";
	$rtn .= '</TABLE>';
	return $rtn;
}
function listNextLevel($top) {
	$dblink = mysqli_connect('localhost','msabalne_teknik','teknikaipw','msabalne_teknik');
	if (!$dblink) {
		echo '';
		return;
	}
	while (strlen($top)<20) $top = 'x'.$top;
	$top = substr($top,9);
	$qstrin = mysqli_real_escape_string($dblink,$strin);
	$q = "select tek,trn from tektrn where '$qstrin' like concat('%',trn,'%') and lang='eng' order by length(trn) desc;";
	$result = mysqli_query($dblink,$q);

}
$results = '';
$searchval = '';
if (isset($_POST['searchbox'])) {
	$searchval = $_POST['searchbox'];
	$results = search();
}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<META charset="UTF-8">
<TITLE>Lucy Browse.db</TITLE>
<STYLE>
table, td {
	border: 1px solid black;
	text-align: center;
}
</STYLE>
<SCRIPT type="text/javascript">
function setTeknikCode() {
	var tek = "x";
	var t01 = document.getElementById("t01").value;
	var t02 = document.getElementById("t02").value;
	var t03 = document.getElementById("t03").value;
	var t04a = document.getElementById("t04a").value;
	var t04b = document.getElementById("t04b").value;
	var t04c = document.getElementById("t04c").value;
	var t05a = document.getElementById("t05a").value;
	var t05b = document.getElementById("t05b").value;
	var t05c = document.getElementById("t05c").value;
	var t06 = document.getElementById("t06").value;
	var t07 = document.getElementById("t07").value;
	var t08a = document.getElementById("t08a").value;
	var t08b = document.getElementById("t08b").value;
	var t09 = document.getElementById("t09").value;
	tek += t01 + t02 + t03;
	if (t04a!='x') {
		t04a = parseInt(t04a,16);
		if (t04c==1) t04a += 6;
		if (t04b==1) t04a += 3;
	}
	tek += t04a.toString(16);
	if (t05a==1) {
		if (t05b==1) {
			tek += (t05c-3).toString(16);
		} else if (t05b==2 || t05c==1) tek += 'c';
		else tek += (t05c+8).toString(16);
	} else {
		if (t05b==1) {
			tek += (t05c).toString(16);
		} else if (t05b==2 || t05c==1) tek += '7';
		else tek += (t05c+3).toString(16);
	}
	tek += t06 + t07;
	if (t08b==1) t08a += 5;
	tek += t08a + t09;
	t01 = t02 = t03 = t04a = t04b = t04c = t05a = t05b = t05c = t06 = t07 = t08a = t08b = t09 = undefined;
	tek = tek.substring(1);
	var tekCode = document.getElementById("tek");
	tekCode.value = tek;
}
function onChange_t02() {
	var pos = document.getElementById("t02").value;
	var opt = '<OPTION value="x">Specific part of speech:</OPTION>';
	if (pos=="1") {
		opt += '<OPTION value="1">Count</OPTION>' +
			'<OPTION value="2">Non-count</OPTION>' + 
			'<OPTION value="3">Proper noun</OPTION>' + 
			'<OPTION value="4">Pronoun</OPTION>' + 
			'<OPTION value="5">Possessive noun</OPTION>' +
			'<OPTION value="6">Possessive Pronoun</OPTION>';
	} else if (pos=="2") {
		opt += '<OPTION value="0">Intransative</OPTION>' +
			'<OPTION value="1">Either vi or vt</OPTION>' +
			'<OPTION value="2">V.t. requires a proper noun</OPTION>' +
			'<OPTION value="3">V.t. requires any noun</OPTION>' +
			'<OPTION value="4">Requires Adjective</OPTION>' +
			'<OPTION value="5">Requires Gerund</OPTION>' +
			'<OPTION value="6">Requires Infinitive</OPTION>' +
			'<OPTION value="7">Requires a relative clause</OPTION>' +
			'<OPTION value="8">Requires both direct & indirect object</OPTION>' +
			'<OPTION value="9">Requires a quotation</OPTION>' +
			'<OPTION value="a">Requires a quotation and ind. obj.</OPTION>' +
			'<OPTION value="b">Requires a dependent rel. clause</OPTION>' +
			'<OPTION value="c">Requires a quantity</OPTION>' +
			'<OPTION value="d">Auxiliary verb</OPTION>' +
			'<OPTION value="e">Modal auxiliary</OPTION>';
	} else if (pos=="3") {
		opt += '<OPTION value="1">Simple Adjective</OPTION>' +
			'<OPTION value="2">Article</OPTION>' +
			'<OPTION value="3">Number</OPTION>' +
			'<OPTION value="4">Proper Possessive Adj.</OPTION>' +
			'<OPTION value="5">Possessive Pronoun Adj.</OPTION>' +
			'<OPTION value="6">Capitalized Adj.</OPTION>';
	} else if (pos=="4") {
		opt += '<OPTION value="1">Transitional Adverb</OPTION>' +
			'<OPTION value="2">Sentence Adverb</OPTION>' +
			'<OPTION value="3">Central Adverb</OPTION>' +
			'<OPTION value="4">Modifies verb at the end of the sentence</OPTION>' + 
			'<OPTION value="5">Modifies an adjective</OPTION>' +
			'<OPTION value="6">Modifies an adverb</OPTION>' +
			'<OPTION value="7">Motion Adverb</OPTION>' +
			'<OPTION value="8">Time Adverb</OPTION>' +
			'<OPTION value="9">Frequency Adverb</OPTION>' +
			'<OPTION value="a">Phrasal verb adverb</OPTION>';
	} else if (pos=="5") {
		opt += '<OPTION value="1">Location</OPTION>' +
			'<OPTION value="2">Motion</OPTION>' +
			'<OPTION value="3">Time</OPTION>' +
			'<OPTION value="4">Relation</OPTION>';
	} else if (pos=="6") {
		opt += '<OPTION value="1">Local</OPTION>' +
			'<OPTION value="2">Verb</OPTION>' +
			'<OPTION value="3">Sentence</OPTION>' +
			'<OPTION value="4">Conditional</OPTION>' +
			'<OPTION value="5">Subordinate</OPTION>';
	}
	
	opt += '<OPTION value="f">N/A</OPTION>';
	var t03 = document.getElementById("t03");
	t03.innerHTML = opt;
	
	var t06 = document.getElementById("t06");
	var ca = '<OPTION value="f">Case Agreement:</OPTION>';
	if (pos=="1") {
		ca += '<OPTION value="1">NOM: subjective</OPTION>' + 
			'<OPTION value="2">ACC: direct object</OPTION>' +
			'<OPTION value="3">DAT: indirect object</OPTION>' +
			'<OPTION value="4">Prepositional</OPTION>' +
			'<OPTION value="5">LOC(1): locative in motion</OPTION>' +
			'<OPTION value="6">GEN: possessive</OPTION>' +
			'<OPTION value="7">LOC(2): locative stationary</OPTION>' +
			'<OPTION value=*8">INS: instrumental (with x)</OPTION>' +
			'<OPTION value="9">VOC: vocative, form of address</OPTION>';
	} else if (pos=="2") {
		ca += '<OPTION value="1">Plain</OPTION>' +
			'<OPTION value="2">Gerund</OPTION>' +
			'<OPTION value="3">Infinitive</OPTION>' +
			'<OPTION value="4">Conditional</OPTION>' +
			'<OPTION value="5">Command</OPTION>' +
			'<OPTION value="6">Passive</OPTION>' +
			'<OPTION value="7">Perfect</OPTION>' +
			'<OPTION value="8">(be able to)</OPTION>' +
			'<OPTION value="9">(have to)</OPTION>' +
			'<OPTION value="a">Adjectival</OPTION>' +
			'<OPTION value="e">Subj+Plain verb contraction</OPTION>';
	}
	t06.innerHTML = ca;
	
	pos = undefined;
	t03 = undefined;
	setTeknikCode();
}
function onChange_f01() {
	var f01 = document.getElementById("f01").value;
	var f02 = document.getElementById("f02");
	if (f01=="01") {
		f02.innerHTML = '<OPTION value="01">General intros</OPTION>' +
			'<OPTION value="02">Small Talk</OPTION>' + 
			'<OPTION value="03">Stock query</OPTION>' +
			'<OPTION value="08">Food</OPTION>' +
			'<OPTION value="09">Clothing</OPTION>' +
			'<OPTION value="1a">Shelter</OPTION>' +
			'<OPTION value="1b">Neighborhood</OPTION>';
	}
	if (f01=="02") {
		f02.innerHTML = '<OPTION value="01">Natural</OPTION>' +
			'<OPTION value="02">Political</OPTION>' +
			'<OPTION value="03">Lat/long</OPTION>' +
			'<OPTION value="04">Specific</OPTION>';
	}
	if (f01=="05") {
		f02.innerHTML = '<OPTION value="01">Visual Arts</OPTION>' +
			'<OPTION value="02">Theater</OPTION>' +
			'<OPTION value="03">Film</OPTION>' +
			'<OPTION value="04">Radio Drama</OPTION>' +
			'<OPTION value="f0">Colors</OPTION>';
	}
	if (f01=="0c") {
		f02.innerHTML = '<OPTION value="01">Arithmetic</OPTION>' +
			'<OPTION value="02">Number Theory</OPTION>' +
			'<OPTION value="03">Algebra</OPTION>' +
			'<OPTION value="04">Geometry</OPTION>' +
			'<OPTION value="05">Trigonometry</OPTION>' +
			'<OPTION value="06">Calculus</OPTION>' +
			'<OPTION value="07">Algorithms</OPTION>';
	}
	if (f1=="1b") {
		f02.innerHTML = '<OPTION value="01">WWW</OPTION>' +
			'<OPTION value="02">Internet protocols</OPTION>' +
			'<OPTION value="03">Public Jargon</OPTION>' +
			'<OPTION value="04">Programming Jargon</OPTION>' +
			'<OPTION value="40">Public library</OPTION>' +
			'<OPTION value="41">Private library</OPTION>' +
			'<OPTION value="80">TV Mass Media</OPTION>' +
			'<OPTION value="81">Domestic Radio Mass Media</OPTION>' +
			'<OPTION value="82">Shortwave Radio</OPTION>' +
			'<OPTION value="83">Newspaper</OPTION>' +
			'<OPTION value="84">Magazine</OPTION>' +
			'<OPTION value="ff">General</OPTION>';
	}
	if (f1=="ff") {
		f02.innerHTML = '<OPTION value="01">Punctuation</OPTION>' +
			'<OPTION value="02">Function words</OPTION>' +
			'<OPTION value="03">Units of measure</OPTION>' +
			'<OPTION value="04">Question types</OPTION>';
	}
}
</SCRIPT>
</HEAD>
<BODY>
<FIELDSET>
<LEGEND>Search</LEGEND>
<FORM id="search" action="browsedb.php" method="POST">
<INPUT type="text" id="searchbox" name="searchbox" size="50" 
<?php echo " value=\"$searchval\" "; ?>
placeholder="Search by Teknik, word, or phrase" /><INPUT type="submit" value="Search" />
</FORM>
</FIELDSET>
<FIELDSET>
<LEGEND>Entry</LEGEND>
<FORM id="entry" action="browsedb.php" method="POST">
Language: <SELECT name="language" id="language"><OPTION value="en-US">English</OPTION></SELECT>
<INPUT type="text" id="trn" name="trn" placeholder="word or phrase" />
<INPUT type="text" id="tek" name="tek" placeholder="Teknik code" />
<BR />
	<SELECT id="t01" name="t01" onChange="setTeknikCode();">
		<OPTION value="x">Scope:</OPTION>
		<OPTION value="7">Question Word</OPTION>
		<OPTION value="8">Expression w/ head agreement</OPTION>
		<OPTION value="9">Static expression</OPTION>
		<OPTION value="a">Abstract</OPTION>
		<OPTION value="b">Prefix</OPTION>
		<OPTION value="c">Concrete</OPTION>
		<OPTION value="d">Stock phrase</OPTION>
		<OPTION value="e">Suffix</OPTION>
		<OPTION value="f">Other</OPTION>
	</SELECT>
	<SELECT id="t02" name="t02" onChange="onChange_t02();">
		<OPTION value="x">Part of Speech:</OPTION>
		<OPTION value="1">Noun</OPTION>
		<OPTION value="2">Verb</OPTION>
		<OPTION value="3">Adjective or determiner</OPTION>
		<OPTION value="4">Adverb</OPTION>
		<OPTION value="5">Preposition</OPTION>
		<OPTION value="6">Conjunction</OPTION>
		<OPTION value="7">Interjection</OPTION>
		<OPTION value="8">Question word</OPTION>
		<OPTION value="d">Stock phrase</OPTION>
		<OPTION value="e">Punctuation</OPTION>
		<OPTION value="f">N/A</OPTION>
	</SELECT>
	<SELECT id="t03" name="t03" onChange="setTeknikCode();">
		<OPTION value="x">Specific part of speech:</OPTION>
	</SELECT>
	<SELECT id="t04a" name="t04a" onChange="setTeknikCode();">
		<OPTION value="x">Grammatical Gender:</OPTION>
		<OPTION value="1">Male</OPTION>
		<OPTION value="2">Female</OPTION>
		<OPTION value="3">Neuter</OPTION>
		<OPTION value="f">Other</OPTION>
	</SELECT>
	<SELECT id="t04b" name="t04b" onChange="setTeknikCode();">
		<OPTION value="0">Animate</OPTION>
		<OPTION value="1">Inanimate</OPTION>
	</SELECT>
	<SELECT id="t04c" name="t04c" onChange="setTeknikCode();">
		<OPTION value="0">Specific</OPTION>
		<OPTION value="1">General</OPTION>
	</SELECT>
	<SELECT id="t05a" name="t05a" onChange="setTeknikCode();">
		<OPTION value="0">Positive</OPTION>
		<OPTION value="1">Negative</OPTION>
		<OPTION value="f">N/A</OPTION>
	</SELECT>
	<SELECT id="t05b" name="t05b" onChange="setTeknikCode();">
		<OPTION value="0">Singular</OPTION>
		<OPTION value="1">Double</OPTION>
		<OPTION value="2">Plural</OPTION>
		<OPTION value="f">N/A></OPTION>
	</SELECT>
	<SELECT id="t05c" name="t05c" onChange="setTeknikCode();">
		<OPTION value="4">First person</OPTION>
		<OPTION value="5">Second person</OPTION>
		<OPTION value="6">Third person</OPTION>
	</SELECT>
	<SELECT id="t06" name="t06" onChange="setTeknikCode();">
		<OPTION value="f">Case agreement:</OPTION>
	</SELECT>
	<SELECT id="t07" name="t07" onChange="setTeknikCode();">
		<OPTION value="f">Tense marker:</OPTION>
		<OPTION value="1">Present</OPTION>
		<OPTION value="2">Future</OPTION>
		<OPTION value="3">Past</OPTION>
		<OPTION value="4">Double Future</OPTION>
		<OPTION value="5">Double Past</OPTION>
		<OPTION value="6">Completed Future</OPTION>
		<OPTION value="7">Completed Past</OPTION>
		<OPTION value="8">Immediate Present</OPTION>
		<OPTION value="9">Past --> Now</OPTION>
		<OPTION value="a">Experiential</OPTION>
	</SELECT>
	<SELECT id="t08a" name="t08a" onChange="setTeknikCode();">
		<OPTION value="f">Participle marker:</OPTION>
		<OPTION value="0">State of being</OPTION>
		<OPTION value="1">Simple</OPTION>
		<OPTION value="2">Progressive</OPTION>
		<OPTION value="3">Perfect</OPTION>
		<OPTION value="4">Perfect Progressive</OPTION>
	</SELECT>
	<SELECT id="t08b" name="t08b" onChange="setTeknikCode();">
		<OPTION value="0">Still</OPTION>
		<OPTION value="1">Moving</OPTION>
	</SELECT>
	<SELECT id="t09" name="t09" onChange="setTeknikCode();">
		<OPTION value="f">Formality:</OPTION>
		<OPTION value="0">Erroneous</OPTION>
		<OPTION value="1">Obscene</OPTION>
		<OPTION value="2">Very rude</OPTION>
		<OPTION value="3">Slightly rude</OPTION>
		<OPTION value="4">Informal (close friends)</OPTION>
		<OPTION value="5">Casual (family)</OPTION>
		<OPTION value="6">Polite (business)</OPTION>
		<OPTION value="7">Very polite (management)</OPTION>
		<OPTION value="8">2x formal</OPTION>
		<OPTION value="9">3x formal</OPTION>
		<OPTION value="a">4x formal</OPTION>
		<OPTION value="c">Technical low</OPTION>
		<OPTION value="d">Technical high</OPTION>
		<OPTION value="e">Archaic</OPTION>
	</SELECT>
<BR />
	<SELECT id="f01" name="f01" onChange="onChange_f01">
		<OPTION value="xx">Top level category:</OPTION>
		<OPTION value="01">Common words and phrases</OPTION>
		<OPTION value="02">Geography</OPTION>
		<OPTION value="03">Jobs</OPTION>
		<OPTION value="04">Education</OPTION>
		<OPTION value="05">Fine arts</OPTION>
		<OPTION value="06">Musical art</OPTION>
		<OPTION value="07">Literature</OPTION>
		<OPTION value="08">Earth Science</OPTION>
		<OPTION value="09">Biology</OPTION>
		<OPTION value="0a">Chemistry</OPTION>
		<OPTION value="0b">Physics</OPTION>
		<OPTION value="0c">Mathematics</OPTION>
		<OPTION value="0d">Time</OPTION>
		<OPTION value="0e">History</OPTION>
		<OPTION value="0f">Family</OPTION>
		<OPTION value="10">Psychology</OPTION>
		<OPTION value="11">Sociology</OPTION>
		<OPTION value="12">Criminology</OPTION>
		<OPTION value="13">Civics</OPTION>
		<OPTION value="14">Politics</OPTION>
		<OPTION value="15">Business</OPTION>
		<OPTION value="16">Religion</OPTION>
		<OPTION value="17">Language</OPTION>
		<OPTION value="18">Emotions</OPTION>
		<OPTION value="19">WIK (Who I Know</OPTION>
		<OPTION value="1a">Fictional Characters</OPTION>
		<OPTION value="1b">Internet / Library / Mass Media</OPTION>
		<OPTION value="1c">Anatomy</OPTION>
		<OPTION value="80">Teknik tags</OPTION>
		<OPTION value="90">Classification of species</OPTION>
		<OPTION value="fd">Computer Programming Scripted Functions</OPTION>
		<OPTION value="fe">Computer Programming Primitives</OPTION>
		<OPTION value="ff">Grammar</OPTION>
	</SELECT>
	<SELECT id="f02" name="f02" onChange="onChange_f02">
		<OPTION value="xx">Second level category:</OPTION>
	<SELECT>
	<SELECT id="f03" name="f03" onChange="onChange_f03">
		<OPTION value="xx">Third level category:</OPTION>
	<SELECT>
	<SELECT id="f04" name="f04" onChange="onChange_f04">
		<OPTION value="x">Fourth level category:</OPTION>
	<SELECT>
	<SELECT id="f05" name="f05" onChange="onChange_f05">
		<OPTION value="x">Fifth level category:</OPTION>
	<SELECT>
	<INPUT id="f06" name="f06" type="text" size="3" value="xxx" />
</FORM>
</FIELDSET>
<HR />
<DIV id="results">
<?php echo $results; ?>
</DIV>
</HTML>