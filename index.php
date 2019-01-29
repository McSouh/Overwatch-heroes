<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overwatch heroes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
include('./navigateur.php');
?>
<div class="container">
    <form id="checktype" action="./index.php" method="get">
    <input id="lbltout" type="radio" name="type" value="Tout" checked>  
    <label for="lbltout">Tout</label>

    <input id="lbldps" type="radio" name="type" value="DPS"
    <?php echo (isset($_GET["type"]) && $_GET["type"] == 'DPS') ? 'checked' : null; ?>> 
    <label for="lbldps">DPS</label>

    <input id="lblsoutien" type="radio" name="type" value="Soutien"
    <?php echo (isset($_GET["type"]) && $_GET["type"] == 'Soutien') ? 'checked' : null; ?>> 
    <label for="lblsoutien">Soutien</label>

    <input id="lbltank" type="radio" name="type" value="Tank"
    <?php echo (isset($_GET["type"]) && $_GET["type"] == 'Tank') ? 'checked' : null; ?>> 
    <label for="lbltank">Tank</label>

    <label id="lblclasser" for="classer">Rechercher</label><input id="classer" type="submit">
    </form>
<?php 
try{
	$bdd = new PDO('mysql:host=localhost;dbname=Overwatch;charset=utf8', 'root', 'root');
} catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}
if(isset($_GET["type"]) && ($_GET["type"] == "DPS" || $_GET["type"] == "Soutien" || $_GET["type"] == "Tank")){
    $type = $_GET["type"];
    $req = $bdd->prepare('SELECT * FROM perso WHERE type = ?');
    $req->execute(array($type));
} else {
    $req = $bdd->prepare('SELECT * FROM perso');
    $req->execute();
}

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