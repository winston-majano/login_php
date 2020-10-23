<?php  
session_start();
include "db_conn.php";

    if(isset($_POST['userName']) && isset($_POST['userPassword'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $userName = validate($_POST['userName']);
        $userPassword = validate($_POST['userPassword']);

       

        if(empty($userName)){
            header("Location: index.php?error=User name is Required ");
            exit();
        }else if(empty($userPassword)){ 
            header("Location: index.php?error=Password is Required ");
            exit();
        }else {
            $userPassword = md5($userPassword);
            
            $sql = "SELECT * FROM users WHERE user_name ='$userName' AND password='$userPassword'";

            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['user_name']=== $userName && $row['password']===$userPassword){
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: home.php");
                    exit();

                }else{
                    header("Location: index.php?error=Incorrect user name or password");
                    exit();
                }

            }else{
                header("Location: index.php?error=Incorrect user name or password");
                exit();
            }
        }

    }else{
        header("Location: index.php");
        exit();
    }
?>