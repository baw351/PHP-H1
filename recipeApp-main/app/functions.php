<?php
/**
 * 📝 On créé une fonction qui récupère toutes les données de toutes les recettes. On apprendre plus tard que dans ces cas ci il ne faut jamais récupérer toute la donnée d'un item.
 * Lit toutes les recettes du dossier spécifié et récupère leur contenu.
 * @return array Tableau de toutes les recettes.
 */
function getAllRecipes() {
    $recipes = [];
    $jsonFiles = glob('data/recettes/*.json');
    foreach ($jsonFiles as $jsonFile) {
        $json = file_get_contents($jsonFile);
        $recipeData = json_decode($json, true);
        if ($recipeData !== null) {
            $recipes[] = $recipeData;
        } 
        else {}
    }
    return $recipes;
}

/**
 * 
 * Lit une recette spécifique basée sur son ID et récupère son contenu.
 * @param int $id ID de la recette à lire.
 * @return array|null Tableau contenant les détails de la recette, null si non trouvée.
 */
function getRecipe($id) {
    $filePath = 'data/recettes/' . $id . '.json';
    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $recipeData = json_decode($json, true);
        if ($recipeData !== null) {
            return $recipeData;
        } 
    }
    else {
        return null;
    }
}
?>