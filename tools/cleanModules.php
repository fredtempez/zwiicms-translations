<?php

$langTargetArray = ['fr_FR', 'de', 'en_EN', 'es', 'gr_GR', 'it', 'pt_PT'];
$folderTargetArray = [
    '../modules/blog/',
    '../modules/news/',
    '../modules/form/',
    '../modules/gallery/',
    '../modules/redirection/',
    '../modules/search/',
    '../modules/slider/',
    '../modules/download/',
];
foreach ($langTargetArray as $lang) {
    echo $lang;
    echo '<hr>';
    foreach ($folderTargetArray as $module) {
        $fichiers[] = $module . $lang . '.json';

        $json = json_decode(file_get_contents($fichier), true);
        $result = filterMatchingArrays($json, $lang);

            // Enregistrer les clés uniques dans un fichier JSON
        file_put_contents($target . '.json', json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
}


function filterMatchingArrays($array1, $array2) {
    $filteredArray = array_filter($array2, function($item) use ($array1) {
        return in_array($item, $array1);
    });

    return array_values($filteredArray);
}