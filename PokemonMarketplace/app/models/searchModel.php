<?php
    class searchModel{
        public function __construct(){
            $this->db = new Model;
        }

       public function getHigherPrice($title, $rarity){
           if($rarity == "all"){
                $this->query("SELECT * FROM posts
                WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                ORDER BY price DESC
                ");
                $this->db->bind(':title', $title);
           }
           else{
            $this->query("SELECT * FROM posts
                            JOIN cards
                            on posts.card_id = cards.crad_id
                            WHERE  ' ' + posts.post_title + ' ' LIKE '% :title %'
                            AND cards.rarity = :rarity
                            ORDER BY price DESC
                            ");
                $this->db->bind(':title', $title);  
                $this->db->bind(':rarity', $rarity);          
           } 
        }
       
       public function getLowerPrice($title, $rarity){
           if($rarity == "all"){
                $this->query("SELECT * FROM posts
                WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                ORDER BY post_price ASC");
                $this->db->bind(':title', $title);
                return $this->db->getResultSet();
           }else{
                $this->query("SELECT * FROM posts
                            JOIN cards
                            on posts.card_id = cards.crad_id
                            WHERE  ' ' + posts.post_title + ' ' LIKE '% :title %'
                            AND cards.rarity = :rarity
                            ORDER BY post_price ASC");
                $this->db->bind(':title', $title);
                $this->db->bind(':rarity', $rarity);
                return $this->db->getResultSet();             
            }
        }

        public function getNewest($title, $rarity){
            if($raity == "all"){
                $this->query("SELECT * FROM posts
                            WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                        ORDER BY updated_at DESC");
                $this->db->bind(':title', $title);
                return $this->db->getResultSet(); 
            }else{
                $this->query("SELECT * FROM posts
                            JOIN cards
                            on posts.card_id = cards.crad_id
                            WHERE  ' ' + posts.post_title + ' ' LIKE '% :title %'
                            AND cards.rarity = :rarity
                            ORDER BY updated_at DESC");
                $this->db->bind(':title', $title);
                $this->db->bind(':rarity', $rarity);
                return $this->db->getResultSet();
            }             
        }

        public function getOldest($title, $rarity){
            if($rarity == "all"){
                $this->query("SELECT * FROM posts
                            WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                        ORDER BY updated_at ASC");
                $this->db->bind(':title', $title);
                return $this->db->getResultSet();  
            }else{
                $this->query("SELECT * FROM posts
                                JOIN cards
                                on posts.card_id = cards.crad_id
                            WHERE  ' ' + posts.post_title + ' ' LIKE '% :title %'
                            AND cards.rarity = :rarity
                            ORDER BY updated_at ASC");
                $this->db->bind(':title', $title);
                $this->db->bind(':rarity', $rarity);
                return $this->db->getResultSet();
            }             
        }

    }
?>