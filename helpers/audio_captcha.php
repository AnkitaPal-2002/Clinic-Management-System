<?php
session_start();
$captcha_text = $_SESSION['captcha_text'];
$audio_file = "audio_captcha_" . session_id() . ".wav";

// Use a TTS service or a tool like `espeak` to generate the audio file
// Example using `espeak` (Linux):
exec("espeak -w $audio_file '$captcha_text'");

// Serve the audio file
header('Content-Type: audio/wav');
readfile($audio_file);
?>
