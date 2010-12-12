<?php

require_once('generator_maerchen.php');

function generateYear($year, $destDir) {
	$sourceDir = dirname(__FILE__) . '/maerchen_sources/';

	$dir = dir($sourceDir);
	while (false !== ($entry = $dir->read())) {
	   if(stripos($entry, "($year)") === false) continue;

	   createMaerchen($sourceDir . $entry, $destDir);
	}
	$dir->close();
}