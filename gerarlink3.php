$content = file_get_contents('https://cometa.top/player3/canaistudotvflowplayer.php?canal=premiereclubes');

file_put_contents('./output/log.txt', $content);
