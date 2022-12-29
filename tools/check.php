<?php
		$langSource = 'fr_FR';
        $langTarget = 'fr_FR';
        $source = json_decode(file_get_contents('../' . $langSource . '.json'), true);
		$target = json_decode(file_get_contents('../' . $langTarget . '.json'), true);
		$intersec = array_intersect_key($target, $source);
		$dif = array_diff_key($source, $target);
		$merge = array_merge($dif, $intersec);
		file_put_contents('../' . $langTarget . '.json', json_encode($merge, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        echo 'Done...';
