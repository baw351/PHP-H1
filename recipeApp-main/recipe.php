<?php
include('app/functions.php');
include('templates/header.php');

$recipeId = isset($_GET['id']) ? $_GET['id'] : die('ID de la recette non spécifié.');

$recipe = getRecipe($recipeId);

if ($recipe) {
    echo '<h1>' . htmlspecialchars($recipe['titre']) . '</h1>';
    echo '<p>' . htmlspecialchars($recipe['description']) . '</p>';
    echo "<h2>Ingrédients</h2>";
    echo "<ul>";
    
    foreach ($recipe['ingredients'] as $ingredient) {
        echo '<li>' . htmlspecialchars($ingredient) . '</li>';
    }
    echo "</ul>";
    echo "<h2>Étapes de préparation</h2>";
    echo "<ul>";

    foreach ($recipe['etapes'] as $step) {
        echo '<li>' . htmlspecialchars($step) . '</li>';
    }
    echo "</ul>";
} else {
    echo "<p>Recette introuvable.</p>";
}

include('templates/footer.php');
?>
