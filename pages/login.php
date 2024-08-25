<style>
    .captcha-code{
        
    }
</style>


<?php

session_start();



$captcha_text = '';
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$captcha_length = 6;

for ($i = 0; $i < $captcha_length; $i++) {
    $captcha_text .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha_text'] = $captcha_text;

//echo $_SESSION['captcha_text'];



?>



<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="captcha">CAPTCHA:</label><br>
    <div id="captcha-img" class="captcha-code">
    <?php
    echo $_SESSION['captcha_text'];
    ?>

    </div>
    
    <button type="button" onclick="refreshCaptcha()">Refresh CAPTCHA</button><br>
    <button type="button" onclick="playCaptchaAudio()">Play Audio CAPTCHA</button><br><br>
    <input type="text" id="captcha" name="captcha" required><br><br>

    <input type="submit" value="Login">
</form>

<audio id="captcha_audio" src=""></audio>

<script>
function refreshCaptcha() {
    document.getElementById('captcha-img') = 'helpers/captcha.php?' + Date.now();
}

function playCaptchaAudio() {
    document.getElementById('captcha_audio').src = 'helpers/audio_captcha.php?' + Date.now();
    document.getElementById('captcha_audio').play();
}
</script>
