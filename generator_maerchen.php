<?php

$file = $_SERVER['argv'][1];

$sourceHtml = file_get_contents($file);

function getHeadline($html) {
	if(!preg_match('/<h1.*>([^>\(]+)\([0-9]+\)<\/h1>/', $html, $matches)) return '';

	return trim($matches[1]);
}

function getText($html) {
	if(!preg_match('/<td valign="top" style="text-align:justify; padding-left:10px; padding-right:10px; position:relative;">(.*)<\/td>/ms', $html, $matches)) return '';

	return $matches[1];
}

$headline = getHeadline($sourceHtml);
$text = gettext($sourceHtml);

if($headline == '') die("$file No Headline!\n");
if($text == '') die("$file No Text!\n");


$html = '<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>' . $headline . '</title>
<body>
' . $text . '
</body>
</html>';

file_put_contents(dirname(__FILE__) . '/book/' . $headline . '.html', $html);