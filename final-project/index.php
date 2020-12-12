<?php  
// in order to view this page, a user must have register and logged in, otherwise, they must be directed to do so

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

<div id="wrapper">
    
    <div class="home-content">
    <h1 class="<?php echo $center; ?>"><?php echo $mainHeadline; ?></h1>
    <!--        <img src="images/img1.jpg" alt="img1">-->

    <?php

    $photos[0] = 'img1';
    $photos[1] = 'img2';
    $photos[2] = 'img3';
    $photos[3] = 'img4';
    $photos[4] = 'img5';

    $i = rand(0, count($photos) -1);
    $selectedImages = 'images/'.$photos[$i].'.png';
    echo '<img src="'.$selectedImages.'" alt="Gifts ideas">'; 

    ?>


    <blockquote>
        There are many times that the gifts we give others end up at the corner of their home, underneath a pile of other stuff, or even go right into the storage, unused. We know that moment when we receive something that we wish we don't, something we truly don't need. The best we do is donating or selling. But majority won't make that effort. Dumping it in the trash is easier. </blockquote>
        
        <blockquote>This happens everywhere and every year. Those things contribute a large amount of trash in landfills, polluting the planet. This is the time to have more conversations about how we can give gifts more mindfully. This is the space that helps you learn about the <a href="why.php">reasons</a> of mindful gift giving and the <a href="gifts.php">ways</a> and resources to gift people we love with minimal cost to the environment. </blockquote>
        
<!--
        
        It's a culture-a 'kind gesture' or a manner to maintain because it's been done that way a long ago. Isn't it time to talk more about it? How we can gift better? How we can gift in the way that makes lowest impact on the environment? What businesses should we support when we buy gifts?  
-->
        
<!--        Learn about how gifting thoughtfully is more important than ever before. Explore the true costs behind thoughtless gifting. Hear discussions around the topic like should we continue to gift? Shouldn't we begin to trade secondhand products that are still functional? Or should we begin to form an agreement within a household for not gifting all together but rather doing activities together. Get plenty of resources around this topic that will broaden your perspectives. Sign up now!-->
    
    

    </div> <!-- end home-content-->
    <?php 
    include('includes/footer.php');
    ?>