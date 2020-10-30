<?php
abstract class XlateIn {
	abstract protected function Numbers($strin);
	abstract protected function Punctuation($strin);
	abstract protected function Phrases($strin,$mode);
	abstract public function FlatTranslate($strin);
	abstract public function Validate($strin,$flat);
	abstract public function Pump($flat);
	abstract public function Translate($strin);
	protected $tekflat;
	protected $unknown;
}
?>
