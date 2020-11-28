<?php

// config for my carbs gallery

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

////////////////////// my gallery config /////////////////////

$carbs['Wholewheat_Bread'] = 'bread_Wholewheat Bread';
$carbs['Fried_Rice'] = 'frice_Fried Rice';
$carbs['Homemade_Pasta'] = 'pasta_Homemade Pasta';
$carbs['Homemade_Noodle'] = 'noodl_Homemade Noodle';
$carbs['English_Muffin'] = 'muffi_English Muffin';

//$carbs['Pita_Bread'] = 'pitab_Pita Bread';
//$carbs['Homemade_Pizza'] = 'pizza_Homemade Pizza';
//$carbs['Homemade_Sourdough'] = 'sourd_Homemade Sourdough';
//$carbs['Homemade_Tortila'] = 'torti_Homemade Tortila';
//$carbs['White_Bread'] = 'white_White Bread';

// make random function for the base images

$base[0] = 'bread';
$base[1] = 'frice';
$base[2] = 'pasta';
$base[3] = 'noodl';
$base[4] = 'muffi';



$i = rand(0, count($base) -1);
$randImages2 = 'images/'.$base[$i].'.png';

////////////////////// end gallery config /////////////////////

switch(THIS_PAGE) {
case 'index.php' :
$title = 'Homepage for our new websites';
$mainHeadline = 'Welcome to our Home Page';
$center = 'center';
$body = 'home';
break;

case 'about.php' :
$title = 'About page for our new websites';
$mainHeadline = 'My Carbs Database';
$center = 'center';
$body = 'about inner';

break;

case 'daily.php' :
$title = 'Daily page for our new websites';
$mainHeadline = 'Here\'s our Daily Page';
//$center = 'center';
$body = 'daily inner';

break;

case 'carbs.php' :
$title = 'Carbs page for our new websites';
$mainHeadline = 'Welcome to Carbs page!';
//$center = 'center';
$body = 'customers inner';

break;

case 'contact.php' :
$title = 'Contact page for our new websites';
$mainHeadline = 'Sign up to receive yummy carbs recipes!';
//    $center = 'center';
$body = 'contact inner';

break;

case 'thx.php' :
$title = 'Thank you page';
$mainHeadline = 'Thank you for filling out our form';
$center = 'center';
$body = 'contact inner';

break;

case 'gallery.php' :
$title = 'Gallery page for our new websites';
$mainHeadline = 'Welcome to the Homemade Carbs Gallery';
//    $center = 'center';
$body = 'gallery inner';

break;

} // end switch

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['carbs.php'] = 'Carbs';
$nav['contact.php'] = 'Contact';
$nav['gallery.php'] = 'Gallery';

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
//$phone = '';
$frequency = '';
$carbs = '';
$privacy = '';
$comments = '';
$tel = '';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
//$phoneErr = '';
$frequencyErr = '';
$carbsErr = '';
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

if(empty($_POST['frequency'])) {
$frequencyErr = 'Please choose one!';
} else {
$frequency = $_POST['frequency'];
}

// logic is if gender is equal to make, then make is checked

if($frequency == 'weekly') {
$weekly = 'checked';
} elseif ($frequency == 'bi-weekly') {
$female = 'checked';
}

if(empty($_POST['carbs'])) {
$carbsErr = 'What, no carbs?';
} else {
$carbs = $_POST['carbs'];
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

function myCarbs() {
$myReturn = '';
if(!empty($_POST['carbs'])) { // meaning if wines are not empty do this...
$myReturn = implode(', ', $_POST['carbs']);
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
$_POST['carbs'],
$_POST['comments'],
$_POST['tel'],
$_POST['privacy'])) {

$to = 'tanakan.gth@gmail.com';
$subject = 'Test Email' .date('m/d/y');
$body = ''.$firstName.' has filled out your form '.PHP_EOL.'';
$body .= ' Email: '.$email.' '.PHP_EOL.'';
$body .= ' Your phone number: '.$tel.' '.PHP_EOL.'';
$body .= ' Your carbs recipes: '.myCarbs().' '.PHP_EOL.'';
$body .= ' Frequency: '.$frequency.' '.PHP_EOL.'';
$body .= ' Comments: '.$comments.'';

$headers = array(
'From' => 'no-reply@tricia-mcmillan.dreamhost.com',
'Reply-to' => ' '.$email.'');

mail($to, $subject, $body, $headers);
header('Location: thx.php');
}

} //close if $_SERVER

// PLEASE REMEMBER!! - this is placed at the very bottom if your config file

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



///////////////// config for carbs page ////////////////////


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
        echo ' Houston, we have a problem!';
        die();
    }
}
?>