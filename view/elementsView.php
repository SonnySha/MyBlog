<?php

/**
*Ce view gère tous les éléments tels que les posts et la décoration du site.
*On met toutes les balises HTML dans une fonction et on appelle cette fonction dans le template. 
*Cette technique permet d'avoir un plus petit template tous en gardant la main mise sur les évolutions.
*/
    
    require_once('controller/controllerPosts.php');
    require_once('controller/controllerComments.php');

/**
*Gère le header, on peut ajouter facilement des images et du texte
*/
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



/**
*Gère l'élément post et donne un apercu du poste sur la page d'accueil.
*/
function postView($id) {
    $tabInfosPost = elementPost((int)$id);//Place les informations du poste dans un variable array
    $tabHashtags = explode(" ", $tabInfosPost['hashtags']); //Récupère la ligne de la bdd avec les hastags et enlève les espaces, puis place le tous dans un array avec tous les hastags du poste
    $countComments = numbComments($id);
    
    //Mise en forme des illustrations pour qu'elle soit à coté du texte. Si il y a une illustration mettre sur 10
    $sizePara = 10;
    
    //Coupe le texte aprés les 300 lettres
    if(strlen($tabInfosPost['content']) > 300) {
        $stringContent = $tabInfosPost['content'];
        $stringSub = substr($stringContent, 0, 300);
        $stringSub .= '...';

        $tabInfosPost['content'] = $stringSub;

    }
    
?>
    <!-- Mise en place des informations récupérées sur le poste-->
        <div class="jumbotron container text-center post elementPost1 col-md-12 col-sm-12 col-xs-12">
            <h2 class="col-md-12 col-sm-12 col-xs-12">
                <?=$tabInfosPost['title']?>
            </h2>
            <div class="col-md-12 col-sm-12 col-xs-12" >
               
    <!--Illustration -->
                <div class="col-md-2 col-sm-12 col-xs-12 pImg">
                
<?php
        //Illustration, charge l'image
    if($tabInfosPost['picture'] !== "") {
?>
                    <img class="imgPost img-thumbnail" src="public/picture/picturePost/<?= $tabInfosPost['picture']?>" alt="illustration du post <?= $tabInfosPost['title'] ?>">
<?php
    }else {
        //Si il n'y a pas d'illustration mettre sur col-md-12 (pour que le paragraphe prenne toute la place)
        $sizePara = 12;
    }
?>
                </div>
                
    <!--Fin illustration -->
              
    <!--Paragraphe-->
                <p id="paraPost" class="col-md-<?= $sizePara ?> col-sm-12 col-xs-12 contentPost">
                    <?=$tabInfosPost['content']?>
                </p>
    <!--Fin paragraphe-->
            </div>

    
            <div class="PostFooter col-md-12 col-sm-12 col-xs-12">
    <!--Hastags-->
                <ul class="listHastagPost text-center col-md-12 col-xs-12 col-sm-12">
                    <?php
        if($tabInfosPost['hashtags'] !== "") {
            
       
    foreach($tabHashtags as $hashtag) {//Récupération des hastags et les places dans des items
        $hashtagRewriteForHref = substr($hashtag, 1, strlen($hashtag)-1);// Réécriture du hastag pour les urls
        
?>
                        <li>
                            <a href="hashtag/<?=$hashtagRewriteForHref?>" class="btn">
                                <?=$hashtag?>
                            </a>
                        </li>
                        <?php
    }
             }
?>
                </ul>
    <!--Fin Hastags-->
                <div class="col-md-12">
                    <p class="datePost col-md-6 col-sm-6 col-xs-12 pull-left">Posté le
                        <?=$tabInfosPost['creation_date_fr']?>
                    </p>
                    <a href="post/<?= $tabInfosPost['id'] ?>" class="btn btn-primary col-md-2 col-xs-12 pull-right"><i class="fas fa-eye"></i> Lire le post <span class="badge label-default"><?=$countComments[0]?></span></a>
                </div>
            </div>



        </div>
        <?php
}















?>
