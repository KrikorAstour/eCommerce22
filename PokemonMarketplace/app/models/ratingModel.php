<?php
    class ratingModel extends Model{

        public function __construct(){
            parent::__construct();
        }
        
        public function getOneUserRating($user_id,$rated_by){
            $this->query('SELECT rating_id, rating_num
                        FROM rating 
                        WHERE user_id = :user_id AND rated_by = :rated_by');

            $this->bind(":user_id",$user_id);
            $this->bind(":rated_by",$rated_by);

            return $this->getSingle();
        }

        public function getUserRatingAvg($user_id){
            $this->query('SELECT AVG(rating_num) 
                        FROM rating 
                        WHERE user_id = :user_id ');

            $this->bind(":user_id",$user_id);

            return $this->getSingle();
        }

        public function giveRating($user_id,$rated_by,$rating_num){


            $this->query('INSERT INTO rating (user_id,rated_by,rating_num) 
                        VALUES (:user_id,:rated_by,:rating_num)');

            $this->bind(":user_id",$user_id);
            $this->bind(":rated_by",$rated_by);
            $this->bind(":rating_num",$rating_num);

            if($this->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateRating($rating_id,$rating_num){
            $this->query("UPDATE rating 
                          SET rating_num = :rating_num
                          WHERE rating_id = :rating_id ");

            $this->bind(":rating_num",$rating_num);
            $this->bind(":rating_id",$rating_id);
            
            if($this->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>