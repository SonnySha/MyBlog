
<!--On appelle elementsView pour pouvoir utiliser notre élément-->
 <?php require_once('view/elementsView.php');?>
 
 <!--Liste tous les postes de la bdd-->
 
 <?php ob_start(); ?>
    <?php decorationThreePictures(); ?>
 <?php $pictures = ob_get_clean(); ?>
 
 <?php ob_start(); ?>
     <h1 class="row">Toutes les publications</h1>
 <?php $titlePostH1 = ob_get_clean(); ?>
 

 <?php ob_start() ?>
  
<?php
    $title = "Tous les posts de Sonny";
    $description = "Retrouvez mes dernières publications";  
?>



   <ul id="listPost" class="col-md-12 col-xs-12"> 
<?php
    for($i = 0; $i < count($tabId); $i++) {   
?>
        <!--Appelle la fonction PostView qui se charge de la mise en forme Html-->
        <li class="col-md-12 col-xs-12"><?=PostView($tabId[$i]['id'])?></li>
    
<?php
        
    }
?>
   </ul>
    
    
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>