<?php 
include('config.php'); 
include('includes/header.php');
?>

<div id="wrapper">

    <h1 class="<?php echo $center; ?>"><?php echo $mainHeadline; ?></h1>
    <!--        <img src="images/img1.jpg" alt="img1">-->

    <?php

    $photos[0] = 'img1';
    $photos[1] = 'img2';
    $photos[2] = 'img3';
    $photos[3] = 'img4';
    $photos[4] = 'img5';

    $i = rand(0, count($photos) -1);
    $selectedImages = 'images/'.$photos[$i].'.jpg';
    echo '<img src="'.$selectedImages.'">'; 

    ?>


    <blockquote>
        "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga."
    </blockquote>
    
    <p>Random image function on my <a href="">GitHub</a></p>


    <?php 
    include('includes/footer.php');
    ?>