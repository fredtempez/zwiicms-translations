<?php


$langSource = 'fr_FR';
$langTarget = 'el';
$folderTargetArray = [
    '../',
    /*
    '../modules/blog/',
    '../modules/news/',
    '../modules/form/',
    '../modules/gallery/',
    '../modules/redirection/',
    '../modules/search/',
    */
];
foreach ($folderTargetArray as $keyFolder => $folderTarget) {
    if (file_exists($folderTarget . $langSource . '.json')) {
        $sourceData = json_decode(file_get_contents($folderTarget . $langSource . '-2.json'), true);
        foreach ($sourceData as $originText => $targetText) {
            if (empty($targetText)) {
                echo '<p>';
                echo $originText;
                echo '</p>';
                $arrayjson = json_decode(file_get_contents('https://clients5.google.com/translate_a/t?client=dict-chrome-ex&sl=auto&tl=' . $langTarget . '&q=' . rawurlencode($originText)), true);
                $targetData[$originText] = $arrayjson[0][0];
            }

        }
        file_put_contents($folderTarget . $langTarget . '-2.json', json_encode($targetData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        echo $folderTarget . ' Done...';
        $targetData = [];
    }
}