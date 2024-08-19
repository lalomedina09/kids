<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300);

$start_time = microtime(true);

function makeHttpRequest($url, $content = null) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		"Content-Type: application/json",
		"User-Agent: com.google.android.youtube/17.36.4 (Linux; U; Android 12; GB) gzip"
	]);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

	$response = curl_exec($ch);

	$stop = false;
	if (curl_errno($ch)) {
		echo 'Errorno:' . curl_errno($ch);
		echo 'Error:' . curl_error($ch);
		$stop = true;
	}

	curl_close($ch);
	
	if ($stop) {
		die;
	}

	return $response;
}

// Ejemplo de uso:
$url = "https://www.youtube.com/youtubei/v1/player?key=AIzaSyA8eiZmM1FaDVjRy-df2KTyQ_vz_yYM39w&hl=en";
$content = json_encode([
	"videoId" => "WnB01Wt74tM",
	"context" => [
		"client" => [
			"clientName" => "ANDROID_TESTSUITE",
			"clientVersion" => "1.9",
			"androidSdkVersion" => 30,
			"hl" => "en",
			"gl" => "US",
			"utcOffsetMinutes" => 0
		]
	]
		]);
$response = makeHttpRequest($url, $content);

$end_time = microtime(true) - $start_time;
//echo "\Partial time: " . $end_time . " seconds\n";
// Procesar la respuesta según sea necesario
/* header('Content-Type: application/json');
  echo $response;
  die; */
$json_response = json_decode($response);
$videoUrl = $audioUrl = $mimeTypeVideo = $mimeTypeAudio = null;
$bestHeight = 0;
foreach ($json_response->streamingData->adaptiveFormats as $format) {
	if (isset($format->height) && !is_null($format->height)) {

		if (is_null($videoUrl)) {
			$videoUrl = $format->url;
			$mimeTypeVideo = $format->mimeType;
		} elseif ($format->height <= 720 && $format->height > $bestHeight) {
			$videoUrl = $format->url;
			$mimeTypeVideo = $format->mimeType;
			$bestHeight = $format->height;
		}
		continue;
	}

	if (isset($format->audioQuality) && !is_null($format->audioQuality)) {
		if (is_null($audioUrl) && strpos($format->mimeType, 'mp4') !== false) {
			$audioUrl = $format->url;
			$mimeTypeAudio = $format->mimeType;
			break;
		}
	}
}
?>

<pre>
	<?php echo $response; ?>
</pre>
<video id="video" controls>
	<source src="<?php echo $videoUrl ?>" type="<?php echo $mimeTypeVideo ?>">
	Your browser does not support the video tag.
</video>
<br />
<audio id="audio" controls>
	<source src="<?php echo $audioUrl ?>" type="<?php echo $mimeTypeAudio ?>">
	Your browser does not support the audio element.
</audio>
<script>
	const video = document.getElementById('video');
	const audio = document.getElementById('audio');

	let isVideoPlaying = false;
	let isAudioPlaying = false;

	video.addEventListener('play', () => {
		audio.play();
		isVideoPlaying = true;
		isAudioPlaying = true;
	});

	video.addEventListener('pause', () => {
		audio.pause();
		isVideoPlaying = false;
		isAudioPlaying = false;
	});

	video.addEventListener('seeking', () => {
		audio.pause();
		isAudioPlaying = false;
	});

	video.addEventListener('seeked', () => {
		if (isVideoPlaying) {
			audio.currentTime = video.currentTime;
			audio.play();
			isAudioPlaying = true;
		}
	});

	function isSafari() {
		var userAgent = navigator.userAgent.toLowerCase();
		var vendor = navigator.vendor.toLowerCase();

		// Check if the browser is Safari
		return /safari/.test(userAgent) && /apple/.test(vendor) && !/chrome/.test(userAgent);
	}

	if (isSafari()) {
		video.addEventListener('timeupdate', function () {
			if (Math.abs(video.currentTime - audio.currentTime) > 0.4) {
				audio.currentTime = video.currentTime;
			}
		});
	} else {
		video.addEventListener('timeupdate', function () {
			if (Math.abs(video.currentTime - audio.currentTime) > 0.1) {
				audio.currentTime = video.currentTime;
			}
		});
	}

	video.addEventListener('waiting', () => {
		if (isAudioPlaying) {
			audio.pause();
			isAudioPlaying = false;
		}
	});

	video.addEventListener('playing', () => {
		if (isVideoPlaying && !isAudioPlaying) {
			audio.currentTime = video.currentTime;
			audio.play();
			isAudioPlaying = true;
		}
	});

	audio.addEventListener('play', () => {
		if (!isVideoPlaying) {
			audio.pause();
		}
	});

	audio.addEventListener('pause', () => {
		if (isVideoPlaying && !video.paused) {
			audio.currentTime = video.currentTime;
			audio.play();
		}
	});

	// Sync the volume of the video and audio elements
	video.addEventListener('volumechange', () => {
		audio.volume = video.volume;
	});
</script>