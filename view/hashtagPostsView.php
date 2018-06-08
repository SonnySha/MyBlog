<?php
    require_once('view/elementsView.php');

/**
* View qui affiche la liste des posts avec un hastags puis charge le template
*/

if(isset($_GET['value'])) { //Gére le titre de la page et sa description
    $title = "Publication avec le Hashtag " . $_GET['value'];
    $description = "Retrouver les posts de Sonny avec le hashtag" . $_GET['value'];
}else {
    $title = "Aucun post";
    $description = "Aucun post"; 
}
$textH1 = 'Publication avec le Hashtag : ' . $_GET['value']; //Le texte du H1
if(count($tabPosts) == 0) { //Si il n'y a auncun post correspondant à ce hastag chnager le H1
    $textH1 = "Aucun post avec les hashtag : " . $_GET['value'];
}

?>

<!--La decoration du header-->
 <?php ob_start(); ?>
    <?php decorationThreePictures(); ?>
<?php $pictures = ob_get_clean(); ?>

<!--Le H1-->
<?php ob_start(); ?>
     <h1 class="row"><?= $textH1 ?></h1>
 <?php $titlePostH1 = ob_get_clean(); ?>

<!--Le contenu (les postes)-->
<?php ob_start(); ?>
    
       <ul id="listPost" class="col-md-12 col-xs-12"> 
        
<?php
        foreach($tabPosts as $idPost) {
            postView($idPost['id']);
        }
?>
        
   </ul>
    
    
    
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>