<?php
    require_once('model/Manager.php');

/**
 * Class PostsManager
 *
 * Permets de gérer les postes dans la base de données.
 */
class PostsManager extends Manager {
    
    /**
    *Liste tous les "id" des postes dans la bdd.
    *Trie par ordre décroissant.
    *
    *@return array Tous les id des postes trié
    */
    public function idPosts() {
        $db = $this->dbConnect();
        $req  = $db->query('SELECT id FROM posts ORDER BY `creation_date` DESC');
        
        $tabId = $req->fetchAll();
        
        return $tabId;
    }
    
    /**
    *Récupère les informations du poste passé en paramètre.
    *
    *@param int $id Id du poste
    *
    *@return array Informations du poste
    */
    public function viewPost($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, hashtags, picture, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ? ORDER BY `creation_date` DESC');
        $req->execute(array($id));
        
        $post = $req->fetch();
        
        return $post;
    }
    
    /**
    *Liste les postes avec le hastags passé en paramètre.
    *
    *@param string $hashtag Le tag à rechercher
    *
    *@return array Liste de tous les postes avec le hastag défini
    */
    public function searchHastag($hashtag) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content,hashtags, picture, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts where hashtags LIKE :value ORDER BY `creation_date` DESC');

        $req->execute(array(':value' => '%' . $hashtag . '%'));
        
        $tabPosts = $req->fetchAll();
        
        return $tabPosts;
    }
    
    
    
    
    
    
}
?>
