<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SIGN UP</title>
</head>
<body >

    <form action="signup-check.php" method="post" > 
        <h2>SIGN UP</h2>
        <?php if(isset($_GET['error'])){ ?>
           <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
           <p class="success"> <?php echo $_GET['success']; ?> </p>
        <?php } ?>

        <label for="">Name:</label>
        <?php if(isset($_GET['name'])){ ?>
           <input type="text" name="name" placeholder="Insert Name" 
           value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type="text" name="name" placeholder="Insert Name" >
        <?php } ?>


        <label for="">User Name:</label>
        <?php if(isset($_GET['userName'])){ ?>
            <input type="text" name="userName" placeholder="Insert User Name"
           value="<?php echo $_GET['userName']; ?>"><br>
        <?php }else{ ?>
            <input type="text" name="userName" placeholder="Insert User Name">
        <?php } ?>

        
        <label for="">Password:</label>
        <input type="password" name="userPassword" placeholder="Insert Password">
       

        <label for="">Re Password:</label>
        <input type="password" name="rePassword" placeholder="Re Password">
       

        <button type="submit" >Sign up</button>
        <a href="index.php" class="ca">Already have an account?</a>
    </form>

    
</body>
</html>