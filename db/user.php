<?php

    class user {

        // Private database object
        private $db;

        // constructor to initialize privstre variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username, $password){
            try {
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0){
                    return false;
                }else{
                    // we want the password to be encrypted so cannot be seen
                    // into our database.We use d5() for that and we append the username also
                    $new_password = md5($password.$username);
                    // we use the names as they are in the table db
                    $sql = "INSERT INTO users (username, password) VALUES (:username,:password)";
                    // Prepare the sql statements for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholders to the actual values
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                    
                    // execute statement
                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
             }

        }

        public function getUser($username, $password){
            try{
                $sql = "select * from users where username = :username AND password = :password ";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;  
        
            }catch
                (PDOException $e) {
                    echo $e->getMessage();
                    return false;
        
             }


        }
// the purpose of the next function is not to enter two users with the same username
        public function getUserbyUsername($username){
            try{
                $sql = "select count(*) as num from users where username = :username ";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;  
        
            }catch
                (PDOException $e) {
                    echo $e->getMessage();
                    return false;
        
             } 

        }

    }

?>