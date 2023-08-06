<?php

// Tableau des langues et de leurs noms de fichiers
$languages = ['de' => 'de.json', 'en_EN' => 'en_EN.json', 'es' => 'es.json', 'fr_FR' => 'fr_FR.json', 'gr_GR' => 'gr_GR.json', 'it' => 'it.json', 'pt_PT' => 'pt_PT.json', 'tr_TR' => 'tr_TR.json'];

// Sous-dossiers dans le répertoire "modules"
$moduleSubdirs = ['blog', 'form', 'gallery', 'news', 'redirection', 'download', 'slider', 'search'];

foreach ($languages as $langCode => $langFile) {
    // Chemin du fichier de langue principal
    $mainLangFile = $langFile;

    if (is_file($mainLangFile)) {
        $mainLangData = json_decode(file_get_contents($mainLangFile), true);

        // Parcourir les sous-dossiers des modules
        foreach ($moduleSubdirs as $subdir) {
            $moduleLangFile = 'modules/' . $subdir . '/' . $langFile;

            if (is_file($moduleLangFile)) {
                $moduleLangData = json_decode(file_get_contents($moduleLangFile), true);

                // Supprimer les clés déjà présentes dans le fichier principal
                foreach (array_keys($mainLangData) as $key) {
                    unset($moduleLangData[$key]);
                }

                // Réécrire le fichier de langue du module sans les clés en double
                file_put_contents($moduleLangFile, json_encode($moduleLangData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }
    }
}

echo "Terminé ! Les clés en double ont été supprimées des fichiers des modules.\n";

?>