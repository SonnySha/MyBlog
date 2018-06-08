<?php
    require_once("view/elementsView.php");
    require_once('controller/controllerPosts.php');
?>
<!doctype html>
<html>

<head>
    <base href="/myBlog/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    
    <!-- CDN Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CDN Icone -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- font-family: 'Indie Flower', cursive; -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Raleway" rel="stylesheet"> 
    <!-- Responsive -->
    <link rel="stylesheet" media="all and (max-device-width: 990px)" href="public/css/styleMediaSm.css" />
    
    
</head>

<body class="container-fluid">

    <header>
        <nav class="container navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
      </button>
                    <a class="navbar-brand" href="#">Sonny Web { Blog }</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="allPosts">#All</a></li>
                        <li><a href="hashtag/Alternance">#Alternance</a></li>
                        <li><a href="hashtag/OCR">#OCR</a></li>
                        <li><a href="hashtag/Dev">#Dev</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Quitter</a></li>
                    </ul>
                </div>

        </nav>
            <?= $pictures ?>
    </header>

    <section>
        <div class="container">
            <?= $titlePostH1 ?>
            <article  class="row text-center">
            
           <?= $content ?>

            </article>
        </div>

    </section>




    <!-- CDN JQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
