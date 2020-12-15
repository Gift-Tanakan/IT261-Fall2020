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

<main>
    <h1 class="not-home"><?php echo $mainHeadline; ?></h1>
<!--    <h3>Why mindful giving is important?</h3>-->
    <img src="images/planet.png" alt="Mindful Gifts">
    <p>There are many times that the gifts we give others end up at the corner of their home, underneath a pile of other stuff, or even go right into the storage, unused. We know that moment when we receive something that we wish we don't, something we truly don't need. The best we do is donating or selling. But majority won't make that effort. Dumping it in the trash is easier.</p>
<p>This happens everywhere and every year. Those things contribute a large amount of trash in landfills, polluting the planet. This is the time to have more conversations about how we can give gifts more mindfully. This is the space that helps you learn about the reasons of mindful gift giving and the ways and resources to gift people we love with minimal cost to the environment.</p>
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
