<?php
// people.php

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

<main>
    <h1 class="not-home"><?php echo $mainHeadline; ?></h1>
<!--    <h3>Why mindful giving is important?</h3>-->
    <img src="images/planet.png" alt="Mindful Gifts">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
</main>
    

<aside>
    <h3 class="gifts-page">Explore the amazing ways to gift!</h3>
    <?php

$sql = 'SELECT * FROM Gifts'; // Go find my table

//connect with these credentials
$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

// We extract the data here

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0 ) { // show the records
    
    while($row = mysqli_fetch_assoc($result)) {
        
        // this array will display the contents or your row
        echo '<ul>'; // use a similar a href's value that we used for our switch assignment
        echo '<li class="bold"><a href="gifts-view.php?id='.$row['GiftID'].'">'.$row['TypeOfGift'].'</a></li>';
//        echo '<li>'.$row['Description'].'</li>';
//        echo '<li>'.$row['Occupation'].'</li>';
        echo '</ul>';
    } // closing the while
    
} else { // what if there are no people
    
    echo 'Oops. There\'s nothing here!';
    
}// close the else statement

// release the web server

@mysqli_free_result($result);

// Close the connection

@mysqli_close($iConn);
    ?>
</aside>



<?php
include('includes/footer.php');
