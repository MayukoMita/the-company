<?php
    require "database.php";

    class User extends Database{

        // function to save a new user
        public function saveUser($first_name, $last_name,$username,$password){

            $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES('$first_name','$last_name','$username','$password')";
            
            if($this->conn->query($sql)){ // execute SQL statement (insert into the table)
                // go to the login page
                header("location: ../views");
                exit;
            }else{
                die("Error saving a new user: ".$this->conn->error);
            }
        }

        // login function
        public function login($username,$password){
            
            // find the user
            $sql = "SELECT * FROM users WHERE username = '$username'";

            $result = $this->conn->query($sql);

            if($result->num_rows == 1){ // if a match for the username is found
                $user_data = $result->fetch_assoc();

                // check password
                if(password_verify($password,$user_data['password'])){
                    // if the password is correct, create a session
                    session_start();
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['user_id'] = $user_data['id'];

                    // go to the dashboard page
                    header("location: ../views/Dashboard.php");
                    exit;
                }else{
                    die("Incorrect password");
                }
            }else{
                die("User not found");
            }
        }

        // function to return list of all users
        public function getAllUsers(){

            $sql ="SELECT * FROM users";

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die("Error retrieving users list: ".$this->conn->error);
            }
        }

        // function to return the data of one user
        public function getUser($user_id){

            $sql = "SELECT * FROM users WHERE id = $user_id";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc(); // return one row from the result
            }else{
                die("Error retrieving user: ".$this->conn->error);
            }
        }

        // function to edit a user
        public function editUser($user_id,$first_name,$last_name,$username){
            $sql = "UPDATE users SET first_name = '$first_name',
                                    last_name = '$last_name',
                                    username = '$username'
                                    WHERE id = $user_id";
            
            if($this->conn->query($sql)){
                // go to dashboard
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error updating user: ".$this->conn->error);
            }
        }

        // function to delete a user based on ID
        public function deleteUser($user_id){
            $sql = "DELETE FROM users WHERE id = $user_id";

            if($this->conn->query($sql)){
                // go to the dashboard page
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error deleting user: ".$this->conn->error);
            }
        }

        // function to upload photo for session (logged-in) user
        public function uploadPhoto($user_id, $file_name, $tmp_name){
            // save the file name for the user in database
            $sql = "UPDATE users SET photo = '$file_name' WHERE id = $user_id";

            if($this->conn->query($sql)){
                $destination = "../images/$file_name";

                if(move_uploaded_file($tmp_name,$destination)){ // if an uploaded file is successfully moved to a new location
                    // go to the profile page
                    header("location: ../views/profile.php");
                    exit;
                }else{
                    die("Cannot move the file");
                }
            }else{
                die("Error updating the photo: ".$this->conn->error);
            }
        }
    }
?>