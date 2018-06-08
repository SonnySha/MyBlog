<!--Gére l'affichage d'un post-->
<?php ob_start(); ?>
   <!-- Pas d'image dans le header-->
<?php $pictures = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php  
    require_once('controller/controllerComments.php');
    
    $tabComments = listComments($id);
    
    $numbreComments = numbComments($id);
    
    $titleComment = "Commentaires ( " . $numbreComments[0] . " )";
    
    if($numbreComments[0] == 0) {
        $titleComment = "Aucun commentaire";
    }
    
    $titlePostH1 = ob_get_clean(); 
    $styleBackgroundImg = "public/picture/picturePost/" . $infoPost['picture'];
    $tabHashtags = explode(" ", $infoPost['hashtags']);
    //Taille quand il n'y a pas d'image
    $heightImg = 100;
    
    if($infoPost['hashtags'] !== "") {
        $heightImg = 350;
    }

$title = "Post : " . $infoPost['title'];
    
?>


<?php ob_start(); ?>

<div class="jumbotron container post elementPost1" id="postView">
   
    <div class="col-md-12" id="divTitleImgHashtag" style="background-image: url(<?= $styleBackgroundImg ?>);background-repeat:no-repeat;background-size:100% 100%;height: <?= $heightImg ?>px;">
        <h1 id="titlePost" class="col-md-12 col-sm-12 col-xs-12">
            <?= $infoPost['title'] ?>
        </h1>
        <?php
        if($infoPost['hashtags'] !== "") {
?>

            <ul class="hastagPost text-center col-md-12 col-sm-12 col-xs-12">
                <?php
        
            
       
    foreach($tabHashtags as $hashtag) {
        $hashtagRewrite = substr($hashtag, 1, strlen($hashtag)-1);
        
?>
                    <li>
                        <a href="hashtag/<?=$hashtagRewrite?>" class="btn">
                            <?=$hashtag?>
                        </a>
                    </li>
                    <?php
    }
             }
?>


            </ul>
    </div>

    <article id="articlePost" class="col-md-12">
        <h2 class="col-md-12 col-sm-12 col-xs-12 ">
            <?= $infoPost['title'] ?>
        </h2>
        <p id="paraContentPost"  class="col-md-12 col-sm-12 col-xs-12">
            <?= nl2br($infoPost['content']) ?>
        </p>
        <p id="date-post" class="pull-right ">
            <?= $infoPost['creation_date_fr'] ?>
        </p>
    </article>

    <section id="sectionComment" class="col-md-12">
        <h3 class="col-md-5 pull-left">
            <?= $titleComment ?>
        </h3>
        <ul id="commentsList" class="col-md-12 col-sm-12 col-xs-12 text-centere">

            <?php
        foreach($tabComments as $comment) {
?>
                <li class="jumbotron col-md-8 col-sm-12 col-xs-12">
                    <div class="col-md-12">
                        <h4 class="text-center col-md-3">
                            <?= htmlspecialchars($comment['author']) ?>
                        </h4>
                        <p class="col-md-9">
                            <?= htmlspecialchars($comment['comment']) ?>
                        </p>
                    </div>


                    <p class="comment-date pull-right">
                        <em><?= $comment['comment_date_fr'] ?></em> 
                    </p>
                </li>
                <?php  
        }
?>



        </ul>
<!--Poster un commentaire-->
        <form action="addComment/<?= $infoPost['id'] ?>" method="post" class="form-horizontal ">
            <fieldset class="jumbotron col-md-12 col-sm-12 col-xs-12 text-center">

                <legend class="col-md-12 col-sm-12 col-xs-12">Laissez un commentaire :</legend>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="author">Pseudo</label>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <input id="author" name="author" placeholder="Votre pseudo" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="comment">Votre commentaire</label>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <textarea class="form-control" placeholder="Votre commentaire" id="comment" name="comment"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right "><i class="fa fa-commenting " aria-hidden="true"></i>
 Poster votre commentaire</button>

            </fieldset>
        </form>
    </section>


</div>










<?php $content = ob_get_clean(); ?>
<?php
    require('view/template.php');
?>
