<?php

require_once('generate_year.php');

$auflagen = array(
	'1812' => '1. Auflage',
	'1815' => '1. Auflage',
	'1819' => '2. Auflage',
	'1837' => '3. Auflage',
	'1840' => '4. Auflage',
	'1843' => '5. Auflage',
	'1850' => '6. Auflage',
	'1857' => '7. Auflage'
);

$destDir = dirname(__FILE__) . '/book/';

$lastAuflage = '';

passthru("rm $destDir*.html");
passthru("rm -rf $destDir.git");
passthru("cd $destDir ; git init");

foreach($auflagen as $year => $auflage) {
	if($auflagen != $lastAuflage) {
		$cmd = "rm $destDir*.html";
		`$cmd`;
	}

	generateYear($year, $destDir);

	passthru("cd $destDir ; git add *.html");
	passthru("cd $destDir ; git commit -m \"$auflage ($year)\"");
}