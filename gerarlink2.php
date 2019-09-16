<?php
use CloudflareBypass\CFCurlImpl;
use CloudflareBypass\Model\UAMOptions;

$ch = curl_init("https://cometa.top/player3/canaistudotvflowplayer.php?canal=premiereclubes");

// Want to cache clearance cookies ?
// curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
// curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array("User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36"));

$cfCurl = new CFCurlImpl();

$cfOptions = new UAMOptions();
// $cfOptions->setVerbose(true);
// $cfOptions->setDelay(5);

try {
    $page = $cfCurl->exec($ch, $cfOptions);
} catch (ErrorException $ex) {
    // example of how to handle errors
    echo "Unknown error -> " . $ex->getMessage();
}

// Want to get clearance cookies ?
// $cookies = curl_getinfo($ch, CURLINFO_COOKIELIST);

//echo $page;

$myfile = fopen("./output/log.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $page);
    fclose($myfile);

?>
