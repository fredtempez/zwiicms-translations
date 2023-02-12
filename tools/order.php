<?php
$langTargetArray = ['fr_FR', 'en_EN', 'es', 'el_GR', 'it', 'pt_PT'];
$folderTargetArray = ['../',
					 '../modules/blog/',
					 '../modules/news/',
					 '../modules/form/',
					 '../modules/gallery/',
					 '../modules/redirection/',
					 '../modules/search/',
					];
foreach($folderTargetArray as $keyFolder => $folderTarget) {
	echo '<p><strong>' . $folderTarget . '</strong></p/>';
	foreach ($langTargetArray as $key => $langTarget) {
        if (file_exists($folderTarget . $langTarget . '.json')) {
            $source = json_decode(file_get_contents($folderTarget . $langTarget . '.json'), true);
            ksort($source, SORT_STRING);
            file_put_contents($folderTarget . $langTarget . '.json', json_encode($source, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            echo 'Done...';
        }

    }
}