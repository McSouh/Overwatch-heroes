<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overwatch heroes</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php 
include('./navigateur.php');
?>
<div class="container">
<?php 
try{
	$bdd = new PDO('mysql:host=localhost;dbname=Overwatch;charset=utf8', 'root', 'root');
} catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->query('SELECT * FROM perso');
while($donnees = $req->fetch()){
    { ?>
    <div class="hero">
        <h2><?php echo $donnees["name"] ?></h2> <br>
    <img src="./photos/<?php echo $donnees["name"] ?>.png" alt="">
    <p class="pass">Mot de passe : <?php echo $donnees["password"] ?> <br></p>
    <p>
    <?php echo $donnees["type"] ?> <br>
    <?php echo $donnees["difficulty"] ?> <br> <br>
    </p>
    <p>
        <strong>Description :</strong>  <br>
        <em><?php echo $donnees["description"] ?></em>
    </p>
     
    </div> 
    <?php }
}
?>
</div>
    
</body>
</html>