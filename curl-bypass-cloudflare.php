<?php

function my_curl($url, $referer, $proxyip, $port, $proxy, $enablereferer) {
	$curl = curl_init();
 
	$header[] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "Keep-Alive: 300";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Pragma: "; // browsers keep this blank.
 
	if ($proxy == 'true') {
	curl_setopt($curl, CURLOPT_PROXY, $proxyip);
	curl_setopt($curl, CURLOPT_PROXYPORT, $port);
}
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
       if ($enablereferer == 'true') {
	curl_setopt($curl, CURLOPT_REFERER, $referer);
	curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
 
	if (!$html = curl_exec($curl)) { $html = file_get_contents($url); }
	curl_close($curl);
// return $html;
header("referer:$referer");
echo $html;
}
//example my_curl('https://victim.com', 'https://referer.com', 'proxy-ip', 'port', 'true or false to proxy', 'true or false to referer');

my_curl('https://victim.com', 'https://referer.com', '177.8.170.62', '8080', 'true', 'true');


?>
