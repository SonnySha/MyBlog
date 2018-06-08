<?php
    
    var_dump($_GET);
    var_dump($_POST);
    require_once('controller/controllerPosts.php');
    require_once('controller/controllerComments.php');
    
    try {
        if(isset($_GET['action'])) {
            if($_GET['action'] == 'allPosts') {
                allPosts();
            }elseif($_GET['action'] == 'hashtag') {
                if(isset($_GET['value'])) {
                    searchPostHashtag($_GET['value']);
                }else {
                    throw new Exception('Aucun hashtag n\'a été sélectionnée');
                }
                
            }elseif($_GET['action'] == 'post') {
                if(isset($_GET['id'])) {
                    post($_GET['id']);
                }else {
                    throw new Exception('Aucun identifiant de poste n\'est sélectionnée');
                }
                
            }elseif($_GET['action'] == 'addComment') {
                if(isset($_POST['author']) && isset($_POST['comment'])) {
                    if($_POST['author'] !== "" && htmlspecialchars($_POST['comment']) !== "") {
                        insertComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                    }else {
                        throw new Exception('Votre commentaire n\'est pas valide');
                    }
                }
            }
            
            
            
            
        } else {
            allPosts();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
    
    
?>