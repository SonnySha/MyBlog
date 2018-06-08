<?php
    
    require_once('model/PostsManager.php');
    
    /**
    *Place tous les postes dans une variable pour pouvoir les exploiter dans un view.
    *
    */
    function allPosts() {
        $postManager = new PostsManager;
        $tabId = $postManager->idPosts();
        
        
        
        require('view/listPostView.php');
    }
    
    /**
    *Place les informations du post dans une variable
    *
    *@param int $id Id du post
    *
    *@return array informations sur le poste
    */
    function elementPost($id) {
        //Utiliser par elementView
        $postManager = new PostsManager;
        $post = $postManager->viewPost($id);
        
        return $post;
    }
    
    /**
    *Place les informations du poste dans une variable pour pouvoir les exploiter dans un view
    *
    *@param int $id id du post
    */
    function post($id) {
        $postManager = new PostsManager;
        $infoPost = $postManager->viewPost($id);
        
        require('view/postView.php');
    }

    
    /**
    *Place les postes correspondant au hastag passé en paramètre pour pouvoir les exploiter dans un view
    *
    *@param string $value Le hastag
    */
    function searchPostHashtag($value) {
        $postManager = new PostsManager;
        $tabPosts = $postManager->searchHastag($value);
        
        require('view/hashtagPostsView.php');
        
    }
    
?>