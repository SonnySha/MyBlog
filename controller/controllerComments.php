<?php
    require_once('model/CommentsManager.php');
    
    /**
    *Compte les commentaires pour le poste passé en paramètre.
    *
    *@param int $id Id du post
    *
    *@return int le nombre de commentaires pour ce poste
    */
    function numbComments($id) {
        $commentManager = new CommentsManager;
        $nbComment = $commentManager->countComments($id);
        return $nbComment;
    }
    
    /**
    *Liste les commentaires du poste passé en paramètre
    *
    *@param int $id Id du post
    *
    *@return array La liste des commentaires
    */
    function listComments($id) {
        $commentManager = new CommentsManager;
        $infoComments = $commentManager->comments($id);
        
        return $infoComments;
    }
    
    /**
    *Poster un commentaire sur un poste
    *
    *@param int $postId Id du poste
    *@param string $author Auteur du poste
    *@param string $comment Commentaire du poste
    *
    */
    function insertComment($post_id, $author, $comment) {
        $commentManager = new CommentsManager;
        $affectedLines = $commentManager->postComment($post_id, $author, $comment);
    if($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('location: http://localhost/myBlog/post/' . $post_id);
    }
        
        
    }

?>