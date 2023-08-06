<?php
$langSource = 'fr_FR';
$langTargetArray = ['de', 'en_EN', 'es', 'gr_GR', 'it', 'pt_PT', 'tr_TR'];
$folderTargetArray = ['../',
					 '../modules/blog/',
					 '../modules/news/',
					 '../modules/form/',
					 '../modules/gallery/',
					 '../modules/redirection/',
					 '../modules/search/',
					 '../modules/slider/',
					 '../modules/download/',
					];
foreach($folderTargetArray as $keyFolder => $folderTarget) {
	echo '<p><strong>' . $folderTarget . '</strong></p/>';
	foreach ($langTargetArray as $key => $langTarget) {
		if (file_exists($folderTarget . $langSource . '.json') &&
			file_exists($folderTarget . $langTarget . '.json') )
		{
			$source = json_decode(file_get_contents($folderTarget . $langSource . '.json'), true, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
			$target = json_decode(file_get_contents($folderTarget . $langTarget . '.json'), true, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$intersec = array_intersect_key($target, $source);
			$dif = array_diff_key($source, $target);
			$merge = array_merge($dif, $intersec);
			file_put_contents($folderTarget . $langTarget . '.json', json_encode($merge, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
			echo '<p>' . $langTarget . ' checked.' . '</p>';
		}
	}
}


echo '<br />All Done';