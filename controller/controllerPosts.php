<?php
    
    require_once('model/PostsManager.php');
    
    function allPosts() {
        $postManager = new PostsManager;
        $tabId = $postManager->idPosts();
        
        
        
        require('view/listPostView.php');
    }
    
    function elementPost($id) {
        //Utiliser par elementView
        $postManager = new PostsManager;
        $post = $postManager->viewPost($id);
        
        return $post;
    }

    function post($id) {
        $postManager = new PostsManager;
        $infoPost = $postManager->viewPost($id);
        
        require('view/postView.php');
    }

    
    
    function searchPostHashtag($value) {
        $postManager = new PostsManager;
        $tabPosts = $postManager->searchHastag($value);
        
        require('view/hashtagPostsView.php');
        
    }
    
?>