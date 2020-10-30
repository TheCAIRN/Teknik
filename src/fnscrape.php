<?php
// Web scrapers
function web_get_wunderground($zip) {
	if (is_numeric($zip)) $zip=number_format($zip,0,'','');
	$url = "http://www.wunderground.com/cgi-bin/findweather/getForecast?query=$zip";
	// return http_get($url);
	$handle = curl_init();
	curl_setopt($handle,CURLOPT_URL,$url);
	curl_setopt($handle,CURLOPT_RETURNTRANSFER,true);
	$page = curl_exec($handle);
	curl_close($handle);
	return $page;
} //wunderground
function web_get_google($query) {

}
function web_get_hickory() {
	$url = "https://192.168.1.55/horde/";
	// return http_get($url);
	$handle = curl_init();
	curl_setopt($handle,CURLOPT_URL,$url);
	curl_setopt($handle,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($handle,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($handle,CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($handle,CURLOPT_RETURNTRANSFER,true);
	$page = curl_exec($handle);
	curl_close($handle);
	return $page;
}
print nl2br(htmlspecialchars(web_get_hickory()));
?>
