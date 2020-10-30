<?php
/*
 * Statistical mean of an array
 */
function array_mean($a) {
	return array_sum($a)/count($a);
}
/*
 * Standard Deviation of an array
 */
function array_sd($a) {
	// From http://php.net/manual/en/ref.math.php#31295
	$sample_count = count($samples);
	for ($current_sample = 0; $sample_count > $current_sample; ++$current_sample) 
		$sample_square[$current_sample] = pow($samples[$current_sample], 2);
	$standard_deviation = sqrt(array_sum($sample_square) / $sample_count - 
		pow((array_sum($samples) / $sample_count), 2));
	return $standard_deviation;
}
/*
 * Returns the statistical range of an array as a two-element array.
 * This differs from range(), which returns an array of all inclusive elements.
 */
function array_range($a) {
	return array(min($a),max($a));
}
/*
 * Calculate the median value of an array (assumes numeric if there are an even number of values)
 * From: http://www.mdj.us/web-development/php-programming/calculating-the-median-average-values-of-an-array-with-php/
 */
function array_median($a) {
    $arr = $a;
	sort($arr);
    $count = count($arr); //total numbers in array
    $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
    if($count % 2) { // odd number, middle is the median
        $median = $arr[$middleval];
    } else { // even number, calculate avg of 2 medians
        $low = $arr[$middleval];
        $high = $arr[$middleval+1];
        $median = (($low+$high)/2);
    }
    return $median;	
}
?>