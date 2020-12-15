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

// We're connecting to the database

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
    
<!--daily-->
    
     <?php
    
    $gifts = '';
    $alt = '';
    $content = '';

// random fucntion for default gift page

//    $pic[0] = 'planet';
//    $pic[1] = 'creative';
//    $pic[2] = 'time';
//    $pic[3] = 'care';
//    $pic[4] = 'support';
//
//    $i = rand(0, count($pic) -1);
//    $selectedImages = 'images/'.$pic[$i].'.png';
    

// end random fucntion 
    
if (isset($_GET['today'])){
            $today = $_GET['today'];
        } else {
            $today = date('l');
        }

        switch($today){
            case 'Friday':
                $gifts = 'It doesn\'t hurt the planet too much.';
                $class = 'planet';
                $pic = 'planet.png';
                $alt = 'Not hurt the planet';
                $content = 'When we \'re more thoughtful about what to give others, there are less chances that they will end up not using it, throwing it away, or using it for a short time. When things got used, that means the resources (artificial/natural) used to produce them are used efficiently and not wasted. So gifting mindfully helps reduce the amount of wasted resources.' ;
                break;
            case 'Saturday':
                $gifts = 'It allows us to be creative.';
                $class = 'creative';
                $pic = 'create.png';
                $alt = 'Be creative';
                $content = 'When we want to give gifts that are special and unique to someone, this is a good opportunity to be creative at it. There are many things that you can be creative about such as giving out your yummy homemade dish or bakery, handcrafting scarfs or hat, painting, etc. Not only it represents your love and attention towards them, but also it helps you relax and enjoy building things by hands.';
                break;
            case 'Sunday':
                $gifts = 'Get to spend more time with our love ones.';
                $class = 'time';
                $pic = 'time.png';
                $alt = 'Spend time with love ones';
                $content = 'Giving time and experience instead of items is another great way that we should do more. They say, "The best present is your presence." couldn\'t be more true especially during the pandemic. This may be possible only for those who live in the same household. You can come up with a new menu as a challenge and cook with your partner. You can have some fun painting with your child. Explore something that you have never done and take this chance to do it. Having a buddy doing it with you is a wonderful inspiration.';
                break;
            case 'Monday':
                $gifts = 'It reflects that you really care.';
                $class = 'care';
                $pic = 'care.png';
                $alt = 'We care';
                $content = 'Giving gifts mindfully doesn\'t only mean that you\'re well considered of consequences and the effects of the gifts towards the receivers, but it also shows that you care about the gifts\' materials and their impact at the end of life. This is a meaningful sustainability  approach that you can communicate through your presence. Great intention like this is contagious.';
                break;
            case 'Tuesday':
                $gifts = 'Get to support locals/small businesses.';
                $class = 'support';
                $pic = 'support.png';
                $alt = 'Support locals';
                $content = 'This is your chance to support the businesses who need us most. When deciding to buy a gift, explore your options from small or local businesses first, before ordering it from a big company online. Local and small businesses are those who suffer trying to survive the crisis like COVID-19. Once you help them, your money will be flowing within your community, strengthening your local economy and lowering wealth gap.';
                break;
            case 'Wednesday':
                $gifts = 'Get to spend more time with our love ones.';
                $class = 'time';
                $pic = 'time.png';
                $alt = 'Spend time with love ones';
                $content = 'Giving time and experience instead of items is another great way that we should do more. They say, "The best present is your presence." couldn\'t be more true especially during the pandemic. This may be possible only for those who live in the same household. You can come up with a new menu as a challenge and cook with your partner. You can have some fun painting with your child. Explore something that you have never done and take this chance to do it. Having a buddy doing with you is a wonderful inspiration.';
                break;
            case 'Thursday':
                $gifts = 'Get to support locals/small businesses.';
                $class = 'support';
                $pic = 'support.png';
                $alt = 'Support locals';
                $content = 'This is your chance to support the businesses who need us most. When deciding to buy a gift, explore your options from small or local businesses first, before ordering it from a big company online. Local and small businesses are those who suffer trying to survive the crisis like COVID-19. Once you help them, your money will be flowing within your community, strengthening your local economy and lowering wealth gap.';
                break;

        }
        ?>
            <main>
                
                <h2 class="carbs-page"><?php echo $mainHeadline; ?></h2>
                
                <h2 class="welcome"><?php echo $gifts;?></h2>

                <img src="images/<?php echo $pic; ?>" alt="<?php echo $alt; ?>">
                <p class="daily-text <?php echo $class ;?>"><?php echo $content; ?></p>


            </main>


            <aside>
                <h3>Explore the reasons why we should be more thoughtful about gift giving this year and onwards</h3>

                <ul>
                    <li><a href="why.php?today=Friday">It doesn't hurt the planet too much</a></li>
                    <li><a href="why.php?today=Saturday">It allows us to be creative</a></li>
                    <li><a href="why.php?today=Sunday">Get to spend more time with our love ones</a></li>
                    <li><a href="why.php?today=Monday">It reflects that you really care</a></li>
                    <li><a href="why.php?today=Tuesday">Get to support locals/small businesses</a></li>
        
                </ul>


            </aside>
    
<!--    end daily-->

<?php
include('includes/footer.php');
