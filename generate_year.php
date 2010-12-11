<?php

require_once('generator_maerchen.php');

$year = $_SERVER['argv'][1];

$sourceDir = dirname(__FILE__) . '/maerchen_sources/';

$dir = dir($sourceDir);
while (false !== ($entry = $dir->read())) {
   if(stripos($entry, "($year)") === false) continue;

   createMaerchen($sourceDir . $entry);
}
$dir->close();
