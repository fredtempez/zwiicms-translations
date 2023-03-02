<?php

$langTargetArray = ['fr_FR', 'de', 'en_EN', 'es', 'gr_GR', 'it', 'pt_PT'];
$folderTargetArray = [
    '../modules/blog/',
    '../modules/news/',
    '../modules/form/',
    '../modules/gallery/',
    '../modules/redirection/',
    '../modules/search/',
];
foreach ($langTargetArray as $lang) {
    echo $lang;
    echo '<hr>';
    foreach ($folderTargetArray as $module) {
        $fichiers[] = $module . $lang . '.json';
        trouver_clés_uniques_et_effacer_doublons($fichiers, $lang);
    }
}

function trouver_clés_uniques_et_effacer_doublons($fichiers, $target)
{
    // Tableau pour stocker toutes les clés des tableaux JSON
    $toutes_cles = array();

    // Parcourir tous les fichiers JSON et ajouter les clés au tableau $toutes_cles
    foreach ($fichiers as $fichier) {
        $json = json_decode(file_get_contents($fichier), true);
        $toutes_cles = array_merge($toutes_cles, array_keys($json));
    }

    // Supprimer les clés en double
    $cles_uniques = array_unique($toutes_cles);

    // Parcourir tous les fichiers JSON et supprimer les clés en double
    foreach ($fichiers as $fichier) {
        $json = json_decode(file_get_contents($fichier), true);
        $json_unique = array_intersect_key($json, array_flip($cles_uniques));
        file_put_contents($fichier, json_encode($json_unique, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }

    // Créer un tableau vide pour stocker les clés uniques des tableaux JSON
    $json_final = array();

    // Parcourir tous les fichiers JSON et ne conserver que les clés uniques
    foreach ($fichiers as $fichier) {
        $json = json_decode(file_get_contents($fichier), true);
        $json_final = array_merge($json_final, $json);
    }

    // Enregistrer les clés uniques dans un fichier JSON
    file_put_contents($target . '.json', json_encode($json_final, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}