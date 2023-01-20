<?php
$langSource = 'fr_FR';
$langTargetArray = ['en_EN', 'es', 'gr_GR', 'it', 'pt_PT'];
$folderTarget = '../modules/search/';
foreach ($langTargetArray as $key => $langTarget) {
	if (file_exists($folderTarget . $langSource . '.json') &&
		file_exists($folderTarget . $langTarget . '.json') )
	{
		$source = json_decode(file_get_contents($folderTarget . $langSource . '.json'), true);
		$target = json_decode(file_get_contents($folderTarget . $langTarget . '.json'), true);
		$intersec = array_intersect_key($target, $source);
		$dif = array_diff_key($source, $target);
		$merge = array_merge($dif, $intersec);
		file_put_contents($folderTarget . $langTarget . '.json', json_encode($merge, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
		echo $langTarget . ' terminé.';
	}

}

echo 'Tout est fini.';