<?php
		$langTarget = 'pt_PT';
        $source = json_decode(file_get_contents('../' . $langTarget . '.json'), true);
        ksort($source, SORT_STRING);
		file_put_contents('../' . $langTarget . '.json', json_encode($source, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        echo 'Done...';