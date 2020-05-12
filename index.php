<?php

function random_song($id = -1)
{
	$dir = 'music';
	$files = glob($dir . '/*.mp3');
	if ($id < 0) {
		$file = array_rand($files);
	} else {
		$file = $id;
	}
	return $files[$file];
}

function get_framerate($file)
{
	$h = fopen($file, "r");

        if($h)
        {
                while (($data = fgetcsv($h, 1000, " ")) !== FALSE)
                {
                        foreach($data as $num)
                                $number = $num;
                }
                fclose($h);
		return $number;
        }
        return 1;

}

$music_id = isset($_GET['id']) ? $_GET['id'] : -1;

$music_file = random_song($music_id);
$music_modifier = $music_file . ".txt";

$framerate = get_framerate($music_modifier);
//echo $framerate;
?>

<!DOCTYOE html>
<html>

<head>
<title>KjellC the dance</title>
</head>

<body bgcolor="Black">

<center>
<video id="danceVideo" autoplay loop>
	<source src="KjellCdance.mp4" type="video/mp4">
	Your browser is bad and you should feel bad
</video>
<audio id="danceSong" autoplay loop>
	<source src="<?=$music_file; ?>" type="audio/mp3">
	Your browser is bad and you should feel bad
</audio>
</center>

<script>
	var vid = document.getElementById("danceVideo");
	vid.playbackRate = <?=$framerate; ?>; 

	window.onload = function() {
	    //document.querySelector('video').playbackRate = 1;
	    let video = document.querySelector('video');
	    let promise = video.play();

	    if (promise !== undefined) {
	        promise.then(_ => {
	            console.log("Yay, Autoplay!")
	        }).catch(() => {
	            video.controls = true;
	            video.addEventListener('play', function () {
	                video.controls = false;
	                document.querySelector('audio').play();
	            }, false);
	        });
	    }
}
</script>

</body>
</html>
