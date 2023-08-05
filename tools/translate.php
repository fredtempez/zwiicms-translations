<?php


$langSource = 'fr_FR';
$langTargetArray = [
    'de',
    'en_EN',
    'es',
    'gr_GR',
    'it',
    'pt_PT',
    'tr_TR'
];
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
foreach ($langTargetArray as $langTarget) {
    echo $langTarget;
    echo '<p>';
    foreach ($folderTargetArray as $keyFolder => $folderTarget) {
        if (file_exists($folderTarget . $langSource . '.json')) {
            $sourceData = json_decode(file_get_contents($folderTarget . $langSource . '.json'), true);
            foreach ($sourceData as $originText => $targetText) {
                echo '<p>';
                echo $originText;
                echo ' - ';
                if (empty($targetText)) {
                    echo $targetText;
                    $arrayjson = json_decode(file_get_contents('https://clients5.google.com/translate_a/t?client=dict-chrome-ex&sl=auto&tl=' . $langTarget . '&q=' . rawurlencode($originText)), true);
                    $targetData[$originText] = $arrayjson[0][0];
                }
                echo '</p>';
            }
            file_put_contents($folderTarget . $langTarget . '-2.json', json_encode($targetData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            echo $folderTarget . ' Done...';
            $targetData = [];
        }
    }
}