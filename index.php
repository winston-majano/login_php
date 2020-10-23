<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>
</head>
<body >

    <form action="login.php" method="post" > 
        <h2>Login</h2>
        <?php if(isset($_GET['error'])){ ?>
           <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label for="">User Name:</label>
        <input type="text" name="userName" placeholder="Insert User Name">
        <label for="">Password:</label>
        <input type="password" name="userPassword" placeholder="Insert Password">
        <button type="submit" >Login</button>
        <a href="signup.php" class="ca">Create an account</a>
    </form>

    
</body>
</html>