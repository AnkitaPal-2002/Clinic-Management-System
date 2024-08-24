<?php
function getBaseURL() {
    // Check if HTTPS is on or not
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }

    // Append the host (domain name, IP) to the URL
    $url .= $_SERVER['HTTP_HOST'];

    // Get the directory of the requested resource, excluding the specific page
    $directory = dirname($_SERVER['REQUEST_URI']);

    // Combine the base URL and directory with a trailing slash
    $url .= $directory;

    // Return the full base URL
    return $url;
}

?>
