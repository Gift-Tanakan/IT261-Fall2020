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
    
    <main>

    <h1 class="not-home"><?php echo $mainHeadline; ?></h1>
        
        <?php include('includes/form.php'); ?>
    
</main>
    
    <aside>
        <h3>Get gifting tips in your inbox for free!</h3>
        <img src="images/create.png" alt="Creative Activity">
        <p>Learn about how gifting thoughtfully is more important than ever before. Explore the true costs behind thoughtless gifting. Hear discussions around the topic like should we continue to gift? Shouldn't we begin to trade secondhand products that are still functional? Or should we begin to form an agreement within a household for not gifting all together but rather doing activities together. Get plenty of resources around this topic that will broaden your perspectives. Sign up now!</p>
    </aside>

    <?php 
    include('includes/footer.php');
    ?>