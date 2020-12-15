<?php

// config for my final project

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

switch(THIS_PAGE) {
case 'index.php' :
$title = 'Home | Mindful gifts for this holiday';
$mainHeadline = 'Guide: Mindful gifts for this holiday';
$center = 'center';
$body = 'home';
break;

case 'about.php' :
$title = 'About | Mindful gifts for this holiday';
$mainHeadline = 'Database: Mindful gifts for this holiday';
$center = 'center';
$body = 'about inner';

break;

case 'why.php' :
$title = 'Why? | Reasons to gift mindfully this holiday';
$mainHeadline = 'Reasons to gift mindfully this holiday';
//$center = 'center';
$body = 'why inner';

break;

case 'gifts.php' :
$title = 'Gifts | Ways to gift mindfully this holiday';
$mainHeadline = 'Ways to gift mindfully this holiday';
//$center = 'center';
$body = 'customers inner';

break;
        
case 'gifts-view.php' :
$title = 'Gifts | Ways to gift mindfully this holiday';
$mainHeadline = 'Ways to gift mindfully this holiday';
//$center = 'center';
$body = 'customers inner';

break;

case 'contact.php' :
$title = 'Connect | Get more tips';
$mainHeadline = 'Sign up to get more ideas!';
//    $center = 'center';
$body = 'contact inner';

break;

case 'thx.php' :
$title = 'Thank you page';
$mainHeadline = 'Thank you for signing up!';
$center = 'center';
$body = 'contact inner';

break;
        
case 'login.php' :
$title = 'Login Page';
$mainHeadline = 'Login';
$center = 'center';
$body = 'contact inner';

break;
        
case 'register.php' :
$title = 'Register Page';
$mainHeadline = 'Register today';
$center = 'center';
$body = 'contact inner';

break;

// --------will delete gallery eventually-------- //
        
case 'gallery.php' :
$title = 'Gallery page for our new websites';
$mainHeadline = 'Welcome to the Homemade Carbs Gallery';
//    $center = 'center';
$body = 'gallery inner';

break;

} // end switch

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['why.php'] = 'Why?';
$nav['gifts.php'] = 'Gifts';
$nav['contact.php'] = 'Connect';
//$nav['gallery.php'] = 'Gallery';

function makeLinks($nav) {
$myReturn = '';
foreach($nav as $key => $value) {
if(THIS_PAGE == $key) {
$myReturn .= '<li><a href=" '.$key.' " class= "active"> '.$value.' </a></li>';

} else {
$myReturn .= '<li><a href=" '.$key.' "> '.$value.' </a></li>';

} // end else


} // end foreach

// always remember to return $myReturn
return $myReturn;
} // end funciton


/*********** PHP for my form ************/

$firstName = '';
$lastName = '';
$email = '';
$medium = '';
$frequency = '';
$weekly = '';
$biWeekly = '';
$gifttips = '';
$privacy = '';
$comments = '';
$tel = '';
$gifttips = array();

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$medErr = '';
$frequencyErr = '';
$gifttipsErr = '';
$privacyErr = '';
$commentsErr = '';
$telErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

//if my name is empty, we will have created a variable called $nameErr and we will say Please fill out your name and this is assigned to the $nameErr. Now, if it's not empty, $name = $_POST['name']
if(empty($_POST['firstName'])) {
$firstNameErr = 'Please fill out your first name!';
} else {
$firstName = $_POST['firstName'];
}

if(empty($_POST['lastName'])) {
$lastNameErr = 'Please fill out your last name!';
} else {
$lastName = $_POST['lastName'];
}

if(empty($_POST['email'])) {
$emailErr = 'Please fill out your email!';
} else {
$email = $_POST['email'];
}

if(empty($_POST['medium'])) {
$medErr = 'Please choose one!';
} else {
$medium = $_POST['medium'];
}

if(empty($_POST['frequency'])) {
$frequencyErr = 'Please choose one!';
} else {
$frequency = $_POST['frequency'];
}

// logic is if gender is equal to male, then male is checked

if($frequency == 'weekly') {
$weekly = 'checked';
} elseif ($frequency == 'bi-weekly') {
$biWeekly = 'checked';
}

if(empty($_POST['gifttips'])) {
$gifttipsErr = 'Let\'s pick some tips!';
} else {
$gifttips = $_POST['gifttips'];
}

if(empty($_POST['privacy'])) {
$privacyErr = 'Please agree to our privacy rules!';
} else {
$privacy = $_POST['privacy'];
}

if(empty($_POST['comments'])) {
$commentsErr = 'Please include your comments';
} else {
$comments = $_POST['comments'];
}

// if end user checks the checkboxes, all of them we want to know
// implode the array of wines - so create a function for that!

function myGifttips() {
$myReturn = '';
if(!empty($_POST['gifttips'])) { // meaning if wines are not empty do this...
$myReturn = implode(', ', $_POST['gifttips']);
} return $myReturn;// end if

} // end function

// below is for phone

if(empty($_POST['tel'])) {  // if empty, type in your number
$telErr = 'Your phone number please!';
} elseif(array_key_exists('tel', $_POST)){
if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))
{ // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
$telErr = 'Invalid format!';
} else{
$tel = $_POST['tel'];
}
}

if(isset($_POST['firstName'], 
$_POST['lastName'],
$_POST['frequency'],
$_POST['gifttips'],
$_POST['comments'],
$_POST['tel'],
$_POST['privacy'])) {

$to = 'tanakan.gth@gmail.com';
$subject = 'Test Email' .date('m/d/y');
$body = ''.$firstName.' has filled out your form '.PHP_EOL.'';
$body .= ' Email: '.$email.' '.PHP_EOL.'';
$body .= ' Your phone number: '.$tel.' '.PHP_EOL.'';
$body .= ' You will receive tips about: '.myGifttips().' '.PHP_EOL.'';
$body .= ' Frequency: '.$frequency.' '.PHP_EOL.'';
$body .= ' Comments: '.$comments.'';

$headers = array(
'From' => 'no-reply@tricia-mcmillan.dreamhost.com',
'Reply-to' => ' '.$email.'');

mail($to, $subject, $body, $headers);
header('Location: thx.php');
}

} //close if $_SERVER

// PLEASE REMEMBER!! - this is placed at the very bottom of your config file

//function myerror($myFile, $myLine, $errorMsg) {
//    
//    if(defined('DEBUG') && DEBUG) {
//        echo 'Error in file: <b> '.$myFile.' </b> on line: <b>'.$myLine.'</b>';
//        echo 'Error message: <b> '.$errorMsg.' </b>';
//        die();
//    } else {
//        echo ' Houston, we have a problem!';
//        die();
//    }
//}



///////////////// config for gifts page ////////////////////


// this will be our config file that we will link to the credentials.php

ob_start(); // This prevents header error before reading the whole page.
define('DEBUG', 'TRUE');

include('credentials.php');





// PLEASE REMEMBER!! - this is placed at the very bottom if your config file

function myerror($myFile, $myLine, $errorMsg) {
    
    if(defined('DEBUG') && DEBUG) {
        echo 'Error in file: <b> '.$myFile.' </b> on line: <b>'.$myLine.'</b>';
        echo 'Error message: <b> '.$errorMsg.' </b>';
        die();
    } else {
        echo ' We have a problem!';
        die();
    }
}
?>
