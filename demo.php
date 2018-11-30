<?php

	require "vendor/autoload.php";
$path = [
    'ffmpeg.binaries'  => '/root/bin/avconv',
    'ffmpeg.binaries' => '/root/bin/ffmpeg',
    'ffprobe.binaries' => '/root/bin/avprobe',
    'ffprobe.binaries' => '/root/bin/ffprobe',
];
$ffmpeg = FFMpeg\FFMpeg::create($path);
//$ffmpeg = FFMpeg\FFMpeg::create(array(
//    'ffmpeg.binaries'  => '/root/bin/ffmpeg',
//    'ffprobe.binaries' => '/root/bin/ffprobe',
//    'timeout'          => 3600, // The timeout for the underlying process
//    'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
//), @$logger);

$video = $ffmpeg->open('video.mp4');

$clip = $video->clip(FFMpeg\Coordinate\TimeCode::fromSeconds(30), FFMpeg\Coordinate\TimeCode::fromSeconds(15));
$clip->save(new FFMpeg\Format\Video\X264(), 'video1.mp4');