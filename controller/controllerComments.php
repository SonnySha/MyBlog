<?php
    require_once('model/CommentsManager.php');

    function numbComments($id) {
        $commentManager = new CommentsManager;
        $nbComment = $commentManager->countComments($id);
        return $nbComment;
    }
    
    function listComments($id) {
        $commentManager = new CommentsManager;
        $infoComments = $commentManager->comments($id);
        
        return $infoComments;
    }

    function insertComment($post_id, $author, $comment) {
        $commentManager = new CommentsManager;
        $affectedLines = $commentManager->postComment($post_id, $author, $comment);
    if($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        //header('location: index.php?action=post&id=' . $post_id);
        header('location: http://localhost/myBlog/post/' . $post_id);
        //header('location: index/post/' . $post_id);
    }
        
        
    }

?>