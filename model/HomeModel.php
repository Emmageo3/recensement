<?php

    class HomeModel {
        public $db;

        public function CheckUserLogin($username, $password){
            
            $query = "SELECT count(*) FROM users WHERE username = '{$username}' AND mdp='{$password}'";
            $stmt = $this->db->prepare($query)->execute();
            return $stmt;
        }

        public function UserRegister($username, $password){

            $query = "INSERT INTO users (username, mdp) VALUES ('".$username."','".$password."')";
            $stmt = $this->db->query($query);
            return 1;
        }
    }