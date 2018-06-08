<?php
    
    require_once('controller/controllerPosts.php');
    require_once('controller/controllerComments.php');
 
function decorationThreePictures() {
?>
    <div id="pictures-drawing" class="container-fluid">
        <div class="col-md-4 col-xs-6 img-rounded">
            <img id="pict1" src="public/picture/programmer.png" alt="">
        </div>

            <div class="col-md-4 col-xs-6 img-rounded">
                <img id="pict2" src="public/picture/coffee.jpg" alt="">
            </div>
            <div class="col-md-4 col-xs-6 img-rounded">
                <img id="pict3" src="public/picture/thought.jpg" alt="">
            </div>
        </div>
<?php
}




function postView($id) {
    $caraPost = elementPost((int)$id);
    //$hashtags = $caraPost['content'];
    $tabHashtags = explode(" ", $caraPost['hashtags']);
    $countComments = numbComments($id);
    //Si illustration mettre sur 10
    $sizePara = 10;
    
    //Coupe le texte aprés les 300 lettres
    if(strlen($caraPost['content']) > 300) {
        $stringContent = $caraPost['content'];
        $stringSub = substr($stringContent, 0, 300);
        $stringSub .= '...';

        $caraPost['content'] = $stringSub;

    }
    
    //var_dump($tabHashtags);
?>
        <div class="jumbotron container text-center post elementPost1 col-md-12 col-sm-12 col-xs-12">
            <h2 class="col-md-12 col-sm-12 col-xs-12">
                <?=$caraPost['title']?>
            </h2>
            <div class="col-md-12 col-sm-12 col-xs-12" >
               
               <!--Illustration -->
                <div class="col-md-2 col-sm-12 col-xs-12 pImg">
                
<?php
        //Illustration
    if($caraPost['picture'] !== "") {
?>
                    <img class="imgPost img-thumbnail" src="public/picture/picturePost/<?= $caraPost['picture']?>" alt="illustration du post <?= $caraPost['title'] ?>">
<?php
    }else {
        //Si il n'y a pas d'illustration mettre sur col-md-12
        $sizePara = 12;
    }
?>
                </div>
                
                <!--Fin illustration -->
               
                <p id="paraPost" class="col-md-<?= $sizePara ?> col-sm-12 col-xs-12 contentPost">
                    <?=$caraPost['content']?>
                </p>
            </div>

            <div class="PostFooter col-md-12 col-sm-12 col-xs-12">
                <ul class="listHastagPost text-center col-md-12 col-xs-12 col-sm-12">
                    <?php
        if($caraPost['hashtags'] !== "") {
            
       
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
                <div class="col-md-12">
                    <p class="datePost col-md-6 col-sm-6 col-xs-12 pull-left">Posté le
                        <?=$caraPost['creation_date_fr']?>
                    </p>
                    <a href="post/<?= $caraPost['id'] ?>" class="btn btn-primary col-md-2 col-xs-12 pull-right"><i class="fas fa-eye"></i> Lire le post <span class="badge label-default"><?=$countComments[0]?></span></a>
                </div>
            </div>



        </div>
        <?php
}















?>
