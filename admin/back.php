<?php 
require './Database.php';
$db =Database::connect();
$statement = $db->query('SELECT items.id, items.name,items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
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
            <h2 class="back__title"><strong>Liste des items</strong><a href="insert.php" class="btn btn-success btn-lg"><i class="fas fa-plus"></i>Ajouter</a></h2>
            <table class="table table-striped table-bordered">
                <thead>
                     <tr>
                         <th>Nom</th>
                         <th>Description</th>
                         <th>Prix</th>
                         <th>Catégorie</th>
                         <th>Actions</th>
                     </tr>
                </thead>
                <tbody>
                    <?php 
                    while($item =$statement->fetch()){
                        echo '<tr>';
                        echo '<td>'.$item['name'] .'</td>';
                        echo '<td>'.$item['description'] .'</td>';
                        echo '<td>'. number_format((float)$item['price'],2, '.', ' ') .'</td>';
                        echo '<td>'.$item['category'] .'</td>';
                        
                        echo '<td width=350>';
                        echo '<a class="btn btn-outline-secondary mx-1" href="view.php?id='.$item['id'].'" ><i class="fas fa-eye"></i> Voir </a>';
                        echo '<a class="btn btn-primary mx-1" href="update.php?id='.$item['id'].'"><i class="fas fa-pencil-alt"></i> Modifier </a>';
                        echo '<a class="btn btn-danger mx-1" href="delete.php?id='.$item['id'].'" ><i class="fas fa-times"></i> Supprimer </a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
               
                </tbody>
            </table>

        </div>
    </div>
</body>


</html>