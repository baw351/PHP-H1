<?php
require_once './recipe_country.php';
include('../templates/header.php');

// echo "<pre>";
// var_dump($countries);
// echo "</pre>";

// foreach ($countries as $countryCode => $country) {
//     echo "<pre>";
//     var_dump($countryCode);
//     var_dump($country);
//     echo "</pre>";
// }

// die;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Super formulaire</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>

<div class="field">
  <form action="add_recipe.php" method="post">
    <label for="name">Nom de la recette :</label>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br>
    <label for="ingredients">Ingrédients :</label>
    <textarea id="ingredients" name="ingredients" rows="4" required></textarea><br>
    <label for="steps">Étapes de Préparation :</label><br>
    <textarea id="steps" name="steps" rows="4" required></textarea><br>

  
      <h2>Votre type de recette : </h2>
      <p>
        <label for="recipe_appetizer">
          <input type="checkbox" id="recipe_appetizer" name="recipe_appetizer" value="Appetizer 99$" />
          Entrées
        </label>
      </p>
      <p>
        <label for="recipe_soup">
          <input type="checkbox" id="recipe_soup" name="recipe_soup" value="Soup 59$" />
          Soupes et potages
        </label>
      </p>
      <p>
        <label for="recipe_salad">
          <input type="checkbox" id="recipe_salad" name="recipe_salad" value="Salad 79$" />
          Salades
        </label>
      </p>
      <p>
        <label for="main_courses">
          <input type="checkbox" id="main_courses" name="main_courses" value="Main courses 69$" />
          Plats principaux
        </label>
      </p>
      <p>
        <label for="recipe_barbecue">
          <input type="checkbox" id="recipe_barbecue" name="recipe_barbecue" value="Berbecue 89$" />
          Grillades et barbecue
        </label>
      </p>
      <p>
        <label for="recipe_dessert">
          <input type="checkbox" id="recipe_dessert" name="recipe_dessert" value="Dessert 49$" />
          Desserts
        </label>
      </p>
      <p>
        <label for="recipe_bakery">
          <input type="checkbox" id="recipe_bakery" name="recipe_bakery" value="Bakery 39$" />
          Boulangerie
        </label>
      </p>
      <p>
        <label for="recipe_drink">
          <input type="checkbox" id="recipe_drink" name="recipe_drink" value="Drink 29$" />
          Cocktails et boissons
        </label>
      </p>
    </div>

    <div class="field">
      <label for="photo">
        Mettez votre photo
        <span class="btn-file">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
          </svg>
        </span>
      </label>
      <input type="file" id="photo" name="photo" />
    </div>

    <div class="field">
      <label for="recipe_country">
        Choisissez l'origine gastronomique de la recette , ou selectionez "autre" si c'est une recette originale .
      </label>
      <select id="recipe_country" name="recipe_country">

        <?php foreach ($countries as $countryCode => $country)
        { ?>
        <option value="<?php echo $countryCode ?>">
            <?php echo $country ?>
        </option>
        <?php } ?>
      </select>
    </div>

    <div class="field">
      <p>
      <section id="btn-submit">
    <button type="submit" id="btnEnvoyer">Envoyer</button>
    <button type="reset" id="btnRecommencer">Recommencer</button>
      </section>
      </p>
    </div>
  </form>

</body>
</html>

<?php
include('../templates/footer.php');
?>