<?php
//$_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
$url = $_GET["url"];
$url2 = "https://cometa.top/player3/canaistudotvflowplayer.php?canal=premiereclubes";
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$ch = curl_init();
$timeout = 5;
// curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
// curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_URL, $url2);
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

// header("Location: $m3u8");
}

//echo $m3u8

$myfile = fopen("log.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $m3u8);
    fclose($myfile);

?>
