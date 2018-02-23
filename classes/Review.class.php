<?php

    class Review extends Database{

        public function getAllReviews(){
            $sql = 'SELECT * FROM reviews';
            $pdo = $this-> connect();
            $query = $pdo->prepare($sql);
            $query->execute();
            $reviews = $query->fetchAll(PDO::FETCH_ASSOC);
            return $reviews;
        }

        public function getFeaturedReviews(){
            $sql = 'SELECT * FROM reviews WHERE featured = 1';
            $pdo = $this-> connect();
            $query = $pdo->prepare($sql);
            $query->execute();
            $reviews = $query->fetchAll(PDO::FETCH_ASSOC);
            return $reviews;
        }

        public function addReview($firstName, $lastName, $email, $content){

            $sql = "INSERT INTO reviews SET first_name = :first_name, last_name = :last_name, email = :email, content = :content";
            $pdo = $this-> connect();
            $query = $pdo->prepare($sql);
            $query->execute([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'content' => $content
            ]);

            // DISPLAYING MYSQL ERRORS
            var_dump($query->errorInfo());


            header("Location: index.php");
            die();
        }

    }

?>
