<?php
    class searchModel{
        public function __construct(){
            $this->db = new Model;
        }

       public function getHigherPrice($title){
           $this->query("SELECT * FROM posts
                        WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                        ORDER BY price DESC
                        ");
            $this->db->bind(':title', $title);            
       }
       
       public function getLowerPrice($title){
        $this->query("SELECT * FROM posts
                     WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                     ORDER BY post_price ASC");
        $this->db->bind(':title', $title);
        return $this->db->getResultSet();             
        }

        public function getNewest($title){
            $this->query("SELECT * FROM posts
                            WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                        ORDER BY updated_at DESC");
            $this->db->bind(':title', $title);
            return $this->db->getResultSet();             
        }

        public function getOldest($title){
            $this->query("SELECT * FROM posts
                            WHERE  ' ' + post_title + ' ' LIKE '% :title %'
                        ORDER BY updated_at ASC");
            $this->db->bind(':title', $title);
            return $this->db->getResultSet();             
        }

    }
?>