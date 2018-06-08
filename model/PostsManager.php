<?php
    require_once('model/Manager.php');
class PostsManager extends Manager {
    
    public function idPosts() {
        $db = $this->dbConnect();
        $req  = $db->query('SELECT id FROM posts ORDER BY `creation_date` DESC');
        
        $tabId = $req->fetchAll();
        
        return $tabId;
    }
    
    public function viewPost($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, hashtags, picture, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ? ORDER BY `creation_date` DESC');
        $req->execute(array($id));
        
        $post = $req->fetch();
        
        return $post;
    }
    
    public function searchHastag($hashtag) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content,hashtags, picture, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts where hashtags LIKE :value ORDER BY `creation_date` DESC');

        $req->execute(array(':value' => '%' . $hashtag . '%'));
        
        $tabPosts = $req->fetchAll();
        
        return $tabPosts;
    }
    
    
    
    
    
    
}
?>
