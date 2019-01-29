<?php 
session_start();
?>
<nav>
<h1>Les héros d'Overwatch</h1>
<div class="navig">
<ul>
    <li><a href="./index.php">Accueil</a></li>
    <li><a href="./index.php">Forum</a></li>
</ul>
</div>
<div class="connect">
<ul>
    <?php 
    if(isset($_SESSION['name'])){
        ?><img src="./photos/<?php echo $_SESSION['name'] ?>.png" alt=""><a href=""><?php echo $_SESSION['name'] ?></a><?php
        ?><a href="./logout.php">Se déconnecter</a><?php
    } else {
        ?>
        <li><a href="./inscription_hero.php">Inscription</a></li>
        <li><a href="./connexion_hero.php">Connexion</a></li>
        <?php
    }
    
    
    
    ?>
</ul>
</div>
</nav>