<?php

$path = __DIR__;
$file = '/version.json';
$content = file_get_contents($path . $file);
$decode = json_decode($content);

define('API_VERSION_NUMBER', getVersionNumber());

/**
 * Get formatted version number or return version number v0.0.0
 *
 * @return void
 */
function getVersionNumber()
{
    global $decode;
    $major = $decode->major ?? 0;
    $minor = $decode->minor ?? 0;
    $patch = $decode->patch ?? 0;

    return implode(".", [$major, $minor, $patch]);
}
