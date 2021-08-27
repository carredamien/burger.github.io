<?php 
require './Database.php';

$nameError = 'Le nom est obligatoire';
$descriptionError = 'La description est obligatoire';
$priceError = 'Vous avez oublié de renseigner le prix';
$categoryError = 'Il faut sélectionner une catégorie';
$imageError ='Vous avez oublié l\image';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Code</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
   
</head>

<body>
<h1 class="text__logo"> <i class="fas fa-utensils"></i> Burger Code <i class="fas fa-utensils"></i></h1>
    <div class="container admin">
    <h1 class="back__title"><strong>Ajouter un item</strong></h1>
            <br>
        <div class="row">
            
            <form class="form" role="form" action="./insert.php" method="post enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom: </label> 
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $name; ?> ">
                    <span class="help-inline"><?= $nameError; ?></span>
                </div>
                <div class="form-group">
                    <label for="description">Description: </label> 
                    <input type="text" step="0.01" class="form-control" id="description" name="description" placeholder="Description" value="<?= $description; ?> ">
                    <span class="help-inline"><?= $descriptionError; ?></span>
                </div>
                <div class="form-group">
                    <label for="price">Prix: (en €)</label> 
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= $prix; ?> ">
                    <span class="help-inline"><?= $priceError; ?></span>
                </div>
                <div class="form-group">
                <label for="category">Catégorie</label> 
                    <select name="category" id="category" class="form-control">
                      <?php
                      $statement = $db->query('SELECT categories.id, categories.name  FROM categories');
                      $category = $statement->fetch();
                        $db = Database::connect();
                      
                             echo '<option value=" '.$category[name].'">' . $category['name'] . '</option>';
                          
                        
                        $Database::disconect();
                      ?>
                    </select>
                    <span class="help-inline"><?= $categoryError; ?></span>
                </div>
                <div class="form-group">
                    <label for="image">Sélectionner une image: </label> 
                    <input type="file" id="image" name="image" >
                    <span class="help-inline"><?= $imageError; ?></span>
                </div>
            </form>
            <br>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"> <spa class="glyphicon-pencil"></spa> Ajouter</button>
                <a class="btn btn-primary" href="./index.php"><i class="fas fa-arrow-left"></i> Retour</a>
            </div>
          </div>
       
    </div>
          
           
          
</body>
</html>