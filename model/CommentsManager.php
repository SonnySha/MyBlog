<?php
    
class CommentsManager extends Manager {
    
    public function countComments($id) {
        $db = $this->dbConnect();
        $req  = $db->prepare('SELECT COUNT(*) FROM Comments WHERE post_id = ?');
        $req->execute(array($id));
        
        $nbComments = $req->fetch();
        
        return $nbComments;
    }
    
    public function comments($id) {
        $db = $this->dbConnect();
        $req  = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY `comment_date` DESC');
        
        

        $req->execute(array($id));
        
        $comments = $req->fetchAll();
        
        return $comments;
    }
    
    public function postComment($postId, $author, $comment) {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $req->execute(array($postId, $author, $comment));
    
    return $affectedLines;

}
    
}


?>