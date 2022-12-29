<?php
		$fr = json_decode(file_get_contents('../fr_FR.json'), true);
		$pt = json_decode(file_get_contents('../pt_PT.json'), true);
		$intersec = array_intersect_key($pt, $fr);
		$dif = array_diff_key($fr, $pt);
		$merge = array_merge($dif, $intersec);
		file_put_contents('../pt.json', json_encode($merge, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
