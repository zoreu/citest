<?php

$url = "link-da-pagina";
//$url = $_GET["url"]
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$ch = curl_init();
$timeout = 17;
// curl_getinfo($ch, CURLINFO_HTTP_CODE);
///////////////Proxy/////////////////////////////
curl_setopt($ch, CURLOPT_PROXY, "177.8.170.62");
curl_setopt($ch, CURLOPT_PROXYPORT, "8080");
////////////////////////////////////////////////
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
// curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);


preg_match_all(
    '/(https.*m3u8?.*)/',

    $html,
    $posts, // will contain the article data
    PREG_SET_ORDER // formats data into an array of posts
);

foreach ($posts as $post) {
    $link = $post[0];
$m3u8 = substr($link,0,-3);

header("Location: $m3u8");
}

//echo $m3u8
//echo $html

?>
