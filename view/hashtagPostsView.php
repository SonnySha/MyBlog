<?php
    require_once('view/elementsView.php');
    
if(isset($_GET['value'])) {
    $title = "Publication avec le Hashtag " . $_GET['value'];
    $description = "Retrouver les posts de Sonny avec le hashtag" . $_GET['value'];
}else {
    $title = "Aucun post";
    $description = "Aucun post"; 
}
$textH1 = 'Publication avec le Hashtag : ' . $_GET['value'];
if(count($tabPosts) == 0) {
    $textH1 = "Aucun post avec les hashtag : " . $_GET['value'];
}

?>
 
 <?php ob_start(); ?>
    <h1 class="row">pu</h1>
 <?php $titlePostH1 = ob_get_clean(); ?>

 <?php ob_start(); ?>
    <?php decorationThreePictures(); ?>
<?php $pictures = ob_get_clean(); ?>
 
<?php ob_start(); ?>
     <h1 class="row"><?= $textH1 ?></h1>
 <?php $titlePostH1 = ob_get_clean(); ?>

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