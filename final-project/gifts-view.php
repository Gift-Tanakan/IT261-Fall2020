<?php

//people view page

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

// same principle with the isset $_GET['today']
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
    
<?
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('Location:gifts.php');
}

$sql = 'SELECT * FROM Gifts WHERE GiftID = '.$id.'';

// connect to the database

$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

// We extract the data here

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0 ) { // show the records

    while($row = mysqli_fetch_assoc($result)) {
        $TypeOfGift = stripcslashes($row['TypeOfGift']);
        $Description = stripcslashes($row['Description']);
        $Feedback = '';
    }

} else {
    $Feedback = 'Oops. There\'s nothing here!';
}

include('includes/header.php'); ?>

<main>
    <h2 class="carbs-page">Give: <?php echo $TypeOfGift; ?></h2>

    <?php

    if($Feedback == '') {
        echo '<ul>';
        echo '<li><b>Type of Gifts:</b> '.$TypeOfGift.' </li>';
        echo '<br>';
        echo '<li>'.$Description.'</li>';
        echo '<br>';
        echo '<li><a href="gifts.php">Go back to Gifts page!</a></li>';
        echo '</ul>';
    } else {
        echo $Feedback;

    } // ends else

    ?>

</main>
<aside>
    <?php

    if($Feedback == '') {
        echo '<img src="uploads/gift'.$id.'.png" alt="'.$TypeOfGift.'">';

    } else {

        echo $Feedback;
    }

    // release the web server

    @mysqli_free_result($result);

    // Close the connection

    @mysqli_close($iConn);

    ?>


</aside>
    


<?php
include('includes/footer.php');

?>
