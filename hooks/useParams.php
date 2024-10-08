<?php
function getBaseURL() {
    // Determine the protocol (HTTP or HTTPS)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";

    // Get the host (e.g., localhost or domain)
    $host = $_SERVER['HTTP_HOST'];

    // Get the full request URI
    $fullURL = $_SERVER['REQUEST_URI'];

    // Convert the URI into an array by splitting on '/'
    $urlArray = explode('/', rtrim($fullURL, '/'));

    // Remove the last element of the array (file or last folder)
    array_pop($urlArray); // Removes register.php, login.php, or similar
    array_pop($urlArray); // Removes pages, auth, helpers or similar folders

    // Rebuild the path without the last element
    $path = implode('/', $urlArray);

    // Combine protocol, host, and the cleaned path
    $baseURL = $protocol . $host . $path; // Ensure the trailing slash

    return $baseURL;
}

function getHostURL() {
    // Determine the protocol (HTTP or HTTPS)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";

    // Get the host (e.g., localhost or domain)
    $host = $_SERVER['HTTP_HOST'];

    // Get the full request URI
    $fullURL = $_SERVER['REQUEST_URI'];

    // Convert the URI into an array by splitting on '/'
    $urlArray = explode('/', rtrim($fullURL, '/'));

    // Check if the second element exists (project name) and build the base URL
    if (isset($urlArray[1])) {
        $projectFolder = $urlArray[1];
    } else {
        $projectFolder = ''; // Default to empty string if project folder is not found
    }

    // Combine protocol, host, and project folder to get the base URL
    $baseURL = $protocol . $host . '/' . $projectFolder ; // Ensure the trailing slash

    return $baseURL;
}

