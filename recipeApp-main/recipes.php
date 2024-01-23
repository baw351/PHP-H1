<?php
include('templates/header.php');
include('app/functions.php');

$recipes = getAllRecipes();
?>

<h1>Liste des Recettes</h1>
<ul>
    <?php
    foreach ($recipes as $recipe) {
        echo "<li>";
        echo "<a href='recipe.php?id={$recipe['id']}'>";
        echo $recipe['titre'];
        echo "</a></li>";
    }
    ?>
</ul>

<?php
include('templates/footer.php');
?>
