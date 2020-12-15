<?php // this is my login page

include('server.php');
include('includes/header.php');

?>

<h1 class="center"><?php echo $mainHeadline; ?></h1>

<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <fieldset>
        <label>Username</label>
        <input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">
        
        <label>Password</label>
        <input type="password" name="Password">
        
        <?php 
        include('includes/errors.php');
        ?>
        
        <button type="submit" class="btn" name="login_user">Login</button>
        
        <button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>
        
    </fieldset>

</form>

<p class="center log-msg">Haven't registered? Register <a href="register.php">here!</a></p>

</div>
</body>
</html>


