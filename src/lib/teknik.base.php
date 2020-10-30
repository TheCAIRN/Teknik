<?php
class TeknikBase {
	/*
		Objects is a map of mostly nouns that have come up in an interaction.
		Relationships maps the various objects in different ways.
		
		For example, in the simple sentence, "Maria has seven pencils in her hand,"
		the name "Maria" would be added to objects as index 0, then pencils as index 1, 
		then hand as index 2.  Because nouns rarely occur in isolation, each object is 
		an array.  The noun is first, with non-relational modifier following; so objects
		0 and 2 would only have one element each, but object 1 would have "pencils" 
		followed by "seven".
		
		Relationships would describe how the objects fit together.  It may be easiest to
		start with the later fields in a Teknik sentence, in this case being "in her hand".
		The relationship would first have to resolve who "her" is referring to.  
		Assuming the algorithm correctly selected "Maria", the relationship would be added
		as array(2,0,'possession').  The order of elements in a relationship always starts
		with the recipient, then the subject, and finally the type.
		Next, because of its position in the sentence, we can define the relationship
		between "pencils" and "hand" as a location: array(2,1,'location.static');
		The last relationship would be the verb "has", so we would add array(1,0,'possession').
		
		Each object now has a relationship defined to the other two.  As the interaction
		continues, objects and relationships will always reflect the current state.
		An instance of an engagement may choose to keep track of the changes to state.
		For that purpose, a $record variable is included, but its use may vary depending
		on the engagement.
	*/
	protected $objects;
	protected $relationships;
	protected $record;
	
	protected function __construct() {
		$this->objects = array();
		$this->relationships = array();
		$this->record = array();
	}
	public function getObjects() {
		return $this->objects;
	}
}
?>