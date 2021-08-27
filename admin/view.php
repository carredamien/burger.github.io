<?php 
require './Database.php';

if(!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);   
}

$db =Database::connect();

$statement = $db->prepare('SELECT items.id, items.name,items.description, items.price,items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?');

$statement->execute(array($id));
$item = $statement->fetch();

Database::disconnect();

function checkinput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
        <div class="row">
            <div class="col-sm-6">
                <h2 class="back__title"><strong>Voir un article</strong></h2>
                <br>
                <form>
                    <div class="form-group">
                        <label >Nom: </label><?= ' '.$item['name'];?> 
                    </div>
                    <div class="form-group">
                        <label >Description: </label><?= ' '.$item['description'];?>
                    </div>
                    <div class="form-group">
                        <label >Prix: </label><?= ' '.number_format((float)$item['price'],2, '.', ' ').'€';?>
                    </div>
                    <div class="form-group">
                        <label >Catégories: </label><?= ' '.$item['category'];?>
                    </div>
                    <div class="form-group">
                        <label >Image: </label><?= ' '.$item['image'];?>
                    </div>
                   
                </form>
                <br>
                <div class="form-actions">
                    <a class="btn btn-primary" href="./index.php"><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card"> 
                    <img class="card-img-top img-fluid" src="<?= '../images/'. $item['image'];?>" alt=" <?= $item['image'];?> ">
                    <div class="price"><?= number_format((float)$item['price'],2, '.', ' ').'€';?> €</div>
                    <div class="card-body caption">
                        <h4 class="card-title"><?= $item['name']?></h4>
                        <p class="card-text"><?=$item['description']?></p>
                        <a href="#" class="button button-order" role="button"><i class="fas fa-shopping-cart"></i> Commander</a>
                    </div>
                </div>
            </div>
          
</body>
</html>