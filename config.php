<?php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

// Our gallery php

$people['Donald_Trump'] = 'trump_President from NY.';
$people['Joe_Biden'] = 'biden_Vice President from PA.';
$people['Hilary_Clinton'] = 'clint_Secretary from NY.';
$people['Bernie_Sanders'] = 'sande_Senator from VT.';
$people['Elizabeth_Warren'] = 'warre_Senator from MA.';
$people['Kamala_Harris'] = 'harri_Senator from NJ.';
$people['Cory_Booker'] = 'booke_Senator from NJ.';
$people['Andrew_Yang'] = 'ayang_Entrepreneur from NY.';
$people['Pete_Buttigieg'] = 'butti_Mayor from IN.';
$people['Amy_Klobuchar'] = 'klobu_Senator from MN.';
$people['Julian_Castro'] = 'castr_Housing/Urban from TX.';

// make random function for the candidates images

$candidates[0] = 'trump';
$candidates[1] = 'biden';
$candidates[2] = 'clint';
$candidates[3] = 'sande';
$candidates[4] = 'warre';
$candidates[5] = 'harri';
$candidates[6] = 'booke';
$candidates[7] = 'ayang';
$candidates[8] = 'butti';
$candidates[9] = 'klobu';
$candidates[10] = 'castr';

$i = rand(0, count($candidates) -1);
$randImages2 = 'images/'.$candidates[$i].'.jpg';


switch(THIS_PAGE) {
case 'index.php' :
$title = 'Homepage for our new websites';
$mainHeadline = 'Welcome to our Home Page';
$center = 'center';
$body = 'home';
break;

case 'about.php' :
$title = 'About page for our new websites';
$mainHeadline = 'Welcome to our About Page';
$center = 'center';
$body = 'about inner';

break;

case 'daily.php' :
$title = 'Daily page for our new websites';
$mainHeadline = 'Here\'s our Daily Page';
$center = 'center';
$body = 'daily inner';

break;

case 'customers.php' :
$title = 'Customer page for our new websites';
$mainHeadline = 'Hello Customer!';
$center = 'center';
$body = 'customers inner';

break;

case 'contact.php' :
$title = 'Contact page for our new websites';
$mainHeadline = 'This is our contact page';
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
$mainHeadline = 'Welcome to the Candidates Gallery Page';
//    $center = 'center';
$body = 'gallery inner';

break;

} // end switch

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['customer.php'] = 'Customer';
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
$gender = '';
$wines = '';
$privacy = '';
$comments = '';
$tel = '';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
//$phoneErr = '';
$genderErr = '';
$winesErr = '';
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

if(empty($_POST['gender'])) {
$genderErr = 'Please choose your gender!';
} else {
$gender = $_POST['gender'];
}

// logic is if gender is equal to make, then make is checked

if($gender == 'male') {
$male = 'checked';
} elseif ($gender == 'female') {
$female = 'checked';
}

if(empty($_POST['wines'])) {
$winesErr = 'What, no wines?';
} else {
$wines = $_POST['wines'];
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

function myWines() {
$myReturn = '';
if(!empty($_POST['wines'])) { // meaning if wines are not empty do this...
$myReturn = implode(', ', $_POST['wines']);
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
$_POST['gender'],
$_POST['wines'],
$_POST['comments'],
$_POST['tel'],
$_POST['privacy'])) {

$to = 'tanakan.gth@gmail.com';
$subject = 'Test Email' .date('m/d/y');
$body = ''.$firstName.' has filled out your form '.PHP_EOL.'';
$body .= ' Email: '.$email.' '.PHP_EOL.'';
$body .= ' Your phone number: '.$tel.' '.PHP_EOL.'';
$body .= ' Your wines: '.myWines().' '.PHP_EOL.'';
$body .= ' Gender: '.$gender.' '.PHP_EOL.'';
$body .= ' Comments: '.$comments.'';

$headers = array(
'From' => 'no-reply@tricia-mcmillan.dreamhost.com',
'Reply-to' => ' '.$email.'');

mail($to, $subject, $body, $headers);
header('Location: thx.php');
}

} //close if $_SERVER

?>