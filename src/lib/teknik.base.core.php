<?php
class TeknikCore {
	private $engagementType;		// What kind of activity am I engaging in?  Ex: Conversation, taking a test, playing a game, etc.
	private $engagements = array();	// A collection of Teknik processing classes to retain different phases of an interaction.
	
	public function __construct() {
		$engagementType = 'unknown';
	}
	public function validateTeknik($tek) {
		// Makes sure the $tek object is a valid Teknik format.  Return true/false.
		
	}
	public function processTek($tek,$ref=null) {
		if ($engagementType=='unknown') {
			// try to figure out from this first input what is going on
		}
		if ($engagementType=='testing') {
			// try to figure out what kind of test we're doing
		}
		if ($engagementType=='testing.math') {
			// Math test.  
			require_once('testing.math.php');
			if (isset($engagements['testing.math'])) $mathTest = $engagements['testing.math'];
			else $mathTest = new TeknikMathTest();
			
		}
		if ($engagementType=='testing.rc') {
			// Reading comprehension test.  $tek may either be the passage or the question/multiple choice
			
		}
		if ($engagementType=='testing.essay') {
			// We need to construct an essay based on a short prompt.
			
		}
		if ($engagementType=='testing.trivia') {
			// Any kind of general knowledge testing.
			
		}
		if ($engagementType=='reading') {
			// Okay, cool, we're reading a book or a story.  Try to remember something about it.
		}
		if ($engagementType=='conversation') {
			// We're in chatbot mode.  Try to sound intelligent.
			
		}
	}
	public function setEngagementType($t) {
		$this->engagementType = $t;
	}
	public function getEngagementType() {
		return $this->engagementType;
	}
}
?>