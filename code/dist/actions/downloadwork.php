<?php

require_once('base.php');
require_once(getBasePath('lib/functions.php'));
useDeLocale();

session_start();

if (!isAllowed()) {
    die();
}

$basename = sanitizeUserInput($_GET['basename']);
$downloadname = $_GET['downloadname'] ?: 'sharepic';
$filepath = getBasePath('tmp/' . $basename . '.zip');

header('Content-Type: application/zip');
header("Content-Length: ".filesize($filepath));
header('Content-Disposition: attachment; filename="' . $downloadname . '.zip"');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
readfile($filepath);
