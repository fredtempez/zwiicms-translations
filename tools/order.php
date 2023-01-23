<?php
		$langTarget = 'gr_GR';
        $folderTarget = '../modules/blog/';
        $source = json_decode(file_get_contents($folderTarget . $langTarget . '.json'), true);
        ksort($source, SORT_STRING);
		file_put_contents($folderTarget . $langTarget . '.json', json_encode($source, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        echo 'Done...';