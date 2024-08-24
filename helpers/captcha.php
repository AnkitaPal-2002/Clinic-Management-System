
<?php
session_start();



$captcha_text = '';
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$captcha_length = 6;

for ($i = 0; $i < $captcha_length; $i++) {
    $captcha_text .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha_text'] = $captcha_text;

echo $_SESSION['captcha_text'];

// Path to the TrueType font file
$font_path = '../assets/fonts/timesnewarial.ttf'; // Ensure this path is correct

// Check if the font file exists
if (!file_exists($font_path)) {
    die('Font file not found.');
}


$img = imagecreate(50, 20);
    
$textbgcolor = imagecolorallocate($img, 173, 230, 181);
$textcolor = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 1, 5, 5, $captcha_text, $textcolor);
ob_start();
imagepng($img);
$image_data = ob_get_clean();

$_SESSION['captcha_image'] = base64_encode($image_data);
// printf('<img src="data:image/png;base64,%s"/ width="300">', base64_encode(ob_get_clean()));
echo '<img src="data:image/png;base64,' . $_SESSION['captcha_image'] . '" width="150" height="50" />';

?>
