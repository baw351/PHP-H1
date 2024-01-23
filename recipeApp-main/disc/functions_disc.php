<?php
function readVideoInfo($vid_number) {
    $jsonFilePath = glob('disc/lyrics/*.json');
    if (file_exists($jsonFilePath)) {
        $jsonContent = file_get_contents($jsonFilePath);
        $videoInfo = json_decode($jsonContent, true);
        return $videoInfo;
    } else {
        return null;
    }
}
?>
