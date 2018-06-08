<?php

/**
 * Class FavoriteManager
 *
 * Permets de gérer les commentaires du blog.
 */  
class CommentsManager extends Manager {
    
    /**
    *Compte les commentaires pour le poste passé en paramètre
    *
    *@param int $id Id du post
    *
    *@return int le nombre de commentaires pour ce poste
    */
    public function countComments($id) {
        $db = $this->dbConnect();
        $req  = $db->prepare('SELECT COUNT(*) FROM Comments WHERE post_id = ?');
        $req->execute(array($id));
        
        $nbComments = $req->fetch();
        
        return $nbComments;
    }
    
    /**
    *Liste les commentaires du poste passé en paramètre
    *
    *@param int $id Id du post
    *
    *@return array La liste des commentaires
    */
    public function comments($id) {
        $db = $this->dbConnect();
        $req  = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY `comment_date` DESC');
        
        

        $req->execute(array($id));
        
        $comments = $req->fetchAll();
        
        return $comments;
    }
    
    /**
    *Poster un commentaire sur un poste
    *
    *@param int $postId Id du poste
    *@param string $author Auteur du poste
    *@param string $comment Commentaire du poste
    *
    *@return bool Si l'action a réussi
    */
    public function postComment($postId, $author, $comment) {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $req->execute(array($postId, $author, $comment));
    
    return $affectedLines;

}
    
}


?>