<?php 

session_start();

if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}

include('config.php'); 
include('includes/header.php');
?>

<?php 
// notification message

if(isset($_SESSION['success'])) : ?>
<div class="error success">
    <h3><?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?></h3>
</div>

<?php endif ?>
    
    

    <h1 class="<?php echo $center ;?>"><?php echo $mainHeadline; ?></h1>

<blockquote class="<?php echo $center ;?>">You'll be receiving a confirmation in your inbox very soon. We appreciate that you get started with this small but significant step of sustainability!</blockquote>
        
    <?php 
    include('includes/footer.php');
    ?>
