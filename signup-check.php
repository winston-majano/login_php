<?php  
session_start();
include "db_conn.php";

    if(isset($_POST['userName']) && isset($_POST['userPassword']) && 
        isset($_POST['name']) && isset($_POST['rePassword'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $userName = validate($_POST['userName']);
        $userPassword = validate($_POST['userPassword']);
        $name = validate($_POST['name']);
        $rePassword = validate($_POST['rePassword']);

        $user_data = 'userName='.$userName. '&name=' .$name;

        if(empty($name)){ 
            header("Location: signup.php?error=Name  is Required&$user_data");
            exit();
        }else if(empty($userName)){
            header("Location: signup.php?error=User name is Required&$user_data");
            exit();
        }else if(empty($userPassword)){ 
            header("Location: signup.php?error=Password is Required&$user_data");
            exit();
        }else if(empty($rePassword)){ 
            header("Location: signup.php?error=Re Password is Required&$user_data");
            exit();
        }else if( $userPassword !== $rePassword){ 
            header("Location: signup.php?error=The confirmation  password does not match&$user_data");
            exit();
        }else {

            //encriptando el password
            $userPassword = md5($userPassword);
            
            $sql = "SELECT * FROM users WHERE user_name ='$userName'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                header("Location: signup.php?error=The username is take try another&$user_data");
                exit();
            }else{
                $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$userName', '$userPassword', '$name')";
                $result2 = mysqli_query($con, $sql2);
                if($result2){
                    header("Location: signup.php?success=Your account has been created successfully");
                    exit();
                }else{
                    header("Location: signup.php?error=unknown error  occurred &$user_data");
                    exit();
                }
            }
           


         
        }

    }else{
        header("Location: index.php");
        exit();
    }
?>