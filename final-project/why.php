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

<div id="wrapper">
    
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
                $content = 'Originating in Brazil, the acai bowl is made of frozen acai palm fruit that is pureed and served as a smoothie in a bowl or glass. In Brazil, acai bowls are typically topped with granola, banana, and guaraná syrup. Several other variations, however, can be found throughout the country, including acai bowls topped with tapioca balls and a saltier version that is topped with shrimp or dried fish.';
                break;
            case 'Saturday':
                $gifts = 'It allows us to be creative.';
                $class = 'creative';
                $pic = 'create.png';
                $alt = 'Be creative';
                $content = 'This thick and creamy smoothie was created for the strawberry lover, but the banana flavor comes through nicely. It\'s refreshing without being too sweet and makes a fruity mid-morning snack.';
                break;
            case 'Sunday':
                $gifts = 'Get to spend more time with our love ones.';
                $class = 'time';
                $pic = 'time.png';
                $alt = 'Spend time with love ones';
                $content = 'Do a little research into the background of the caesar salad and you’ll find that it is named not for some illustrious Roman emperor, but for Caesar Cardini, a Mexican chef working in Tijuana in the 1920s, who would dramatically serve it up table-side. (At least that’s how the story goes.) Fast forward to this century and you have what is probably the most popular restaurant salad in the country, with plenty of variations around the theme of romaine lettuce, garlic, Parmesan, and croutons.';
                break;
            case 'Monday':
                $gifts = 'It reflects that you really care.';
                $class = 'care';
                $pic = 'care.png';
                $alt = 'We care';
                $content = 'Wheatgrass has more vitamin A than carrots, more vitamin C than oranges and the total amount of nutrients exceed the nutrients found in up to two and a half pounds of fresh green vegetables! A single teaspoon of wheatgrass has only 10 calories and almost 1 gram of protein, talk about getting a lot from a little! Wheatgrass shots help protect the body from colds, toxins, and harmful molecules. They are a powerhouse for healthy living.';
                break;
            case 'Tuesday':
                $gifts = 'Get to support locals/small businesses.';
                $class = 'support';
                $pic = 'support.png';
                $alt = 'Support locals';
                $content = 'Kombucha tea is a fermented drink made with tea, sugar, bacteria and yeast. Although it\'s sometimes referred to as kombucha mushroom tea, kombucha is not a mushroom — it\'s a colony of bacteria and yeast. Kombucha tea is made by adding the colony to sugar and tea, and allowing the mix to ferment. The resulting liquid contains vinegar, B vitamins and a number of other chemical compounds.';
                break;
            case 'Wednesday':
                $gifts = 'Get to spend more time with our love ones.';
                $class = 'time';
                $pic = 'time.png';
                $alt = 'Spend time with love ones';
                $content = 'Do a little research into the background of the caesar salad and you’ll find that it is named not for some illustrious Roman emperor, but for Caesar Cardini, a Mexican chef working in Tijuana in the 1920s, who would dramatically serve it up table-side. (At least that’s how the story goes.) Fast forward to this century and you have what is probably the most popular restaurant salad in the country, with plenty of variations around the theme of romaine lettuce, garlic, Parmesan, and croutons.';
                break;
            case 'Thursday':
                $gifts = 'Get to support locals/small businesses.';
                $class = 'support';
                $pic = 'support.png';
                $alt = 'Support locals';
                $content = 'Kombucha tea is a fermented drink made with tea, sugar, bacteria and yeast. Although it\'s sometimes referred to as kombucha mushroom tea, kombucha is not a mushroom — it\'s a colony of bacteria and yeast. Kombucha tea is made by adding the colony to sugar and tea, and allowing the mix to ferment. The resulting liquid contains vinegar, B vitamins and a number of other chemical compounds.';
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
