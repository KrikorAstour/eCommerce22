<?php
    class searchModel{
        public function __construct(){
            $this->db = new Model;
        }

       public function getHigherPrice($title, $rarity){
        if($rarity == "all"){
            $this->db->query(
                'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                    . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                    . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                    . 'JOIN users as u ON p.user_id = u.user_id '
                    . 'WHERE p.post_title = :title '
                    . 'ORDER BY p.post_price DESC'
                    
            );
            $this->db->bind(':title', $title);
            return $this->db->getResultSet();
        }else{
            $this->db->query(
                'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                    . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                    . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                    . 'JOIN users as u ON p.user_id = u.user_id '
                    . 'WHERE c.card_rarity = :rarity '
                    . 'AND p.post_title = :title '
                    . 'ORDER BY p.post_price DESC'
            );
            
            $this->db->bind(':title', $title);
            $this->db->bind(':rarity', $rarity);
            return $this->db->getResultSet();
        } 
        }
       
       public function getLowerPrice($title, $rarity){
        //    if($rarity == "all"){
        //         $this->db->query("SELECT * FROM posts
        //         WHERE  ' ' + post_title + ' ' LIKE '% :title %'
        //         ORDER BY post_price ASC");
        //         $this->db->bind(':title', $title);
        //         return $this->db->getResultSet();
        //    }else{
        //         $this->db->query("SELECT * FROM posts
        //                     JOIN cards
        //                     on posts.card_id = cards.crad_id
        //                     WHERE  ' ' + posts.post_title + ' ' LIKE '% :title %'
        //                     AND cards.rarity = :rarity
        //                     ORDER BY post_price ASC");
        //         $this->db->bind(':title', $title);
        //         $this->db->bind(':rarity', $rarity);
        //         return $this->db->getResultSet();             
        //     }
        if($rarity == "all"){
            $this->db->query(
                'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                    . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                    . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                    . 'JOIN users as u ON p.user_id = u.user_id '
                    . 'WHERE p.post_title = :title '
                    . 'ORDER BY p.post_price ASC'
                    
            );
            $this->db->bind(':title', $title);
            return $this->db->getResultSet();
        }else{
            $this->db->query(
                'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                    . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                    . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                    . 'JOIN users as u ON p.user_id = u.user_id '
                    . 'WHERE c.card_rarity = :rarity '
                    . 'AND p.post_title = :title '
                    . 'ORDER BY p.post_price ASC'
            );
            
            $this->db->bind(':title', $title);
            $this->db->bind(':rarity', $rarity);
            return $this->db->getResultSet();
        }
        }

        public function getNewest($title, $rarity){
            if($rarity == "all"){
                // $this->db->query("SELECT * FROM posts
                //             WHERE   post_title LIKE CONCAT('%', :title, '%')
                //         ORDER BY updated_at DESC");
                // $this->db->bind(':title', $title);
                // return $this->db->getResultSet(); 
                $this->db->query(
                    'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                        . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                        . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                        . 'JOIN users as u ON p.user_id = u.user_id '
                        . 'WHERE p.post_title = :title '
                        . 'ORDER BY p.updated_at ASC'
                        
                );
                $this->db->bind(':title', $title);
                return $this->db->getResultSet();
            }else{
                $this->db->query(
                    'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                        . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                        . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                        . 'JOIN users as u ON p.user_id = u.user_id '
                        . 'WHERE c.card_rarity = :rarity '
                        . 'AND p.post_title = :title '
                        . 'ORDER BY p.updated_at ASC'
                );
                
                $this->db->bind(':title', $title);
                $this->db->bind(':rarity', $rarity);
                return $this->db->getResultSet();
            }             
        }

        public function getOldest($title, $rarity){
            if($rarity == "all"){
                // $this->db->query("SELECT * FROM posts
                //             WHERE   post_title LIKE CONCAT('%', :title, '%')
                //         ORDER BY updated_at DESC");
                // $this->db->bind(':title', $title);
                // return $this->db->getResultSet(); 
                $this->db->query(
                    'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                        . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                        . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                        . 'JOIN users as u ON p.user_id = u.user_id '
                        . 'WHERE p.post_title = :title '
                        . 'ORDER BY p.updated_at DESC'
                        
                );
                $this->db->bind(':title', $title);
                return $this->db->getResultSet();
            }else{
                $this->db->query(
                    'SELECT p.post_id, post_title, post_description, post_price, p.created_at as post_creation, '
                        . 'card_name, card_rarity, card_image, p.user_id, u.username, isOffered '
                        . 'FROM posts as p JOIN cards as c ON p.card_id = c.card_id '
                        . 'JOIN users as u ON p.user_id = u.user_id '
                        . 'WHERE c.card_rarity = :rarity '
                        . 'AND p.post_title = :title '
                        . 'ORDER BY p.updated_at DESC'
                );
                
                $this->db->bind(':title', $title);
                $this->db->bind(':rarity', $rarity);
                return $this->db->getResultSet();
            }            
        }

    }
?>
